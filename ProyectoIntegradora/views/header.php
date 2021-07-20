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
                        <li><a href="<?php echo RUTA; ?>/login.php">Inicia Sesion</a></li>
                        <li><a href="<?php echo RUTA; ?>/crearCuenta.php">Crear Cuenta</a></li>
                        <li><a class="" id="cerrar" href="<?php echo RUTA; ?>/admin/cerrar.php">Cerrar Sesión</a></li>
                        <li><a href="<?php echo RUTA; ?>/">Anonimo</a></li></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>