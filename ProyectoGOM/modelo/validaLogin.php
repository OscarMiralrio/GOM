<?php
  include_once 'conexion.php';
  Conexion::abrirConexion();

  if(!empty($_POST["email"]) && !empty($_POST["contra"]) || empty($_POST["email"]) && empty($_POST["contra"])){
    $email = $_POST["email"];
    $contra = $_POST["contra"];

    try{
      $sql = "SELECT * FROM cliente WHERE Correo='$email' AND Contraseña='$contra'";
      $enlace = Conexion::obtenerConexion();
      $ejecutar = mysqli_query($enlace, $sql);
      $rows = mysqli_num_rows($ejecutar);

      if($rows==1){
        $fila = mysqli_fetch_assoc($ejecutar);
        header('Location: ../Usuario/catalogo.php?id='.$fila['Id_cliente'].'');
      } else {
        header('Location: ../Usuario/nouser.html');
      }

    } catch(Exception $e){
      echo "Error !!".$e->getMessage();
    }

  }

?>
