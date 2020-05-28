<?php

  include_once 'conexion.php';
  Conexion::abrirConexion();

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require("PHPMailer/Exception.php");
  require("PHPMailer/PHPMailer.php");
  require("PHPMailer/SMTP.php");

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

    echo "<button onclick='location.href='../index.html''> Regresar</button>";

    } catch(Exception $e){
        echo "".$oMail->ErrorInfo;
      }
    } else {
        echo "<script> alert('No existe el correo '); </script>";
    }
?>
