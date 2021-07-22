<?php
require 'admin/config.php';
require 'funtions.php';
$conexion = conexion($bd_config);
$conexion2 = conexion2();
if (!$conexion) {
    header('Location: error.php');
}
$posts = obtener_post($blog_config['post_por_pagina'], $conexion);
$RC = traer_categorias($conexion2);

if (!$posts) {
    header('Location: error.php');
}
require 'views/index.view.php';
?>