<?php

include_once '../modelo/conexion.php';
Conexion::abrirConexion();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("../modelo/PHPMailer/Exception.php");
require("../modelo/PHPMailer/PHPMailer.php");
require("../modelo/PHPMailer/SMTP.php");

 ?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimum-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/recupCuenta.css">
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
            <div id="fondoRecu"></div>
            <div id="fonreCu"></div>
            <form class="" action="recuperar_cuenta.php" method="post">
              <label id="titulo" for="">Recuperar Cuenta</label>
              <label id="desc" for="">Si has olvidado tu cuenta, por favor proporciona la siguiente información para poder recuperarla.</label>
              <label id="email">Correo Electronico</label>
              <input type="text" id="emailinput" name="email" required>
              <button id="recup" type="submit" name="recup">Recuperar Cuenta</button>
            </form>
        </div>
        </section>

</body>
</html>

<?php
  if(isset($_POST['recup'])){

  $oMail = new PHPMailer(true);

  $email = $_POST["email"];
  $conexion = Conexion::obtenerConexion();
  $sql = "SELECT * FROM cliente WHERE Correo = '$email'";
  $ejecutar = mysqli_query($conexion,$sql);
  $fila = mysqli_num_rows($ejecutar);

  if($fila == 1){
  $rows = mysqli_fetch_assoc($ejecutar);

    try{
    $oMail->SMTPDebug = 0;
    $oMail->isSMTP();
    $oMail->Host = "smtp.gmail.com";
    $oMail->SMTPAuth = true;
    $oMail->Username = "tareasITOtec@gmail.com";
    $oMail->Password = "tareasITO";
    $oMail->SMTPSecure = "tls";
    $oMail->Port = 587;

    $oMail->setFrom("tareasITOtec@gmail.com","Soporte Tecnico");
    $correo = $rows['Correo'];
    $nombre = $rows['Nombre'];
    $oMail->addAddress("$correo","$nombre");

    $oMail->isHTML(true);
    $oMail->Subject = "Recuperacion de Cuenta";
    $contra = $rows['Contraseña'];
    $oMail->Body = "Recuperacion de Contraseña <br> Correo = '$correo' <br> Contraseña = '$contra' ";

    $oMail->send();

    echo "<script> alert('Correo Enviado '); </script>";

    } catch(Exception $e){
        echo "".$oMail->ErrorInfo;
      }
    } else {
        echo "<script> alert('No existe el correo '); </script>";
    }
  }
?>
