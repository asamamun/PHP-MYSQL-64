<!-- html form to send email -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="to">To:</label>
    <input type="email" name="to" required>
    
    <label for="subject">Subject:</label>
    <input type="text" name="subject" required>
    
    <label for="message">Message:</label>
    <textarea name="message" rows="5" required></textarea>
    
    <input type="submit" name="send" value="Send Email">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['send'])) {
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if (mail($to, $subject, $message)) {
        echo "<p>Email sent successfully!</p>";
    } else {
        echo "<p>Failed to send email.</p>";
    }
}
?>

<?php
// mail("sume@wdpf64.com","exam at 30th instant","hello world");
?>