<?php

$conexion = @mysqli_connect('localhost', 'root', 'root', 'yota');

if (!$conexion) {
  $dbConexion= false;
}else{
  $dbConexion= true;
}
$_SESSION['USUARIO_ID'] = 1;
?>