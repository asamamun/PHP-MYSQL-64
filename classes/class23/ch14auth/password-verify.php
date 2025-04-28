<?php
$h1 = '$2y$10$O8dlEE3nRjg.LfH.kfe2Tej/.52UmPJ3rsNUCZKP00BG.c3IKmptG';
$h2 = '$2y$10$xcue97.SKJpaQFSVwitYeeb1Piw1edMS1nhKMmIYmm2lQ1IwgowqS';
$h3 = '$2y$10$DAFXfjWijAxzP9OIKv/JvOafB1TTvSMU75gU2mXeEX2ZTXPn50a3q';
$h4 = '$2y$10$OBZieMMBP9PdYU.gq6yA9eMX5xIi4uSTTDok/4jdc22xV9o5tGBv.';
$h5 = '$2y$10$OBZieMMBP9PdYU.gq6yA9eMX5xIi4uSTTDok/5jdc22xV9o5tGBv.';

if(password_verify("secret",$h1))
echo "password matched!!!!";
else echo "password mismatched!!!";