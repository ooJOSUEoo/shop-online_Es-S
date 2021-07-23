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
    $nombre = limpiarDatos($_POST['titulo']);  
    $proveedor = limpiarDatos($_POST['proveedor']);

    $marca = $conexion2->query("SELECT idmarca FROM marca WHERE Nombre = '$nombre'");
    $marca = $marca->num_rows;
    if ($marca==1) {
        ?>
            <script>
                alert('Error: Marca ya registrada, verifique sus datos');
            </script>
        <?php 
    }else {    

        $statement = $conexion->prepare(
                'INSERT INTO marca (idmarca, Nombre, idproveedor)
                VALUES (null, :nombre, :proveedor)'
            );

            $statement->execute(array(

                ':nombre' => $nombre,
                ':proveedor' => $proveedor,
            ));
                    
        if ($statement==true) {
            ?>
            <script>
                alert('Marca registrada exitosamente');
            </script>
            <?php  
        }else {
            ?>
            <script>
                alert('Error al registrar la marca, intente de nuevo');
            </script>
            <?php 
        }

    }
      
}
require '../views/nuevamarca.view.php';


?>