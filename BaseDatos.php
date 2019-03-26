<?php
require_once('./Usuario.php');
class ACL{
  private $conexion;

 function __construct() {
      $this->conexion = new mysqli('localhost',"user","abc123.","ACLPHP");
      if ($this->conexion->connect_errno) {
        error_log("Error de conexión mysql ".$this->conexion->connect_error);
        echo $this->conexion->connect_error;
      }
  }

public function getUsuarios(){
    $usuarios=array();
      $result=$this->conexion->query("SELECT * FROM USUARIOS");
      $result = $result->fetch_assoc();
      foreach ( $result as $value){
        $usuarios[]=new Usuario($value["id_user"],$value["passwd"]);
        echo "Nombre";
        echo $value["nombre"];
        echo "";
       }
       return $usuarios;
  }

public function consultarUsuario($idUsuario, $passwd){
      $statement=$this->conexion->prepare("SELECT * FROM USUARIOS WHERE id_user= '?' AND passwd='?'");
      $statement->bind_param($idUsuario,$passwd);
      $result=$statement->execute();
      echo "Resultado de la búsqueda"+$result;
      if ($result->r) {
        return true;
      }
      return false;
  }
}

?>
