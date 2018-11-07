<html>
<body>
<?php
session_start();
include("conexion.php"); 
$id = $_POST['id'];
$texto= $_POST ['imagenp'];
$conexion = mysqli_connect($servidor, $user, $pw, $db) or die("la cadena tiene algo malo");     
if ($conexion) 
{
		echo "conexion exitosa. <br />";		
		$consulta= "UPDATE `publicacion` SET `imagenp` = '$texto' WHERE `publicacion`.`clave` = '$id'";
		$resultado= mysqli_query($conexion, $consulta);
		
		if ($resultado) 
		{
			echo "Publicación Actualizada<br/>";
			echo "<a href = index.php> Regresar </a>";
		}
		else 
		{
			echo "error en la ejecución de la consulta. <br />";
		}
		
		if (mysqli_close($conexion))
		{ 
			echo "desconexion realizada. <br />";
		} 
		else 
		{
			echo "error en la desconexión";
		}
}
header('Location: index.php');
?>
