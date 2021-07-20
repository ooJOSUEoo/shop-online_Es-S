<?php session_start();
require '../admin/config.php';
require '../funtions.php';

comprobarSession();

$conexion2 = conexion2();

require '../views/clientes.view.php';
?>