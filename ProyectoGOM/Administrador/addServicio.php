<?php

  include_once 'modelo/conexion.php';
  Conexion::abrirConexion();
 ?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/addServ.css">
    <link rel="stylesheet" href="Usuario/css/fontello.css">
    <title>Montaje e Instalaciones GOM S.A. de C.V.</title>
</head>

<body>
    <header>
        <div>
            <img src="../img/GOM.png" alt="" class="imgGOM">
        </div>
        <div class="menu">
            <a href="">CONTACTO</a>
            <a href="">SERVICIOS</a>
            <a href="">QUIENES SOMOS</a>
        </div>
    </header>
    <main>
        <section class="contenedor">
        <div class="agregar"> <br><br><br>
           <form action="addServicio.php" method="post">
                <label for="" class="etiqueta1" >Nombre del Servicio El&eacute;ctrico</label> <br>
                <input type="text" class="nombre" name="nombre" required> <br><br>
                <label for="" class="etiqueta2" >Descripci&oacute;n del Servicio El&eacute;ctrico</label> <br>
                <textarea id="textArea" name="Desc" required></textarea>
                <div class="btn2"><button id="boton" type="submit" name="agregar">Agregar Servicio El&eacute;ctrico</button></div>

           </form>
        </div>
        </section>
    </main>
</body>

</html>

<?php


  if(isset($_POST['agregar'])){
    $Nombre = $_POST['nombre'];
    $Descrip = $_POST['Desc'];
  try{
  $conexion = Conexion::obtenerConexion();
  $sql = "INSERT INTO servicio VALUES ('','$Nombre','$Descrip')";
  $ejecutar = mysqli_query($conexion, $sql);
  if($ejecutar){
    echo "<script> alert('Nuevo Servicio Agregadooo !!') </script>";
    header('location:catalogo.php');
  }
} catch(Exception $e){
  echo "<script> alert('Error!!') </script>";
}
}

 ?>
