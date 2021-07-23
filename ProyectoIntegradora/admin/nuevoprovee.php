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
    $nombre = limpiarDatos($_POST['nombre']);  
    $apellidop = limpiarDatos($_POST['apellidop']);
    $apellidom = limpiarDatos($_POST['apellidom']);
    $tel = limpiarDatos($_POST['telefono']);
    $email = limpiarDatos($_POST['correo']);


    $proveedor = $conexion2->query("SELECT idproveedor FROM proveedor WHERE ApellidoPaterno='$apellidop' AND ApellidoMaterno='$apellidom'");
    $proveedor = $proveedor->num_rows;
            if ($proveedor==1) {
                ?>
                    <script>
                        alert('Error: Proveedor ya registrado, verifique sus datos');
                    </script>
                <?php 
            }else {
            $statement = $conexion->prepare(
                "INSERT INTO proveedor (idproveedor, Nombre, ApellidoPaterno, ApellidoMaterno, Email, Tel)
                VALUES (null, :nombre, :apellidop, :apellidom, :email, :tel)"
            );
            
            $statement->execute(array(
                ':nombre' => $nombre,
                ':apellidop' => $apellidop,
                ':apellidom' => $apellidom,
                ':email' => $email,
                ':tel' => $tel,
            ));

            if ($statement==true) {
                ?>
                <script>
                    alert('Proveedor registrado exitosamente');
                </script>
                <?php  
            }else {
                ?>
                <script>
                    alert('Error al registrar al proveedor, intente de nuevo');
                </script>
                <?php 
            } 
        }

}
require '../views/nuevoprovee.view.php';
?>
