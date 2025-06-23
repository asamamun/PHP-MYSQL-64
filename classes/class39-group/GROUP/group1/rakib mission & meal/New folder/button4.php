<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "test");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize defaults
$row = ['energy' => 100, 'xp' => 0, 'initial_energy' => 100, 'last_update' => time()];
$mission_result = '';

// Fetch current stats
$result = $conn->query("SELECT energy, xp, initial_energy, last_update FROM user_stats WHERE id = 1");
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $row['last_update'] = strtotime($row['last_update']);
}

// Calculate energy restoration since last update
$current_time = time();
$time_diff = $current_time - $row['last_update'];
$energy_to_restore = min(floor($time_diff * 5), $row['initial_energy'] - $row['energy']);

if ($energy_to_restore > 0) {
    $new_energy = $row['energy'] + $energy_to_restore;
    $conn->query("UPDATE user_stats SET energy = $new_energy, last_update = FROM_UNIXTIME($current_time) WHERE id = 1");
    $row['energy'] = $new_energy;
}

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['set_energy'])) {
        $energy = intval($_POST['energy']);
        $conn->query("UPDATE user_stats SET energy = $energy, initial_energy = $energy, last_update = NOW() WHERE id = 1");
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    }
    
    if (isset($_POST['reset_energy'])) {
        $conn->query("UPDATE user_stats SET energy = 0, last_update = NOW() WHERE id = 1");
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    }
    
    if (isset($_POST['restore_energy'])) {
        $conn->query("UPDATE user_stats SET energy = initial_energy, last_update = NOW() WHERE id = 1");
        header("Location: ".$_SERVER['PHP_SELF']);
        exit;
    }

    if (isset($_POST['action']) && $_POST['action'] === 'mission') {
        // Get current energy before mission
        $result = $conn->query("SELECT energy, xp FROM user_stats WHERE id = 1");
        $current_stats = $result->fetch_assoc();
        $current_energy = $current_stats['energy'];
        
        if ($current_energy >= 10) {
            // Start transaction
            $conn->begin_transaction();
            
            try {
                // 1. Update energy and XP
                $new_xp = $current_stats['xp'] + 5;
                $conn->query("UPDATE user_stats SET energy = energy - 10, xp = $new_xp, last_update = NOW() WHERE id = 1");
                
                // 2. Record mission history
                $stmt = $conn->prepare("INSERT INTO mission_history (user_id, start_energy, end_energy, xp_gained) VALUES (?, ?, ?, ?)");
                $user_id = 1;
                $start_energy = $current_energy;
                $end_energy = $current_energy - 10;
                $xp_gained = 5;
                $stmt->bind_param("iiii", $user_id, $start_energy, $end_energy, $xp_gained);
                $stmt->execute();
                
                $conn->commit();
                $mission_result = '<div class="alert alert-success mt-3">Mission Complete! +5 XP</div>';
            } catch (Exception $e) {
                $conn->rollback();
                $mission_result = '<div class="alert alert-danger mt-3">Mission Failed: '.$e->getMessage().'</div>';
            }
        } else {
            $mission_result = '<div class="alert alert-warning mt-3">Not enough energy!</div>';
        }
    }
}

