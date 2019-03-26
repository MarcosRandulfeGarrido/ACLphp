<?php

  $usuario="usuario";
  $passwd ="passwd";
  if (isset($_POST['usuario']) AND  isset($_POST['passwd'])) {
    require_once 'BaseDatos.php';
    $acl = new ACL();
    $resultado=$acl->consultarUsuario($_POST['usuario'],$_POST['passwd']);
    var_dump($resultado);
    if($resultado){
      readfile("index.html");
    }
  }else{
   readfile("login.html");
  }

?>
