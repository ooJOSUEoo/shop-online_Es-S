<?php session_start();
require 'admin/config.php';
require 'funtions.php';

$conexion = conexion($bd_config);
$conexion2 = conexion2();

include_once './admin/database.php';

if (!$conexion) {
    header('Location: error.php');
}

if ($_SESSION['rol']) {
    $id = $_SESSION['id'];
    $nombre = $_SESSION['nombre'];
    $ap = $_SESSION['ap'];
    $am = $_SESSION['am'];
    $email = $_SESSION['email'];
    $tel = $_SESSION['tel'];
    $pass = $_SESSION['pass'];
} else {
    header('Location: ' . RUTA . '/login.php');
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idm = limpiarDatos($_POST['idcliente']);  
    $nombrem = limpiarDatos($_POST['nombre']);  
    $apm = limpiarDatos($_POST['ap']);
    $amm = limpiarDatos($_POST['am']);
    $telm = limpiarDatos($_POST['tel']);


        $statement = $conexion->prepare(
            'UPDATE cliente SET Nombre = :nombre, ApellidoPaterno = :ap, ApellidoMaterno = :am, Tel = :tel WHERE idcliente = :id '
        );
    
        $statement->execute(array(
    
            ':id' => $idm,
            ':nombre' => $nombrem,
            ':ap' => $apm,
            ':am' => $amm,
            ':tel' => $telm
    
        ));
    
        if ($statement==true) {
            ?>
            <script>
                alert('Actualizacion exitosa, cierra tu sesion y vuelve a iniciarla para ver los cambios');
            </script>
            <?php  
        }else {
            ?>
            <script>
                alert('Error al actualizar los datos, intente de nuevo');
            </script>
            <?php 
        }

}

require 'views/perfil.view.php';
?>