// Fetch updated stats after potential changes
$result = $conn->query("SELECT energy, xp, initial_energy FROM user_stats WHERE id = 1");
if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Energy Mission System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .energy-bar {
            height: 30px;
            transition: width 0.5s;
        }
        .mission-progress {
            height: 10px;
            margin-top: 5px;
        }
        .xp-badge {
            font-size: 1rem;
        }
        .restore-animation {
            animation: pulse 1s infinite;
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h3 class="mb-0">Energy Mission System</h3>
                    </div>
                    <div class="card-body">
                        <!-- Energy Control -->
                        <div class="mb-4">
                            <h5>Energy Control</h5>
                            <form method="post" class="row g-3">
                                <div class="col-md-6">
                                    <label for="energy" class="form-label">Set Initial Energy</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" name="energy" min="1" value="<?= $row['initial_energy'] ?>">
                                        <button type="submit" name="set_energy" class="btn btn-primary">Set</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Actions</label>
                                    <div class="btn-group" role="group">
                                        <button type="submit" name="reset_energy" class="btn btn-danger">Reset to 0</button>
                                        <button type="submit" name="restore_energy" class="btn btn-success restore-animation">Restore Full</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Stats Display -->
                        <div class="mb-4">
                            <h5>Current Stats</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Energy: <?= $row['energy'] ?>/<?= $row['initial_energy'] ?></label>
                                        <div class="progress">
                                            <div class="progress-bar energy-bar bg-success" 
                                                 role="progressbar" 
                                                 style="width: <?= ($row['energy'] / $row['initial_energy']) * 100 ?>%" 
                                                 aria-valuenow="<?= $row['energy'] ?>" 
                                                 aria-valuemin="0" 
                                                 aria-valuemax="<?= $row['initial_energy'] ?>"></div>
                                        </div>
                                        <small>Restoring 5 energy per second</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">XP: <span class="badge bg-primary xp-badge"><?= $row['xp'] ?></span></label>
                                        <div class="progress mission-progress">
                                            <div class="progress-bar bg-info" 
                                                 role="progressbar" 
                                                 style="width: <?= $row['xp'] % 100 ?>%" 
                                                 aria-valuenow="<?= $row['xp'] % 100 ?>" 
                                                 aria-valuemin="0" 
                                                 aria-valuemax="100"></div>
                                        </div>
                                        <small>Level <?= floor($row['xp'] / 100) + 1 ?> (<?= $row['xp'] % 100 ?>/100)</small>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Mission Button -->
                            <form method="post">
                                <button id="missionButton" name="action" value="mission" class="btn btn-warning btn-lg w-100 py-3" <?= $row['energy'] < 10 ? 'disabled' : '' ?>>
                                    <span id="buttonText">Go on Mission! (-10 Energy, +5 XP)</span>
                                    <div id="missionLoader" class="spinner-border spinner-border-sm d-none" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </button>
                            </form>
                            <?= $mission_result ?>
                        </div>
                        
                        <!-- Mission Progress -->
                        <div class="mt-4">
                            <h5>Mission Progress</h5>
                            <div class="list-group" id="missionFeed">
                                <?php
                                $history = $conn->query("SELECT xp_gained FROM mission_history WHERE user_id = 1 ORDER BY mission_time DESC LIMIT 5");
                                while ($entry = $history->fetch_assoc()):
                                ?>
                                    <div class="list-group-item list-group-item-success">+<?= $entry['xp_gained'] ?> XP gained</div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mission button loading state
        document.querySelector('form[method="post"]').addEventListener('submit', function(e) {
            if (e.submitter && e.submitter.id === 'missionButton') {
                const btn = e.submitter;
                btn.disabled = true;
                btn.querySelector('#buttonText').textContent = 'Mission in Progress...';
                btn.querySelector('#missionLoader').classList.remove('d-none');
            }
        });
        
        // Auto-hide mission result after 3 seconds
        <?php if ($mission_result): ?>
            setTimeout(() => {
                document.querySelector('.alert').style.opacity = '0';
                setTimeout(() => {
                    document.querySelector('.alert').remove();
                }, 500);
            }, 3000);
        <?php endif; ?>
        
        // Auto-refresh energy every second
        setInterval(() => {
            fetch(window.location.href)
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const energyElement = doc.querySelector('.energy-bar');
                    const energyText = doc.querySelector('.form-label:first-child');
                    const missionButton = doc.querySelector('#missionButton');
                    
                    if (energyElement) {
                        document.querySelector('.energy-bar').style.width = energyElement.style.width;
                        document.querySelector('.form-label:first-child').innerHTML = energyText.innerHTML;
                        document.querySelector('#missionButton').disabled = missionButton.disabled;
                    }
                });
        }, 1000);
    </script>
</body>
</html>