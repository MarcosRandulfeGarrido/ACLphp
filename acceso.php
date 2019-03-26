<?php
require_once("./BaseDatos.php");
$acl = new ACL();
echo $acl->consultarUsuario("usuario","abc123.");
