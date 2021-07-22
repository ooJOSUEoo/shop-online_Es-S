<?php
require 'admin/config.php';
require 'funtions.php';

$conexion = conexion($bd_config);
$conexion2 = conexion2();
$id_articulo = id_categoria($_GET['id']);

if (!$conexion) {
    header('Location: error.php');
}
$posts = obtener_post_categoria($blog_config['post_por_categoria'], $conexion, $id_articulo);

if (empty($id_articulo)) {
    header('Location: index.php');
}

$categoria = obtener_productos_por_idcategoria($conexion,$id_articulo);


$categoria = $categoria[0];

require 'views/categoria.view.php';
?>