<?php

  include_once 'conexion.php';
  Conexion::abrirConexion();
  $id = $_GET['id'];
  $conexion = Conexion::obtenerConexion();
  $sql = "DELETE FROM servicio WHERE id_Serv = '$id'";
  $ejecutar = mysqli_query($conexion, $sql);

  header('location: ../catalogo.php');

 ?>
