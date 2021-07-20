<?php
require './admin/config.php';
require './funtions.php';

$conexion2 = conexion2();

header("Content-Type: appplication/xls");
header("Content-Disposition: attachment; filename= proveedores.xls");
?>
<table class="consulta" border="1">
    <thead>
        <tr>
            <td>
                <p><b>id</b></p>
            </td>
            <td>
                <p><b>Nombre</b></p>
            </td>
            <td>
                <p><b>Apellido Paterno</b></p>
            </td>
            <td>
                <p><b>Apellido Materno</b></p>
            </td>
            <td>
                <p><b>Email</b></p>
            </td>
            <td>
                <p><b>Tel</b></p>
            </td>
        </tr>
    </thead>
    <?php
                    $proveedor = 'SELECT * FROM proveedor';
                    $resul = mysqli_query($conexion2,$proveedor);
                    while ($row=mysqli_fetch_assoc($resul)) {
                        
                    ?>
    <tr>
        <td><?php echo $row["idproveedor"] ?></td>
        <td><?php echo $row["Nombre"] ?></td>
        <td><?php echo $row["ApellidoPaterno"] ?></td>
        <td><?php echo $row["ApellidoMaterno"] ?></td>
        <td><?php echo $row["Email"] ?></td>
        <td><?php echo $row["Tel"] ?></td>
    </tr>
    <?php } ?>
</table>