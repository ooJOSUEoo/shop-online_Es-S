<?php 
require './admin/config.php';
require './funtions.php';

$conexion2 = conexion2();
$conexion = conexion($bd_config);
include_once './admin/database.php';

if (!$conexion) {
    header('Location: ../error.php');
}


$db = new Database();
        $query = $db->connect()->prepare('SELECT * FROM cliente');
        $query->execute();

        $row = $query->fetch(PDO::FETCH_NUM);
if ($row==true) {
    //validar rol
    $nombre = $row['1'];

    $_SESSION['nombre'] = $nombre;
    
    switch ($_SESSION['nombre']) {
        case 1:
            header('Location: ' . RUTA . '/admin');
            break;
        case 2:
            header('Location: ' . RUTA);
            break;
        default;
    }

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
        echo $clientes;
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
