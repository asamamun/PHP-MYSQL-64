<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="post">
        <input type="text" name="stname" required placeholder="username">
        <input type="password" name="stpass" required placeholder="password">
        <input type="submit">
    </form>
    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['stname']) && $_POST['stpass'] ){
        $line = $_POST['stname'] ." | ". $_POST['stpass'] . "|\n";
        $fh = fopen("users.txt","a");
        fwrite($fh,$line);
        fclose($fh);
    }
    ?>
    <h1>Users table</h1>
    <table width="100%" border="1" cellspacing="5" cellpadding="5">
        <tr>
            <th>User</th>
            <th>Password</th>
            <th>Action</th>
        </tr>
        <?php
        if(is_file("users.txt")){
            $fh = fopen("users.txt","r");
            //fgets reads a file until it gets newline character and move the pointer in next line
            while (($line = fgets($fh)) !== false) {
                $parts = explode("|", $line);
                echo "<tr>";
                echo "<td>{$parts[0]}</td>";
                echo "<td>{$parts[1]}</td>";
                echo "<td>EDIT | DELETE</td>";
                echo "</tr>";
            }
            fclose($fh);
        }
        ?>
    </table>


</body>
</html>