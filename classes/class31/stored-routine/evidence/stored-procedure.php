<?php
$conn = new mysqli("localhost", "root", "", "r64_php");
/*
CREATE PROCEDURE  `manufact`
(
IN name VARCHAR(50),
IN address VARCHAR(100),
IN contact VARCHAR(50)
)
BEGIN
insert into manufacturer(name,address,contact) values(name,address,contact);
insert into manufacturer values('',name,address,contact);
END//

*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $sql = "CALL manufact('$name','$address','$contact')";
    $result = $conn->query($sql);
    if($result){
        echo "Manufacturer added successfully";
    }
}
    ?>
    <form action="" method="post">
        <input type="text" name="name" placeholder="Enter name">
        <input type="text" name="address" placeholder="Enter address">
        <input type="text" name="contact" placeholder="Enter contact">
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>