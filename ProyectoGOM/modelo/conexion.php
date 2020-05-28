<?php
class Conexion {

  private static $conexion;

  public static function abrirConexion(){
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "gom";

    try{
      self::$conexion = new mysqli($host, $user, $pass, $db);
    }catch(Exception $e){
      echo "Error al conectar la base de datos";
    }
  }

  public static function cerrarConexion(){
    if(isset(self::$conexion)){
        self::$conexion=null;
    }
  }

  public static function obtenerConexion(){
    if(isset(self::$conexion)){
      return self::$conexion;
    } else {
      echo "Erro al conectar :(";
    }
  }

}
?>
