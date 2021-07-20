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
    $id = limpiarDatos($_POST['id']);
    $titulo = limpiarDatos($_POST['titulo']);
    $genero = limpiarDatos($_POST['genero']);
    $precio = limpiarDatos($_POST['precio']);
    $categoria = limpiarDatos($_POST['categoria']);
    $cantidad = limpiarDatos($_POST['cantidad']);
    $caducidad = limpiarDatos($_POST['caducidad']);
    $talla = limpiarDatos($_POST['talla']);
    $marca = limpiarDatos($_POST['marca']);
    $thumb_guardada = $_POST['thumb-guardada'];
    $thumb = $_FILES['thumb'];

    $carpeta = '../img/';

    if (empty($thumb['name'])) {
        $thumb = $thumb_guardada;
    }else {
        $archivo_subido = $_FILES['thumb']['tmp_name'];
        move_uploaded_file($archivo_subido, $carpeta . $_FILES['thumb']['name'] );
        $thumb = $_FILES['thumb']['name'];
        //unlink($thumb_guardada); //Eliminar la img guardada desde la carpeta img cuando haya una img nueva              
    }
            
        /*$statement = $conexion->prepare(
            'UPDATE productos SET NombreP = :titulo, Genero = :genero, precio = :precio, Cantidad = :cantidad, 
            Caducidad = :caducidad, Talla = :talla, Marca = :marca, img = :thumb, idcategoria = :categoria
            WHERE idproductos = :id'
        );
    
    $statement->execute(array(
        ':titulo' => $titulo,
        ':genero' => $genero,
        ':precio' => $precio,
        ':categoria' => $categoria,
        ':cantidad' => $cantidad,
        ':caducidad' => $caducidad,
        ':talla' => $talla,
        ':marca' => $marca,
        ':thumb' => $thumb,
        ':id' => $id
    ));*/

    ?>
    <script>
        alert('Producto editado exitosamente');
        location.href = './';
    </script>
    <?php  

}else {
    $id_articulo = id_articulo($_GET['id']);

    if (empty($id_articulo)) {
        header('Location: ' . RUTA . '/admin');
    }

    $post = obtener_post_por_id($conexion, $id_articulo);


    if (empty($post)) {
        header('Location: ' . RUTA . '/admin');
    }

    $post = $post[0];
}

require '../views/editar.view.php';

?>