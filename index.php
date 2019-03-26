<?php
  session_start();
  if (isset($_SESSION['id_user'])){
    readfile("inicio.html");
  }else{
    require_once("BaseDatos.php");
    $acl = new ACL();
  /*  $usuarios=$acl->getUsuarios();
    print_r($usuarios);*/
  $resultado=  $acl->consultarUsuario("admin","abc123.");
    //header('Location: login.php');
    var_dump($resultado);
  }
 ?>
