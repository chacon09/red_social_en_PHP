<?php
session_start();
include("conexion.php"); 
$id= $_POST['id'];

			$conexion = mysqli_connect($servidor, $user, $pw, $db) or die("la cadena tiene algo malo");     				
			//Creamos nuestra consulta sql
			if ($conexion) 
{
			echo "conexion exitosa. <br />";
			$consulta= "DELETE FROM `publicacion` WHERE `publicacion`.`id_publicacion` = $id";
			$resultado= mysqli_query($conexion, $consulta);
		
			if ($resultado) 
		{
			echo "Publicación eliminada correctamente<br/>";
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

		header('location: index.php');
}

			//Ejecutamos la consutla		 
		else 
		{
			echo "Conexión Mala!\n";
		}
?>
