<!DOCTYPE html>
<html>
<head>
    <title>Find Day from Date</title>
</head>
<body>

<form method="post">
    Enter a date (YYYY-MM-DD): <input type="date" name="user_date" required>
    <input type="submit" value="Find Day">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_date = $_POST['user_date'];

    // Validate and convert the date
    if (strtotime($user_date)) {
        $day = date("l", strtotime($user_date));
        echo "<h3>The day on $user_date is: <b>$day</b></h3>";
    } else {
        echo "<h3 style='color:red;'>Invalid date format! Please use YYYY-MM-DD.</h3>";
    }
}
?>

</body>
</html>
