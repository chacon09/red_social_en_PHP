<?php 
session_start();
include("conexion.php");
   $id = $_POST['id'];   
 	$conexion = mysqli_connect($servidor, $user, $pw, $db) or die("la cadena tiene algo malo");
	$consulta = ("Select clave, imagenp from publicacion where clave= $id"); 
	
	$result=mysqli_query($conexion, $consulta);
     
		if ($row = mysqli_fetch_array($result))
{    			
   do 
   {   
     $id = $row['clave']; 	
    $texto = $row['imagenp'];
   } 

   while ($row = mysqli_fetch_array($result)); 
} 
	else 
	{ 
		echo "¡ No se ha encontrado ningún registro !"; 
	} 
?>
<HTML>
<head>
	<title>Editar Publiación</title>     
</head>
<body>
<div>

   	 		<form action = 'update.php' method = 'post'>
   			<label1>Publicación </label1><br><br>
   			<input type = 'text' value = "<?php echo $texto?>" name="texto"><br><br>
   			<input type='hidden' name='id' value= '<?php echo $id?>'/>                            
   			<input type = 'submit' value = "Editar">   
            </form>            
   			</div>
   			</body>
   			</HTML>
	