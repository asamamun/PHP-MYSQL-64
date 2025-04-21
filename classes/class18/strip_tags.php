<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comment Form</title>
</head>
<body>
    <form action="" method="post">
        <label for="comment">Enter your comment:</label><br>
        <textarea name="comment" id="comment" rows="5" cols="40"></textarea><br>
        <input type="submit" value="Submit">
    </form>
    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = $_POST["comment"];

    // Allow only <a> tag, strip all others
    // $clean_comment = strip_tags($comment);
    $clean_comment = strip_tags($comment, "<strong><b>");

    echo "<strong>Processed Comment:</strong> " . $clean_comment;
}
?>
</body>
</html>