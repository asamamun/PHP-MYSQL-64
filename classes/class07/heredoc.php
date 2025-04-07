<?php
$pagetitle = "My Page's header 1";
$header = <<<MYHEADER
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{$pagetitle}</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
MYHEADER;
$footer = <<<MYFOOT
<h3>All Rights Reserved</h3>
</body>
</html>
MYFOOT;
?>

<?php
echo $header;
echo "<marquee>Welcome to My Page</marquee>";
echo $footer;
?>