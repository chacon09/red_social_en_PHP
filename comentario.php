<?php 
session_start();
include("conexion.php");
$conexion = mysqli_connect($servidor, $user, $pw, $db) or die("la cadena tiene algo malo");
$no=$_POST['comentb'];
$iduser= $_POST ['clav1'];
$idpu=$_POST['clav2'];  	


$conexion = mysqli_connect($servidor,$user,$pw,$db) or 
	die("la cadena tiene algo malo");
	if (!$conexion) 
	{
    die("Conexion fallida: " . mysqli_connect_error());
}

$sql = "INSERT INTO secundaria (clave,id_usuario,comentario2)
VALUES ('$idpu','$iduser','$no')";

if (mysqli_query($conexion, $sql)) {
    echo "Gracias por comentar ";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
}


mysqli_close($conexion);

?>