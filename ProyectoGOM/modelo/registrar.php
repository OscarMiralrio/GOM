<?php
  include_once 'conexion.php';
  Conexion::abrirConexion();

  $nombre = $_POST["nombre"];
  $paterno = $_POST["paterno"];
  $materno = $_POST["materno"];
  $direc = $_POST["direc"];
  $cp = $_POST["cp"];
  $empresa = $_POST["empresa"];
  $email = $_POST["email"];
  $contra = $_POST["contra"];
  $telefono = $_POST["telefono"];

  try{
  $sql = "INSERT INTO cliente VALUES ('',
                                        '$nombre',
                                        '$paterno',
                                        '$materno',
                                        '$email',
                                        '$telefono',
                                        '$direc',
                                        '$cp',
                                        '$contra',
                                        '$empresa'
                                      )";
  $enlace = Conexion::obtenerConexion();
  $ejecutar = mysqli_query($enlace, $sql);
  if($ejecutar){
    header('Location: ../Usuario/login.html');
  }
} catch(Exception $e){
  echo "<p>Error al Insertar los datos del Empleado</p>";
}

?>
