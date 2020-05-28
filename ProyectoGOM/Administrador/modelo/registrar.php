<?php
  include_once 'conexion.php';
  Conexion::abrirConexion();

  $nombre = $_POST["nombre"];
  $email = $_POST["email"];
  $contra = $_POST["contra"];
  $telefono = $_POST["tel"];
  $clave = $_POST["clave"];

  try{
  $sql = "INSERT INTO administrador VALUES ('',
                                        '$nombre',
                                        '$contra',
                                        '$email',
                                        '$clave'
                                      )";
  $enlace = Conexion::obtenerConexion();
  $ejecutar = mysqli_query($enlace, $sql);
  if($ejecutar){
    echo "<script> alert('Registradooo!! ')</script>";
    header('Location: ../index.html');
  } else {

  }
} catch(Exception $e){
  echo "<p>Error al Insertar los datos del Empleado</p>";
}

?>
