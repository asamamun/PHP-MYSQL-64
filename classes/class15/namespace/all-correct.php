<h1>what namespace do?</h1>
<p>The namespace keyword is used to create a new namespace. It is used to group related classes together and avoid naming conflicts.</p>
<?php
require "car1.php";
require "car2.php";
$b = new Car1\Car("BMW", "X5");
$b->show();

$c = new Car2\Car("Red", "X5", 2020);
$c->show();