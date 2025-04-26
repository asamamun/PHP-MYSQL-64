<!DOCTYPE html>
<html>
<head>
    <title>Age Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .calculator {
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .result {
            margin-top: 20px;
            padding: 15px;
            background-color: #e9f7ef;
            border-radius: 5px;
        }
        input[type="date"], input[type="submit"] {
            padding: 8px;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h2>Age Calculator</h2>
        <form method="get">
            <label for="birthdate">Enter your birth date:</label><br>
            <input type="date" id="birthdate" name="birthdate" required max="<?php echo date('Y-m-d'); ?>">
            <input type="submit" value="Calculate Age">
        </form>

        <?php
        if (isset($_GET['birthdate'])) {
            $birthdate = $_GET['birthdate'];
            $today = new DateTime();
            $birthday = new DateTime($birthdate);
            
            // Calculate difference
            $diff = $today->diff($birthday);
            
            // Calculate total days
            $totalDays = $today->getTimestamp() - $birthday->getTimestamp();
            $totalDays = floor($totalDays / (60 * 60 * 24));
            
            echo "<div class='result'>";
            echo "<h3>Results for " . $birthday->format('F j, Y') . "</h3>";
            
            // Standard age format
            echo "<p><strong>Your age:</strong> " . $diff->y . " years, " . $diff->m . " months, " . $diff->d . " days</p>";
            
            // Alternative formats
            echo "<p><strong>In months:</strong> " . (($diff->y * 12) + $diff->m) . " months and " . $diff->d . " days</p>";
            echo "<p><strong>In weeks:</strong> " . floor($totalDays / 7) . " weeks and " . ($totalDays % 7) . " days</p>";
            echo "<p><strong>In days:</strong> " . $totalDays . " days</p>";
            echo "<p><strong>In hours:</strong> " . number_format($totalDays * 24) . " hours</p>";
            echo "<p><strong>In minutes:</strong> " . number_format($totalDays * 1440) . " minutes</p>";
            
            // Next birthday calculation
            $nextBirthday = new DateTime(date('Y') . substr($birthdate, 4));
            if ($nextBirthday < $today) {
                $nextBirthday->modify('+1 year');
            }
            $daysUntilNext = $today->diff($nextBirthday)->days;
            
            echo "<p><strong>Next birthday:</strong> " . $nextBirthday->format('F j, Y') . " (in " . $daysUntilNext . " days)</p>";
            
            // Zodiac sign (bonus feature)
            echo "<p><strong>Zodiac sign:</strong> " . getZodiacSign($birthday) . "</p>";
            
            echo "</div>";
        }
        
        // Function to get zodiac sign
        function getZodiacSign($date) {
            $day = $date->format('j');
            $month = $date->format('n');
            
            if (($month == 3 && $day >= 21) || ($month == 4 && $day <= 19)) {
                return 'Aries';
            } elseif (($month == 4 && $day >= 20) || ($month == 5 && $day <= 20)) {
                return 'Taurus';
            } elseif (($month == 5 && $day >= 21) || ($month == 6 && $day <= 20)) {
                return 'Gemini';
            } elseif (($month == 6 && $day >= 21) || ($month == 7 && $day <= 22)) {
                return 'Cancer';
            } elseif (($month == 7 && $day >= 23) || ($month == 8 && $day <= 22)) {
                return 'Leo';
            } elseif (($month == 8 && $day >= 23) || ($month == 9 && $day <= 22)) {
                return 'Virgo';
            } elseif (($month == 9 && $day >= 23) || ($month == 10 && $day <= 22)) {
                return 'Libra';
            } elseif (($month == 10 && $day >= 23) || ($month == 11 && $day <= 21)) {
                return 'Scorpio';
            } elseif (($month == 11 && $day >= 22) || ($month == 12 && $day <= 21)) {
                return 'Sagittarius';
            } elseif (($month == 12 && $day >= 22) || ($month == 1 && $day <= 19)) {
                return 'Capricorn';
            } elseif (($month == 1 && $day >= 20) || ($month == 2 && $day <= 18)) {
                return 'Aquarius';
            } else {
                return 'Pisces';
            }
        }
        ?>
    </div>
</body>
</html>