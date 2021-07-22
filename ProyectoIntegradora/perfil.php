<?php session_start();
require 'admin/config.php';
require 'funtions.php';

$conexion = conexion($bd_config);
$conexion2 = conexion2();

include_once './admin/database.php';

if (!$conexion) {
    header('Location: error.php');
}

if ($_SESSION['rol']) {
    $id = $_SESSION['id'];
    $nombre = $_SESSION['nombre'];
    $ap = $_SESSION['ap'];
    $am = $_SESSION['am'];
    $email = $_SESSION['email'];
    $tel = $_SESSION['tel'];
    $pass = $_SESSION['pass'];
} else {
    header('Location: ' . RUTA . '/login.php');
}

require 'views/perfil.view.php';
?>