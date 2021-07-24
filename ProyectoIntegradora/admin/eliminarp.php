<?php session_start();

require 'config.php';
require '../funtions.php';

comprobarSession();
$conexion2 = conexion2();
$conexion = conexion($bd_config);
include_once 'database.php';

if (!$conexion) {
    header('Location: ../error.php');
}
$id = id_articulo($_GET['id']);

$statementp = "SELECT idcompra FROM compra WHERE idproducto = '$id'";
$resul = mysqli_query($conexion2,$statementp);
$row=mysqli_fetch_assoc($resul);

if ($row['idcompra']>=1) {
    ?>
    <script>
        alert("Error al aliminar, deveras eliminar todas las compras a las que se conecta");
        history.back();
    </script>
    <?php 
}else {
    $statement = $conexion->prepare(
        "DELETE FROM productos WHERE idproductos = '$id'"
    );
    $statement->execute();

    if ($statement==true) {
        ?>
        <script>
            alert('Producto eliminado exitosamente');
            window.location.href='.';
        </script>
        <?php
    }else {
        ?>
        <script>
            alert('Error al eliminar, intente de nuevo');
            history.back();
        </script>
        <?php
    }
}

?>