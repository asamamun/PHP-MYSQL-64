<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>To show output we use: echo / print / printf / sprintf</h1>
    <h1>\n in echo will move the codes in new line in source code</h1>
    <h1>\n works in double quote</h1>
    <?php
    $company = "Genuity Systems Limited";
    echo "<h1>$company</h1>\n";
    echo "<h1>".$company."</h1>\n";// in php . is concatenation operator
    echo '<h1>$company</h1>';//php cannot show variables value in single quote
    echo '<h1>'.$company . '</h1>';
    echo "<hr>";
    print "<h1>$company</h1>\n";
    print "<h1>".$company."</h1>\n";// in php . is concatenation operator
    print '<h1>$company</h1>';//php cannot show variables value in single quote
    print '<h1>'.$company . '</h1>';
    echo "<hr>";
     echo("<h1>$company</h1>\n");
     print("<h1>$company</h1>\n");
    ?>
    <h1>Printf(c like syntax): you can pass Type Specifiers in printf</h1>
    <ul>
        <li>%d is for decimal</li>
        <li>%s is for string</li>
        <li>%f is for float</li>
    </ul>
    <?php
    $total = 100;
    $topic = "200 tonic water";
    printf("<h1>$company</h1>");
    printf("Bar inventory: %.2f bottles of %0.3f.<br>", $total, $topic);
    printf("%d bottles of tonic water cost Tk %.3f.<br>", 100, 43.20);
    printf("$%.2f<br>", 43.2);
    ?>
    <h1>The sprintf() Statement: it does not print but it returns what to print</h1>
    <?php
    $total = 123456.77;
    $tax = 0.15;
    $grandtotal = $total + $total*$tax;
    $gt = sprintf("%.2f",$grandtotal);
    $result = sprintf("$%.2f", 43.2); //$43.20
    echo $result;
    echo "<br>Grand Total: $gt";
    /*
    let x = 123.456;
    alert(x.toFixed(2)); in javascript we use toFixed
    */
    ?>

</body>
</html>