<!DOCTYPE html>
<html>
<head>
	<title>Verificacion de datos</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div class="box">
<?php
session_start();
include("conexion.php");
if(isset($_POST['usuarios'])&& !empty($_POST['usuarios'])
 && isset($_POST['pass'])&& !empty($_POST['pass']))
{
	$conexion = mysqli_connect($servidor,$user,$pw,$db) or 
	die("la cadena tiene algo malo");
	$consulta = "select * from usuario where correo = '$_POST[usuarios]' and passw = '$_POST[pass]'";
	$result=mysqli_query($conexion,$consulta);
	if(!$result)
	{
		printf("Error: %s\n", mysqli_error($conexion));
		exit();
	}
	$fila = mysqli_fetch_array($result, MYSQL_BOTH);
	if ($fila['correo']==$_POST['usuarios']) 
	{
		$_SESSION['persona'] = $_POST['usuarios'];
		echo "Bienvenido al sistema";
		echo "<form action='index.php' method='POST'>
              <input type='hidden' name='id' value='"
              .$fila['id_usuario']."'/>
              <input type='submit' name='enviar' value='Menú Principal' class='btn'/>
              </form><br>";
		
	}
	else
		echo "combinacion erroena";
}
else
echo "debes llenar los campos";
?>
</div>
</body>
</html>
