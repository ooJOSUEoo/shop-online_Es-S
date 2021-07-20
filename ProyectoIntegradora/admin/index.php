<?php session_start();

//Archivo index del admin
require 'config.php';
require '../funtions.php';

$conexion = conexion($bd_config);
$conexion2 = conexion2();

comprobarSession();

if (!$conexion) {
    header('Location: ../error.php');
}

$posts = obtener_post($blog_config['post_por_pagina'], $conexion);


require '../views/admin_index.view.php';

?>