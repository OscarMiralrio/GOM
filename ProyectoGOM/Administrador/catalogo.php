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
    <link rel="stylesheet" href="css/catalogo.css">
    <link rel="stylesheet" href="Usuario/css/fontello.css">
    <title>Montaje e Instalaciones GOM S.A. de C.V.</title>
</head>

<body>
    <header>
        <div>
            <img src="../img/GOM.png" alt="" class="imgGOM">
        </div>
        <div class="menu">
            <a href="historial.php">CONTACTO</a>
            <a href="">SERVICIOS</a>
            <a href="">QUIENES SOMOS</a>
        </div>
    </header>
    <main>
        <section class="contenedor">
            <div class="catologo">
                <button class="addServ" onclick="window.location.href='addServicio.php'">Agregar Servicio Electrico</button>
                <table id="servicios">

                  <?php
                  $sql = "SELECT * FROM servicio";
                  $conexion = Conexion::obtenerConexion();
                  $ejecutar = mysqli_query($conexion, $sql);
                  while($row=mysqli_fetch_assoc($ejecutar)){
                  ?>
                  <tr>
                      <td class="img"><img src="img/null.jpg" alt=""></td>
                      <td class="desc">
                          <div class="dcp">
                              <h3><?php echo $row["Nombre_serv"] ?></h3>
                              <br><br>
                              <p><?php echo $row['Descripcion_serv']; ?></p>
                              <button class="btn1" onclick="location.href='modServicio.php?id=<?php echo $row['Id_Serv'] ?>'">Modificar Servicio Electrico</button>
                              <button class="btn2" onclick="location.href='modelo/eliminar.php?id=<?php echo $row['Id_Serv'] ?>'">Eliminar Servicio Electrico</button>
                          </div>
                      </td>
                  </tr>
                <?php }; mysqli_free_result($ejecutar); ?>
                </table>
            </div>
            <br>
        </section>
    </main>
</body>

</html>
