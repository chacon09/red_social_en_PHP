<?php
session_start();
include("conexion.php"); 
$conexion = mysqli_connect($servidor, $user, $pw, $db) or die("la cadena tiene algo malo");
$target_dir = "imagenes/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$iduser= $_POST ['clav'];  	

if(!is_writable($target_dir)){
	echo "no tiene permisos";
}

else{	
	if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) && isset($_POST['txtnom']))
	{
		$text = $_POST ['txtnom'];		
		
		if ($conexion) {			
			$consulta = "INSERT INTO `publicacion` ( `imagenp`, `comentario`, `id_usuario`) 	
			VALUES ( '$text','$target_file', '$iduser' )";
			$resultado= mysqli_query($conexion, $consulta);
		
			if ($resultado) {
				header('location: index.php');
			}
			else {
				echo "Existe un error <br/>";
			}
			if (mysqli_close($conexion)){ 
				echo "desconexion realizada. <br />";
			} 
			else {
				echo "error en la desconexión";
			}
		}
		else {
			echo "funciona?";
		}
	}
	else if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
	{
		if ($conexion) {			
			$consulta = "INSERT INTO `publicacion` (`imagenp`, `comentario`, `id_usuario`) 	
			VALUES (NULL,'$target_file','$iduser')";
			$resultado= mysqli_query($conexion, $consulta);
		
			if ($resultado) {
				header('location: index.php');
			}
			else {
				echo "Existe un error <br/>";
			}		
			if (mysqli_close($conexion)){ 
				echo "desconexion realizada. <br/>";
			}
			else {
				echo "error en la desconexión";
			}
		}
		else {
			echo "funciona?";
		}
	}
	else{
		$text = $_POST ['txtnom'];		
		if ($conexion) {
			echo "conexion exitosa. <br />";			
			$consulta = "INSERT INTO `publicacion` (`imagenp`, `comentario`, `id_usuario`) 	
			VALUES ('$text', NULL,'$iduser')";
			$resultado= mysqli_query($conexion, $consulta);
		
			if ($resultado) {
				header('location: index.php');
			}
			else {
				echo "Existe un error <br/>";
			}
			if (mysqli_close($conexion)){ 
				echo "desconexion realizada. <br />";
			} 
			else {
				echo "error en la desconexión";
			}
		}
		else {
			echo "funciona?";
		}	
	}
}
?>