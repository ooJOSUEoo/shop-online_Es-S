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
    $genero = limpiarDatos($_POST['genero']);
    $precio = limpiarDatos($_POST['precio']);
    $categoria = limpiarDatos($_POST['categoria']);
    $cantidad = limpiarDatos($_POST['cantidad']);
    $caducidad = limpiarDatos($_POST['caducidad']);
    $talla = limpiarDatos($_POST['talla']);
    $marca = limpiarDatos($_POST['marca']);
    $thumb = $_FILES['thumb']['name'];
    
    $valimg = getimagesize($_FILES['thumb']['tmp_name']);
    $size = $_FILES['thumb']['size'];//150000=150kb
    $carpeta = "../img/";
    $destino = $carpeta .$thumb;   
if (!is_dir($carpeta)) {
    mkdir($carpeta, 0777);
    ?>
    <script>
        alert('carpeta creada');
    </script>
    <?php  
}
    if ($valimg != false) {
        if ($size <= 150000) {
            $archivo_subido = $_FILES['thumb']['tmp_name'];
            move_uploaded_file($archivo_subido, $carpeta . $thumb );

            /*$statement = $conexion->prepare(
                    'INSERT INTO productos (idproductos, idcategoria, NombreP, Genero, Precio, Cantidad, Caducidad, Talla, marca, img)
                    VALUES (null, :categoria, :titulo, :genero, :precio, :cantidad, :caducidad, :talla, :marca, :thumb)'
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
                    ':thumb' => $_FILES['thumb']['name']
                ));*/
            ?>
            <script>
                alert('Producto creado exitosamente');
            </script>
            <?php  
        }else {
            ?>
            <script>
                alert('La imagen deve ser menor a 150Kb');
            </script>
            <?php 
        }
    }else {
        ?>
        <script>
            alert('El archivo elegido no es una imagen');
        </script>
        <?php 
    }
      
}
require '../views/nuevo.view.php';


?>