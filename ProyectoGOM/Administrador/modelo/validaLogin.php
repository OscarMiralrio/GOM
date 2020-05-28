<?php
  include_once 'conexion.php';
  Conexion::abrirConexion();

  if(!empty($_POST["id"]) && !empty($_POST["contra"]) || empty($_POST["id"]) && empty($_POST["contra"])){
    $id = $_POST["id"];
    $contra = $_POST["contra"];

    try{
      $sql = "SELECT * FROM administrador WHERE Id_Admin='$id' AND contraseña='$contra'";
      $enlace = Conexion::obtenerConexion();
      $ejecutar = mysqli_query($enlace, $sql);
      $rows = mysqli_num_rows($ejecutar);

      if($rows==1){
        $fila = mysqli_fetch_assoc($ejecutar);
        header('Location: ../catalogo.php');
      } else {
        header('Location: ../index.html');
      }

    } catch(Exception $e){
      echo "Error !!".$e->getMessage();
    }

  }

?>
