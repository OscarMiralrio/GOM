<?php
  include_once '../modelo/conexion.php';
  Conexion::abrirConexion();

  $id = $_GET['id'];
  $idCli = $_GET['idCli'];

  $conexion = Conexion::obtenerConexion();

  $sqlS = "SELECT * FROM cliente WHERE Id_cliente = '$id'";
  $ejecutarS = mysqli_query($conexion, $sqlS);
  $filaCli = mysqli_fetch_assoc($ejecutarS);
  $ID_CLI = "";
  while ($filaCli) {
    $ID_CLI = $filaCli['Id_cliente'];
  }

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/cita.css">
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
        <div id="imagen">
               <img id="gom1" src="img/gom.jpg" alt="">
           </div>
            <div id="principal">
            </div>
        </div>
        <div class="cita">
          <form action="cita.php" method="post">
            <?php
            $sql = "SELECT * FROM servicio WHERE Id_Serv = '$id'";
            $ejecutar = mysqli_query($conexion, $sql);
            while($fila = mysqli_fetch_assoc($ejecutar)){
            ?>
            <label id="titulo" for="">Agendar Cita</label>
            <input type="hidden" name="id" value="<?php echo $fila['Id_Serv']; ?>">
            <label id="servicio" for="">Nombre del Servicio</label>
            <input type="text" id="inputservicio" name="nombre" value="<?php echo $fila['Nombre_serv']; ?>" required>
            <label id="dia" for="">Dia</label>
            <input type="text" id="inputdia" name="dia" required>
            <label id="mes" for="">Mes</label>
            <input type="text" id="inputmes" name="mes" required>
            <label id="anio" for="">Año</label>
            <input type="text" id="inputanio" name="anio" required>
            <label id="hora" for="">Hora</label>
            <input type="text" id="inputhora" name="hora" required><br>
            <button id="agendar" name="agendar">Agendar Cita</button>
            <button id="imprimir">Imprimir Comprobante</button>
          <?php }; ?>
            </form>
        </div>
        <button id="btn" type="button" name="button" onclick="location.href='../index.html'">Salir</button>
        </section>

</body>
</html>

<?php

  if(isset($_POST['agendar'])){
    $idS = $_POST['id'];
    $dia = $_POST['dia'];
    $mes = $_POST['mes'];
    $anio = $_POST['anio'];
    $fecha = $anio."-".$mes."-".$dia;

    $sql2 = "INSERT INTO cita VALUES ('','$ID_CLI','$idS','$fecha')";
    $ejecutar2 = mysqli_query($conexion, $ejecutar2);

    if ($ejecutar2) {
      echo "<script> alert('Cita Agendadaaaa!!'); </script>";
    }


  }
 ?>
