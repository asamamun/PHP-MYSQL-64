<?php
$colorandcodearr = [
    ["name" => "red", "code" => "#ff0000"],
    ["name" => "green", "code" => "#00ff00"],
    ["name" => "blue", "code" => "#0000ff"],
    ["name" => "yellow", "code" => "#ffff00"]
];
$json = '[{"name":"red","code":"#ff0000"},{"name":"green","code":"#00ff00"},{"name":"blue","code":"#0000ff"},{"name":"yellow","code":"#ffff00"}]';
echo json_encode($colorandcodearr);
/*
[{"name":"red","code":"#ff0000"},{"name":"green","code":"#00ff00"},{"name":"blue","code":"#0000ff"},{"name":"yellow","code":"#ffff00"}]*/
echo "<pre>";
print_r(json_decode($json));
echo "</pre>";