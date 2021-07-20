<?php 
require 'admin/config.php';
require 'funtions.php';

$conexion = conexion($bd_config);
$conexion2 = conexion2();
include_once './admin/database.php';

session_start();

if (!$conexion) {
    header('Location: error.php');
}



if (isset($_SESSION['rol'])) {
    switch ($_SESSION['rol']) {
        case 1:
            header('Location: ' . RUTA . '/admin');
            break;
        case 2:
            header('Location: ' . RUTA);
            break;
        default;
    }
}

if (isset($_POST['email']) && isset($_POST['pass'])) {
    $email = limpiarDatos($_POST['email']);
    $pass = limpiarDatos($_POST['pass']);

    $db = new Database();
        $query = $db->connect()->prepare('SELECT * FROM cliente WHERE Email = :email AND pass = :pass');
        $query->execute(['email' => $email, 'pass' => $pass]);

        $row = $query->fetch(PDO::FETCH_NUM);
    
    if ($row==true) {
        //validar rol
        $rol = $row['7'];
        function Nombre_Cliente ($row){
            $nombre=$row['1'];
            return $nombre;
        }
        $_SESSION['rol'] = $rol;
        
        switch ($_SESSION['rol']) {
            case 1:
                header('Location: ' . RUTA . '/admin');
                break;
            case 2:
                header('Location: ' . RUTA);
                break;
            default;
        }

    }else {
        //no existe
        ?><script>
            alert('Cliente no registrado o datos erroneos, favor de crear una cuenta o probrar otros datos');
        </script><?php
    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo RUTA; ?>/css/estilos.css">
    <link rel="stylesheet" href="<?php echo RUTA; ?>/css/estilosIndex.css">
    <title>Elena's Shop</title>
</head>

<body>
    <header>
        <div class="contenedor">
            <div class="logo izquierda">
                <p><a href="<?php echo RUTA; ?>">Elena's Shop</a></p>
            </div>
            <div class="derecha">
                <form name="busqueda" class="buscar" action="<?php echo RUTA; ?>/buscar.php" method="get">
                    <input type="text" name="busqueda" placeholder="Buscar producto o marca">
                    <button type="submit" class="icono fa fa-search"></button>
                </form>
                <nav class="menu">
                    <ul>
                        <li><a href="<?php echo RUTA; ?>/crearCuenta.php">Crear Cuenta</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

<div class="contenedor">
    <div class="post-single">
        <article>
            <h2 class="titulo">Iniciar Sesion</h2>
            <form class="formulario" method="post" action="#">
                <!-- Grupo: Correo Electronico -->
                <div class="formulario__grupo" id="grupo__correo">
                            <label for="correo" class="formulario__label">Correo Electrónico</label>
                            <div class="formulario__grupo-input">
                                <input type="email" class="formulario__input" name="email" id="correo"
                                    placeholder="correo@correo.com" value="elena@gmail.com">
                            </div>

                        </div>
                <!-- Grupo: Contraseña -->
                <div class="formulario__grupo" id="grupo__password">
                            <label for="password" class="formulario__label">Contraseña</label>
                            <div class="formulario__grupo-input">
                                <input type="password" class="formulario__input" name="pass" id="password" value="elena">
                            </div>
                        </div>
                <div class="formulario__grupo formulario__grupo-btn-enviar">
                    <input class="formulario__btn" type="submit" value="Iniciar Sesion">
                </div>
            </form>
        </article>
    </div>
</div>

<?php require'./views/footer.php' ?>