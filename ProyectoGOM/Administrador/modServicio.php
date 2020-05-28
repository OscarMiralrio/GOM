<?php
  include_once '../modelo/conexion.php';
  Conexion::abrirConexion();

  $id = $_GET['id'];
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
           <form action="modServicio.php" method="post">
             <?php
             $sql = "SELECT * FROM servicio WHERE Id_Serv = '$id'";
             $conexion = Conexion::obtenerConexion();
             $ejecutar = mysqli_query($conexion, $sql);
             while($fila = mysqli_fetch_assoc($ejecutar)){
             ?>
                <input type="hidden" name="id" value="<?php echo $fila['Id_Serv']; ?>">
                <label for="" class="etiqueta1">Nombre del Servicio El&eacute;ctrico</label> <br>
                <input type="text" class="nombre" name="nombre" value="<?php echo $fila['Nombre_serv']; ?>" required> <br><br>
                <label for="" class="etiqueta2">Descripci&oacute;n del Servicio El&eacute;ctrico</label> <br>
                <textarea name="desc" id="textArea" value="<?php echo $fila['Descripcion_serv']; ?>" required></textarea>
                <div class="btn2"><button id="boton2" type="summit"  name="modificar">Modificar Servicio El&eacute;ctrico</button></div>
              <?php }; mysqli_free_result($ejecutar); ?>
           </form>
        </div>
        </section>
    </main>
</body>
</html>

<?php
  if(isset($_POST['modificar'])){
    $ids = $_POST['id'];
    $nombre = $_POST['nombre'];
    $desc = $_POST['desc'];
    $sql2 = "UPDATE servicio SET Nombre_serv='$nombre', Descripcion_serv='$desc' WHERE Id_Serv='$ids'";
    $ejecutar2 = mysqli_query($conexion, $sql2);
    if($nombre=1){
      header('location: catalogo.php');
    }
  }
 ?>
