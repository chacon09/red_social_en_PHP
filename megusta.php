<?php  
 //index.php  
session_start();
include("conexion.php");
$ip = $_POST['idp'];
  	$conexion = mysqli_connect($servidor, $user, $pw, $db) or die("la cadena tiene algo malo");

 
    if ( !empty($_POST['submitType']) && ( $_POST['submitType'] == 'like' ) ) {
        $sql = "UPDATE publicacion set `likes` = `likes`+1 where `clave` = '$ip'";
        $result=mysqli_query($conexion,$sql);
    }
 
 ?>  