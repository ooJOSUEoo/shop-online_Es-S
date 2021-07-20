<?php session_start();

require 'config.php';
require '../funtions.php';

comprobarSession();
$conexion2 = conexion2();

$conexion = conexion($bd_config);

if (!$conexion) {
    header('Location: ../error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = limpiarDatos($_POST['titulo']);  

    $thumb = $_FILES['thumb']['name'];

    if (!empty($titulo)) {
        
    }

    $archivo_subido = RUTA . '/' . $blog_config['carpera_reportes'] . $_FILES['thumb']['name'];

    move_uploaded_file($thumb, $archivo_subido);

    $statement = $conexion->prepare(
        'INSERT INTO reporte_inventario (idreporte, nombre, archivo)
        VALUES (null, :titulo, :thumb)'
    );
    $statement->execute(array(

        ':titulo' => $titulo,
        ':thumb' => $_FILES['thumb']['name']
    ));
    
    header('Location: '. RUTA . '/admin/reporte.php');
    
}
require '../views/reporte.view.php';


?>