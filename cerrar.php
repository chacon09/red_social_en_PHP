<?php
session_start();
session_destroy();
echo "has cerrado sesion";
$archivo1 = fopen("cont.txt", "r");
$contador1 = fgets($archivo1,1000);
$contador1=0;
$archivo1 = fopen("cont.txt", "w");
fwrite($archivo1, $contador1);
fclose($archivo1);
header('location: index.html');
?>