<h1>what namespace do?</h1>
<p>The namespace keyword is used to create a new namespace. It is used to group related classes together and avoid naming conflicts.</p>
<?php
require "car1.php";
require "car2.php";
use Car1\Car as C1, Car2\Car as C2;
$b = new C1("BMW", "X5");
$b->show();

$c = new C2("Red", "X5", 2020);
$c->show();