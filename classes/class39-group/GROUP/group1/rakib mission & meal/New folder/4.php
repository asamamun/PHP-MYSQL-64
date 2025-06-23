<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "meal_system");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Create tables if they don't exist
$conn->query("CREATE TABLE IF NOT EXISTS members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    money_given DECIMAL(10,2) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)") or die("Error creating members table: " . $conn->error);

$conn->query("CREATE TABLE IF NOT EXISTS shopping (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member_id INT NOT NULL,
    day INT NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (member_id) REFERENCES members(id) ON DELETE CASCADE
)") or die("Error creating shopping table: " . $conn->error);

$conn->query("CREATE TABLE IF NOT EXISTS meals (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member_id INT NOT NULL,
    day INT NOT NULL,
    meals DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (member_id) REFERENCES members(id) ON DELETE CASCADE
)") or die("Error creating meals table: " . $conn->error);

// Handle member operations
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_member'])) {
        $name = $conn->real_escape_string($_POST['name']);
        $money = floatval($_POST['money_given']);
        $conn->query("INSERT INTO members (name, money_given) VALUES ('$name', $money)") 
            or die("Error adding member: " . $conn->error);
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
    
    if (isset($_POST['edit_member'])) {
        $id = intval($_POST['id']);
        $name = $conn->real_escape_string($_POST['name']);
        $money = floatval($_POST['money_given']);
        $conn->query("UPDATE members SET name='$name', money_given=$money WHERE id=$id") 
            or die("Error updating member: " . $conn->error);
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
    
    if (isset($_POST['delete_member'])) {
        $id = intval($_POST['id']);
        $conn->query("DELETE FROM members WHERE id=$id") 
            or die("Error deleting member: " . $conn->error);
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
    
    if (isset($_POST['save_shopping'])) {
        $member_id = intval($_POST['member_id']);
        $day = intval($_POST['day']);
        $amount = floatval($_POST['amount']);
        
        // Check if entry exists
        $result = $conn->query("SELECT id FROM shopping WHERE member_id=$member_id AND day=$day") 
            or die("Error checking shopping: " . $conn->error);
        if ($result->num_rows > 0) {
            $conn->query("UPDATE shopping SET amount=$amount WHERE member_id=$member_id AND day=$day") 
                or die("Error updating shopping: " . $conn->error);
        } else {
            $conn->query("INSERT INTO shopping (member_id, day, amount) VALUES ($member_id, $day, $amount)") 
                or die("Error inserting shopping: " . $conn->error);
        }
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
    
    if (isset($_POST['save_meals'])) {
        $member_id = intval($_POST['member_id']);
        $day = intval($_POST['day']);
        $meals = floatval($_POST['meals']);
        
        // Check if entry exists
        $result = $conn->query("SELECT id FROM meals WHERE member_id=$member_id AND day=$day") 
            or die("Error checking meals: " . $conn->error);
        if ($result->num_rows > 0) {
            $conn->query("UPDATE meals SET meals=$meals WHERE member_id=$member_id AND day=$day") 
                or die("Error updating meals: " . $conn->error);
        } else {
            $conn->query("INSERT INTO meals (member_id, day, meals) VALUES ($member_id, $day, $meals)") 
                or die("Error inserting meals: " . $conn->error);
        }
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
}

// Get all members
$members = $conn->query("SELECT * FROM members ORDER BY name") 
    or die("Error fetching members: " . $conn->error);

// Calculate totals - NEW IMPROVED VERSION
$total_result = $conn->query("SELECT SUM(money_given) as total FROM members") 
    or die("Error calculating total money: " . $conn->error);
$total_money_given = $total_result->fetch_assoc()['total'] ?? 0;

$shopping_result = $conn->query("SELECT SUM(amount) as total FROM shopping") 
    or die("Error calculating total shopping: " . $conn->error);
$total_shopping = $shopping_result->fetch_assoc()['total'] ?? 0;

$meals_result = $conn->query("SELECT SUM(meals) as total FROM meals") 
    or die("Error calculating total meals: " . $conn->error);
$total_meals = $meals_result->fetch_assoc()['total'] ?? 0;

// Initialize daily totals arrays
$shopping_totals = array_fill(1, 31, 0);
$meal_totals = array_fill(1, 31, 0);

// Get shopping data by day
$shopping_data = $conn->query("SELECT day, SUM(amount) as total FROM shopping GROUP BY day") 
    or die("Error fetching shopping data: " . $conn->error);
while ($row = $shopping_data->fetch_assoc()) {
    $shopping_totals[$row['day']] = $row['total'];
}

// Get meal data by day
$meal_data = $conn->query("SELECT day, SUM(meals) as total FROM meals GROUP BY day") 
    or die("Error fetching meal data: " . $conn->error);
while ($row = $meal_data->fetch_assoc()) {
    $meal_totals[$row['day']] = $row['total'];
}

// Calculate meal rate
$meal_rate = $total_meals > 0 ? $total_shopping / $total_meals : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meal Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #6c5ce7;
            --secondary-color: #f8f9fc;
            --accent-color: #a29bfe;
        }
        
        body {
            background-color: #f8f9fc;
            background-image: radial-gradient(circle at 10% 20%, rgba(166, 226, 255, 0.1) 0%, rgba(255, 255, 255, 0.9) 90%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 2rem;
            transition: transform 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--primary-color), #8c7ae6);
            color: white;
            border-radius: 12px 12px 0 0 !important;
            padding: 1.2rem 1.5rem;
        }
        
        .summary-item {
            padding: 1.5rem;
            text-align: center;
            border-radius: 10px;
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .summary-item:hover {
            transform: scale(1.03);
        }
        
        .money-given {
            background: linear-gradient(135deg, #74b9ff, #0984e3);
            color: white;
        }
        
        .total-shopping {
            background: linear-gradient(135deg, #55efc4, #00b894);
            color: white;
        }
        
        .total-meals {
            background: linear-gradient(135deg, #ffeaa7, #fdcb6e);
            color: #2d3436;
        }
        
        .meal-rate {
            background: linear-gradient(135deg, #fd79a8, #e84393);
            color: white;
        }
        
        /* Improved visibility for summary numbers */
        .summary-item h2 {
            font-size: 2rem;
            font-weight: 700;
            margin: 0.5rem 0;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }
        
        .summary-item h5 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .summary-item small {
            font-size: 0.85rem;
            opacity: 0.9;
        }
        
        .table-responsive {
            overflow-x: auto;
            border-radius: 12px;
        }
        
        .table {
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .table thead th {
            background-color: #f1f3f9;
            border-bottom: 2px solid #dee2e6;
            font-weight: 600;
        }
        
        .table-hover tbody tr:hover {
            background-color: rgba(108, 92, 231, 0.1);
        }

         .input-cell {
            padding: 0.5rem;
            min-width: 90px; /* Increased from 80px */
        }
        
        .input-cell input {
            width: 100%;
            padding: 0.75rem; /* Increased from 0.5rem */
            font-size: 1rem;  /* Increased from 0.9rem */
            border: 1px solid #ddd;
            border-radius: 6px;
            transition: all 0.3s;
            height: 42px;    /* Added fixed height */
        }
        
      
        .input-cell input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(108, 92, 231, 0.25);
        }
        
        .nav-tabs .nav-link {
            border: none;
            font-weight: 500;
            color: #495057;
        }
        
        .nav-tabs .nav-link.active {
            color: var(--primary-color);
            border-bottom: 3px solid var(--primary-color);
            background: transparent;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: #5649d6;
            border-color: #5649d6;
        }
        
        .action-buttons .btn {
            border-radius: 50%;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .day-header {
            min-width: 60px;
            text-align: center;
            background-color: #f8f9fa;
            font-weight: 600;
        }
        
        .member-name-col {
            position: sticky;
            left: 0;
            background-color: white;
            z-index: 2;
            font-weight: 500;
        }
        
        .positive-balance {
            color: #00b894;
            font-weight: 600;
        }
        
        .negative-balance {
            color: #d63031;
            font-weight: 600;
        }
        
        .app-title {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--primary-color);
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
            font-weight: 700;
        }
        
        /* Improved modal styling */
        .modal-header {
            background: linear-gradient(135deg, var(--primary-color), #8c7ae6);
            color: white;
        }
        
        .btn-close-white {
            filter: invert(1);
        }
    </style>
</head>
<body>
    <div class="container py-4">
        <h1 class="text-center mb-4 app-title">
            <i class="bi bi-egg-fried me-2"></i> 
            Meal Management System
            <i class="bi bi-cup-hot ms-2"></i>
        </h1>
        
        <!-- Add Member Form -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-person-plus me-2"></i> Add New Member</h5>
            </div>
            <div class="card-body">
                <form method="post" class="row g-3">
                    <div class="col-md-5">
                        <label for="name" class="form-label">Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="money_given" class="form-label">Money Given</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-cash-coin"></i></span>
                            <input type="number" step="0.01" class="form-control" id="money_given" name="money_given" required>
                        </div>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" name="add_member" class="btn btn-primary w-100">
                            <i class="bi bi-plus-circle me-1"></i> Add
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Summary Cards -->
        <div class="row mb-4 g-4">
            <div class="col-md-3">
                <div class="summary-item money-given">
                    <h5><i class="bi bi-wallet2 me-2"></i> Total Money</h5>
                    <h2><?= number_format($total_money_given, 2) ?></h2>
                    <small class="opacity-75">Given by all members</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="summary-item total-shopping">
                    <h5><i class="bi bi-cart-check me-2"></i> Total Shopping</h5>
                    <h2><?= number_format($total_shopping, 2) ?></h2>
                    <small class="opacity-75">Total expenses</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="summary-item total-meals">
                    <h5><i class="bi bi-egg-fried me-2"></i> Total Meals</h5>
                    <h2><?= number_format($total_meals, 2) ?></h2>
                    <small class="opacity-75">Consumed</small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="summary-item meal-rate">
                    <h5><i class="bi bi-speedometer2 me-2"></i> Meal Rate</h5>
                    <h2><?= number_format($meal_rate, 2) ?></h2>
                    <small class="opacity-75">Per meal cost</small>
                </div>
            </div>
        </div>
        
        <!-- Tab Navigation -->
        <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="members-tab" data-bs-toggle="tab" data-bs-target="#members" type="button" role="tab">
                    <i class="bi bi-people-fill me-1"></i> Members
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="meals-tab" data-bs-toggle="tab" data-bs-target="#meals" type="button" role="tab">
                    <i class="bi bi-egg-fried me-1"></i> Daily Meals
                </button>
            </li>
        </ul>
        
        <!-- Tab Content -->
        <div class="tab-content" id="myTabContent">
            <!-- Members Tab -->
            <div class="tab-pane fade show active" id="members" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th class="member-name-col">Member</th>
                                <th>Money Given</th>
                                <th>Balance</th>
                                <th class="action-buttons"></th>
                                <?php for ($day = 1; $day <= 31; $day++): ?>
                                    <th class="day-header">D<?= $day ?></th>
                                <?php endfor; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $members->data_seek(0);
                            while ($member = $members->fetch_assoc()): 
                                $member_meals = $conn->query("SELECT SUM(meals) as total FROM meals WHERE member_id={$member['id']}")->fetch_assoc();
                                $member_total_meals = $member_meals['total'] ?? 0;
                                $member_cost = $member_total_meals * $meal_rate;
                                $money_left = $member['money_given'] - $member_cost;
                            ?>
                                <tr>
                                    <td class="editable member-name-col" data-id="<?= $member['id'] ?>" data-field="name">
                                        <i class="bi bi-person-circle me-2"></i>
                                        <?= htmlspecialchars($member['name']) ?>
                                    </td>
                                    <td class="editable" data-id="<?= $member['id'] ?>" data-field="money_given">
                                        <?= number_format($member['money_given'], 2) ?>
                                    </td>
                                    <td class="<?= $money_left < 0 ? 'negative-balance' : 'positive-balance' ?>">
                                        <?= number_format($money_left, 2) ?>
                                    </td>
                                    <td class="action-buttons">
                                        <button class="btn btn-sm btn-danger delete-member" data-id="<?= $member['id'] ?>" title="Delete">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                    <?php for ($day = 1; $day <= 31; $day++): 
                                        $shopping = $conn->query("SELECT amount FROM shopping WHERE member_id={$member['id']} AND day=$day")->fetch_assoc();
                                    ?>
                                        <td class="input-cell">
                                            <input type="number" step="0.01" class="form-control shopping-input" 
                                                   data-member="<?= $member['id'] ?>" data-day="<?= $day ?>"
                                                   value="<?= $shopping['amount'] ?? '' ?>" placeholder="0.00">
                                        </td>
                                    <?php endfor; ?>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Meals Tab -->
            <div class="tab-pane fade" id="meals" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th class="member-name-col">Member</th>
                                <?php for ($day = 1; $day <= 31; $day++): ?>
                                    <th class="day-header">D<?= $day ?></th>
                                <?php endfor; ?>
                                <th class="text-end fw-bold">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $members->data_seek(0);
                            while ($member = $members->fetch_assoc()): 
                                $meals_result = $conn->query("SELECT day, meals FROM meals WHERE member_id={$member['id']}");
                                $member_meals = [];
                                while ($meal = $meals_result->fetch_assoc()) {
                                    $member_meals[$meal['day']] = $meal['meals'];
                                }
                                $member_total_meals = array_sum($member_meals);
                            ?>
                                <tr>
                                    <td class="member-name-col">
                                        <i class="bi bi-person-circle me-2"></i>
                                        <?= htmlspecialchars($member['name']) ?>
                                    </td>
                                    <?php for ($day = 1; $day <= 31; $day++): ?>
                                        <td class="input-cell">
                                            <input type="number" step="0.01" class="form-control meal-input" 
                                                   data-member="<?= $member['id'] ?>" data-day="<?= $day ?>"
                                                   value="<?= $member_meals[$day] ?? '' ?>" placeholder="0.00">
                                        </td>
                                    <?php endfor; ?>
                                    <td class="text-end fw-bold"><?= number_format($member_total_meals, 2) ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                        <tfoot>
                            <tr class="fw-bold">
                                <td>Total</td>
                                <?php for ($day = 1; $day <= 31; $day++): ?>
                                    <td class="text-center"><?= number_format($meal_totals[$day], 2) ?></td>
                                <?php endfor; ?>
                                <td class="text-end"><?= number_format($total_meals, 2) ?></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Member Modal -->
    <div class="modal fade" id="editMemberModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title"><i class="bi bi-pencil-square me-2"></i> Edit Member</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="edit_member_id">
                        <div class="mb-3">
                            <label for="edit_name" class="form-label">Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control" id="edit_name" name="name" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="edit_money_given" class="form-label">Money Given</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-cash-coin"></i></span>
                                <input type="number" step="0.01" class="form-control" id="edit_money_given" name="money_given" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="edit_member" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Edit member functionality
    document.querySelectorAll('.editable').forEach(element => {
        element.addEventListener('click', function() {
            const id = this.dataset.id;
            const field = this.dataset.field;
            const value = this.textContent.trim();
            
            document.getElementById('edit_member_id').value = id;
            document.getElementById('edit_name').value = field === 'name' ? value : '';
            document.getElementById('edit_money_given').value = field === 'money_given' ? value : '';
            
            const modal = new bootstrap.Modal(document.getElementById('editMemberModal'));
            modal.show();
        });
    });
    
    // Delete member functionality
    document.querySelectorAll('.delete-member').forEach(button => {
        button.addEventListener('click', function() {
            if (confirm('Are you sure you want to delete this member?')) {
                const form = document.createElement('form');
                form.method = 'post';
                form.action = '';
                
                const idInput = document.createElement('input');
                idInput.type = 'hidden';
                idInput.name = 'id';
                idInput.value = this.dataset.id;
                
                const submitInput = document.createElement('input');
                submitInput.type = 'hidden';
                submitInput.name = 'delete_member';
                submitInput.value = '1';
                
                form.appendChild(idInput);
                form.appendChild(submitInput);
                document.body.appendChild(form);
                form.submit();
            }
        });
    });
    
    // Save shopping data
    document.querySelectorAll('.shopping-input').forEach(input => {
        input.addEventListener('change', function() {
            const form = document.createElement('form');
            form.method = 'post';
            form.action = '';
            
            const memberInput = document.createElement('input');
            memberInput.type = 'hidden';
            memberInput.name = 'member_id';
            memberInput.value = this.dataset.member;
            
            const dayInput = document.createElement('input');
            dayInput.type = 'hidden';
            dayInput.name = 'day';
            dayInput.value = this.dataset.day;
            
            const amountInput = document.createElement('input');
            amountInput.type = 'hidden';
            amountInput.name = 'amount';
            amountInput.value = this.value || '0';
            
            const submitInput = document.createElement('input');
            submitInput.type = 'hidden';
            submitInput.name = 'save_shopping';
            submitInput.value = '1';
            
            form.appendChild(memberInput);
            form.appendChild(dayInput);
            form.appendChild(amountInput);
            form.appendChild(submitInput);
            document.body.appendChild(form);
            form.submit();
        });
    });
    
    // Save meal data
    document.querySelectorAll('.meal-input').forEach(input => {
        input.addEventListener('change', function() {
            const form = document.createElement('form');
            form.method = 'post';
            form.action = '';
            
            const memberInput = document.createElement('input');
            memberInput.type = 'hidden';
            memberInput.name = 'member_id';
            memberInput.value = this.dataset.member;
            
            const dayInput = document.createElement('input');
            dayInput.type = 'hidden';
            dayInput.name = 'day';
            dayInput.value = this.dataset.day;
            
            const mealsInput = document.createElement('input');
            mealsInput.type = 'hidden';
            mealsInput.name = 'meals';
            mealsInput.value = this.value || '0';
            
            const submitInput = document.createElement('input');
            submitInput.type = 'hidden';
            submitInput.name = 'save_meals';
            submitInput.value = '1';
            
            form.appendChild(memberInput);
            form.appendChild(dayInput);
            form.appendChild(mealsInput);
            form.appendChild(submitInput);
            document.body.appendChild(form);
            form.submit();
        });
    });
    </script>
</body>
</html>