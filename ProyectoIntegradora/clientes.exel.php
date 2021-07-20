<?php
require './admin/config.php';
require './funtions.php';

$conexion2 = conexion2();

header("Content-Type: appplication/xls");
header("Content-Disposition: attachment; filename= clientes.xls");
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
            <td>
                <p><b>Pass</b></p>
            </td>
            <td>
                <p><b>Rol</b></p>
            </td>
        </tr>
    </thead>
    <?php
        $clientes = 'SELECT * FROM cliente ORDER BY idcliente DESC';
        $resul = mysqli_query($conexion2,$clientes);
        while ($row=mysqli_fetch_assoc($resul)) {
                        
        ?>
    <tr>
        <td><?php echo $row["idcliente"] ?></td>
        <td><?php echo $row["Nombre"] ?></td>
        <td><?php echo $row["ApellidoPaterno"] ?></td>
        <td><?php echo $row["ApellidoMaterno"] ?></td>
        <td><?php echo $row["Email"] ?></td>
        <td><?php echo $row["Tel"] ?></td>
        <td><?php echo $row["pass"] ?></td>
        <td><?php echo $row["idRol"] ?></td>
    </tr>
    <?php } ?>
</table>