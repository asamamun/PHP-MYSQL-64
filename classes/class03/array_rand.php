<h1>Array rand returns random index</h1>
<?php
$letters = range("A","Z");
$r = array_rand($letters);
?>
<pre>
    <code>
        <?php
    var_dump($letters);
    // var_dump($r);
    echo $r;
    ?>
    </code>
</pre>
