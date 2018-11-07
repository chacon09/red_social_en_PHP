<html>
<head>
	<title>Muro</title>
</head>
	<link rel="stylesheet" href="css/estilos3.css">
	<header>
  <h1>Bienvenido al sistema Grano de Silicio.S.A</h1>
<?php
session_start();
include("conexion.php");
$id = $_POST['id'];
if (isset($_SESSION['persona'])) {
	echo "Bienvenido  ". $_SESSION['persona'];
	
	
   header("Content-type:uploads");
  $conexion = mysqli_connect($servidor, $user, $pw, $db) or die("la cadena tiene algo malo");
  $consulta = "SELECT * FROM usuario WHERE id_usuario=$id";
  $result = mysqli_query($conexion, $consulta) or die ("Error en la consulta");

  while($row = mysqli_fetch_assoc($result))
  {
    $dir = $row['foto'];
    $nom = $row['nombre'];
    $apel = $row['apellido'];
    $correo = $row['correo'];

  }
  mysqli_free_result($result);
  }

else
{
	echo "No puedes ver esta pagina, por favor inicia sesion";
	echo "<a href =login.html>Sesion</a>";
}

 ?><br> 


 <HTML>
  <IMG src = <?php 
  echo $dir ?>  height='150' width='170'><br>
</HTML>

<h9><a href="cerrar.php">Cerrar sesion</a></h9>

</header>
<nav>
<h1>Bienvenido...</h1>
<h3>Nombre:  <?php echo "$nom"?> </h3>
<h3>apellido:  <?php echo $apel?> </h3>
<h3>correo: <?php echo "$correo"?></h3>   
<h1>Tienes algo en mente?</h1>
<form action="publica.php" method="POST" enctype="multipart/form-data">
            <center><table border="1">
            <tr bgcolor="skyblue">        
                <td><strong>Comentario:</strong></td><td> <input type="text" name="txtnom" value=""></td>
                <input type="hidden" name="clav" value= "<?php echo $id?>">

            </tr>
            <tr bgcolor="skyblue">
            <td bgcolor="skyblue"><strong>Foto:</strong></td>  <td><input type="file" name="fileToUpload" id="fileToUpload"></td>
            </tr>
            <tr>
            <td colspan="2" align="center" bgcolor="skyblue"><input type="submit" name="foto" value="Enviar"></td>
            </tr>
            </center></table>
        </form> 
        <br>
        <br>
        <?php  
    $archivo1 = fopen ("cont.txt","r");
    $contador1 = fgets($archivo1,1000);
   
    $archivo = fopen ("conteo.txt","r");
    $contador = fgets($archivo,1000);
    if($contador1 == 0)
{
  $contador1=1;
 
    $contador = $contador+1;
    

}
    echo "<h2> Numero de visitas: $contador</h2>";
    $archivo = fopen("conteo.txt", "w");
    fwrite($archivo, $contador);
    fclose($archivo);
    
    $archivo1 = fopen("cont.txt", "w");
    fwrite($archivo1, $contador1);
    fclose($archivo1);
    ?>
</nav>

<article>
<?php 
          include("conexion.php");
          $consulta = ("SELECT u.id_usuario, u.Nombre, u.foto, p.clave, p.comentario, p.imagenp, p.fecha_publicacion FROM usuario as u INNER JOIN publicacion as p  ON p.id_usuario=u.id_usuario order by id_usuario DESC LIMIT 0,15 "); 
          $result=mysqli_query($conexion, $consulta);

        
             while ($row = mysqli_fetch_array($result)):
              $cl = $row['clave'];
             ?>        
     
                <h4><center><?php echo $row['fecha_publicacion']?></center><img src =<?php echo $row['foto']?> alt = 'foto' height='60' width='50'><?php echo $row['Nombre']?></h4>
                <hr class='w3-clear'>                
                <p><?php echo $row['imagenp'] ?></p>
                <img src=<?php echo $row['comentario'] ?>  height='500' width='480'>
                <br>
                <br>
                <div class="caja1">
                <form action ='megusta.php' method='post'>
                  <input type='hidden' name='idp' value= <?php echo $row['clave']?>/>
                  <button class='btn' name="submitTyoe" value="like" >
                    <span><i class='fa fa-thumbs-up' href = 'megusta()'>Like </i></span>
                  </button>
                  <p>Me gusta: 0</p>
                </form>
                </div>
              <div class = 'caja1'>
                <form action ='comentario.php' method='post'>
                  <button class='btn'>
                    <span><i class='fa fa-comment'>Comentar </i></span><br>
 
                    <input type="hidden" name="clav1" value= <?php echo $id?>>
                    <input type="hidden" name="clav2" value= <?php echo $row['clave']?> >
                  </button><br> <input type="text" name="comentb" class="email">

                 
                  </form>
                  </div><br>
                 
                  <?php 
                  $consulta1 = ("SELECT u.id_usuario, u.nombre, u.foto, p.clave, s.comentario2 FROM secundaria AS s INNER JOIN publicacion AS p ON s.clave = p.clave INNER JOIN usuario AS u ON s.id_usuario = u.id_usuario WHERE s.clave= $row[clave] "); 
      $result1=mysqli_query($conexion, $consulta1);
     
      if ($row1 = mysqli_fetch_array($result1))
      {         
       
      do 
    {  
      echo "<div class = 'caja2>'<left><img src='$row1[foto]' style='width:60px'>  <h4>$row1[nombre]</h4>
  
        <p>$row1[comentario2]</p></left></div>
        " ;
             
    } 
    while ($row1 = mysqli_fetch_array($result1));

  }
  ?>

                </form>                            
              </div>
              
             <?php if($row['id_usuario'] == $id):?>
                    
                <div class='caja2'>
                <div class='contenido2'>
                <form action = 'editar.php' method='POST'>
                <input type='hidden' name='id' value=<?php echo $row['clave'] ?> />                    
                <center><button class='btn1' style='vertical-align:middle'><span>Editar </span></button></center></button> </form>
                </div>
                <div class='contenido2'>
                <form action ='eliminar.php' method='POST'>
                <input type='hidden' name='id' value= <?php echo $row['clave']?>/>
                <center><button class='btn1' style='vertical-align:middle'><span>Eliminar </span></button></center> </form>
                </div>
                </div>
              
               <?php endif; ?>

          
              <?php endwhile; ?>
 
</article>
</body>
</html>