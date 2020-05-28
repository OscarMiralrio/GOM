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
    <link rel="stylesheet" href="css/form-login-admin.css">
    <link rel="stylesheet" href="Usuario/css/fontello.css">
    <link rel="stylesheet" href="css/tabla.css">
    <title>Montaje e Instalaciones GOM S.A. de C.V.</title>
</head>

<body>
    <header>
        <div>
            <img src="../img/GOM.png" alt="" class="imgGOM">
        </div>
        <div class="menu">
            <a href="">QUINES SOMOS</a>
            <a href="">SERVICIOS</a>
            <a href="">CONTACTO</a>
        </div>
    </header>
    <main>
        <section class="contenedor">
            <div class="login-admin">
                <label id="tlogin">Historial de Citas</label>
                <div id="formulario">
                  <table>
                    <tr>
                      <th>Id_Cita</th>
                      <th>Id_Cliente</th>
                      <th>Id_Serv</th>
                      <th>Fecha</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM cita";
                    $conexion = Conexion::obtenerConexion();
                    $ejecutar = mysqli_query($conexion,$sql);
                    while ($row=mysqli_fetch_assoc($ejecutar)) {
                      ?>
                      <tr>
                        <td><?php echo $row["Id_Cita"] ?></td>
                        <td><?php echo $row["Id_Cliente"] ?></td>
                        <td><?php echo $row["Id_Serv"] ?></td>
                        <td><?php echo $row["Fecha"] ?></td>
                      </tr>
            <?php
            };
            mysqli_free_result($ejecutar);
            ?>
                  </table>
                    <button class="btn" onclick="window.location.href='index.html'">Salir</button>
                </div>
            </div>
            <br>
        </section>
    </main>
</body>

</html>
