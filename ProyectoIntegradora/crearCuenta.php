<?php session_start();
require './admin/config.php';
require './funtions.php';

$conexion2 = conexion2();
$conexion = conexion($bd_config);
include_once './admin/database.php';

if (!$conexion) {
    header('Location: ../error.php');
}


if ($_SESSION) {
    header('Location: ' . RUTA);
} else {
    
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $nombre = limpiarDatos($_POST['nombre']);  
    $apellidop = limpiarDatos($_POST['apellidop']);
    $apellidom = limpiarDatos($_POST['apellidom']);
    $tel = limpiarDatos($_POST['telefono']);
    $pass = limpiarDatos($_POST['password']);
    $email = limpiarDatos($_POST['correo']);


    $clientes = $conexion2->query("SELECT Email FROM cliente WHERE Email='$email'");
    $clientes = $clientes->num_rows;
            if ($clientes==1) {
                ?>
                    <script>
                        const correo = document.getElementById('correo');
                        alert('Error: CORREO YA EXISTENTE, favor de utilizar utilizar otro.');
                        correo.value='';
                    </script>
                <?php 
            }else {
            $statement = $conexion->prepare(
                "INSERT INTO cliente (idcliente, Nombre, ApellidoPaterno, ApellidoMaterno, Email, Tel, pass, idRol)
                VALUES (null, :nombre, :apellidop, :apellidom, :email, :tel, :pass, '2')"
            );
            
            $statement->execute(array(
            
                ':nombre' => $nombre,
                ':apellidop' => $apellidop,
                ':apellidom' => $apellidom,
                ':email' => $email,
                ':tel' => $tel,
                ':pass' => $pass
            ));
            
            ?>
                <script>
                    alert('Cuenta creada exitosamente');
                    location.href='login.php';
                </script>
            <?php 
        }

}
require 'views/crearCuenta.view.php';
?>
