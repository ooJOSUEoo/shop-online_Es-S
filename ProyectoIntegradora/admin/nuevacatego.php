<?php session_start();
require 'config.php';
require '../funtions.php';

$conexion2 = conexion2();
$conexion = conexion($bd_config);
include_once 'database.php';

comprobarSession();

if (!$conexion) {
    header('Location: ../error.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $nombre = limpiarDatos($_POST['titulo']);  


    $categoria = $conexion2->query("SELECT idcategoria FROM categoria WHERE NombreC='$nombre'");
    $categoria = $categoria->num_rows;
            if ($categoria==1) {
                ?>
                    <script>
                        alert('Error: Categoria ya registrada, verifique sus datos');
                    </script>
                <?php 
            }else {
            $statement = $conexion->prepare(
                "INSERT INTO categoria (idcategoria, NombreC)
                VALUES (null, :nombre)"
            );
            
            $statement->execute(array(
                ':nombre' => $nombre,
            ));

            if ($statement==true) {
                ?>
                <script>
                    alert('Categoria registrada exitosamente');
                </script>
                <?php  
            }else {
                ?>
                <script>
                    alert('Error al registrar la categoria, intente de nuevo');
                </script>
                <?php 
            } 
        }

}
require '../views/nuevacatego.view.php';
?>
