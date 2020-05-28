<?php

  include_once '../modelo/conexion.php';
  Conexion::abrirConexion();
  $idC = $_GET['id'];
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/catalogo.css">
    <title>Montaje e Instalaciones GOM S.A. de C.V.</title>
</head>
<body>

   <header>
       <a href="../index.html"><img id="GOM" src="img/GOM.png" alt=""></a>
        <div class="menu">
            <div class="dropdown" style="float:right;">
                <button class="dropbtn">CONTACTO</button>
                    <div class="dropdown-content">
                        <a href="cita.html">Agendar cita a la empresa</a>
                    </div>
            </div>
            <div class="dropdown" style="float:right;">
                <button class="dropbtn">SERVICIOS</button>
                    <div class="dropdown-content">
                        <a href="catalogo.html">Visualizar Catalogo</a>
                    </div>
            </div>
            <div class="dropdown" style="float:right;">
                <button class="dropbtn">QUINES SOMOS</button>
                    <div class="dropdown-content">
                        <a href="objetivos.html">Objetivos</a>
                        <a href="metas.html">Metas</a>
                        <a href="vision.html">Visiones</a>
                        <a href="mision.html">Misiones</a>
                    </div>
            </div>
        </div>
    </header>
       <section>
        <div id="contenedor">
        <div id="fondocatalogo"></div>
        <label id="tituloc" for="">Catalogo de Serivicos</label>
        <table id="servicios" >
          <?php
          $sql = "SELECT * FROM servicio";
          $conexion = Conexion::obtenerConexion();
          $ejecutar = mysqli_query($conexion, $sql);
          while($row=mysqli_fetch_assoc($ejecutar)){
          ?>
            <tr>
                <td><img src="img/servicio.jpg" alt=""></td>
                <td class="desc">
                   <div class="dcp">
                    <h3><?php echo $row["Nombre_serv"] ?></h3>
                    <br><br>
                    <p><?php echo $row["Descripcion_serv"]; ?><p>
                    <br><br>
                    <button class="btn" onclick="location.href='cita.php?id=<?php echo ''.$row['Id_Serv'].'&idCli='.$idC ?>'">Agendar Cita</button>
                </div>
                </td>
            </tr>
            <?php
          };
          mysqli_free_result($ejecutar);
            ?>
        </table>
        </div>
        </section>
</body>
</html>
