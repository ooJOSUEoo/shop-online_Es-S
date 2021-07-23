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

    $carpeta = "../reportes/";
    $destino = $carpeta .$thumb;  

    if (empty($titulo)) {
        ?>
        <script>
            alert('Escriba el nombre');
        </script>
        <?php  
    }elseif (empty($thumb)) {
        ?>
        <script>
            alert('Ingrese un archivo');
        </script>
        <?php
    }else {
        $archivo_subido = $_FILES['thumb']['tmp_name'];

        $statement = $conexion->prepare(
            'INSERT INTO reporte_inventario (idreporte, nombre, archivo)
            VALUES (null, :titulo, :thumb)'
        );
        $statement->execute(array(

            ':titulo' => $titulo,
            ':thumb' => $_FILES['thumb']['name']
        ));
        if ($statement==true && move_uploaded_file($archivo_subido, $carpeta . $thumb)==true) {
            ?>
            <script>
                alert('Reporte guardado');
            </script>
            <?php  
        }else {
            ?>
            <script>
                alert('Error al guardar el reporte, intente de nuevo');
            </script>
            <?php 
        }
    }
    
}
require '../views/reporte.view.php';


?>