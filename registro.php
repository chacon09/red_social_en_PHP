<?php 

include("conexion.php");
$no=$_POST['corre'];
$pa=$_POST['pass'];
$ed=$_POST['nomb'];
$ap=$_POST['ape'];
$foto=$_FILES["fileToUpload"]["name"];
$ruta=$_FILES["fileToUpload"]["tmp_name"];
$destino="uploads/".$foto;

copy($ruta,$destino);

$conexion = mysqli_connect($servidor,$user,$pw,$db) or 
	die("la cadena tiene algo malo");
	if (!$conexion) 
	{
    die("Conexion fallida: " . mysqli_connect_error());
}

$sql = "INSERT INTO usuario (nombre,apellido,correo,passw,foto)
VALUES ('$ed','$ap','$no','$pa','$destino')";

if (mysqli_query($conexion, $sql)) {
    echo "Nuevo usuario ingresado correctamente ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}

mysqli_close($conexion);

?>