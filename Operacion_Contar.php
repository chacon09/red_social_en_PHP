<?php


//Se lee que numero tiene el archivo

$archivo = fopen("conteo.txt","r");
$contador = fgets($archivo,100);
$contador++;
echo $contador;  //Cuantas veces se ha cargado la pagina

//Se escribe el nuevo numero que va a tener el archivo

$archivo = fopen("conteo.txt","w");
fwrite($archivo,$contador);
fclose($archivo);

?>