<?php

if (!isset($_SESSION)){
    session_start();
}
$conexion2=conexion2();
$RC = traer_categorias($conexion2);

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
                <p><a href="<?php echo RUTA; ?>">Elena's Shop <i class="fa fa-shopping-cart" aria-hidden="true"></i></a></p>
            </div>
            <div class="derecha">
                <form name="busqueda" class="buscar" action="<?php echo RUTA; ?>/buscar.php" method="get">
                    <input type="text" name="busqueda" placeholder="Buscar producto o marca">
                    <button type="submit" class="icono fa fa-search"></button>
                </form>
                <nav class="menu">
                    <ul>
                        <li><a class="<?php if ($_SESSION==true) {
                            echo 'header-cerrar';
                        } ?>" href="<?php echo RUTA; ?>/login.php">Inicia Sesion</a></li>
                        <li><a class="<?php if ($_SESSION==true) {
                            echo 'header-cerrar';
                        } ?>" href="<?php echo RUTA; ?>/crearCuenta.php">Crear Cuenta</a></li>
                        <li><a class="<?php if ($_SESSION==false) {
                            echo 'header-cerrar';
                        } ?>" id="cerrar" href="<?php echo RUTA; ?>/admin/cerrar.php">Cerrar Sesión</a></li>
                        <li><a href="<?php echo RUTA; ?>/perfil.php"><i class="fa fa-user-circle" aria-hidden="true"></i> <?php if ($_SESSION == true) {
                            echo $_SESSION['nombre'];
                        }else {
                            echo 'Pefil';
                        } ?></a></li>
                        <li><a class="<?php if (empty($_SESSION)) {
                            echo 'header-cerrar';
                        }elseif ($_SESSION['rol']>1) {
                            echo 'header-cerrar';
                        }else{
                            echo 'a';
                        } ?>" href="<?php echo RUTA; ?>/admin">Admin</a></li>
                        <input type="checkbox" name="" id="btn-menu">
                        <label class="label-menu" for="btn-menu"><i class="fa fa-bars" aria-hidden="true"></i></label>
                        
                    </ul>
                    <nav class="menu-catalogos" id="mc">
                        <div class="catalogos">
                            <ul>
                                <?php while ($cat=mysqli_fetch_assoc($RC)) {         
                                ?>
                                        <li><p ><a class="btn-categoria-" href="<?php echo RUTA ?>/categoria.php?id=<?php echo $cat["idcategoria"]; ?>">Catalogo de <?php echo $cat["NombreC"] ?></a></p></li>                                   
                                <?php } ?>
                            </ul>
                        </div>
                    </nav>
                        <script>
                            const mc = document.getElementById('mc');
                            const bm = document.getElementById('btn-menu');
                            bm.addEventListener('change', (e) => {
	                            e.preventDefault();
                                va = bm.checked;
                                if (va==true) {
                                    mc.style.cssText = 'margin-top: 0;';
                                }else{
                                    mc.style.cssText = 'margin-top: -200%;';
                                }
                            });
                        </script>
                </nav>
            </div>
        </div>
    </header>