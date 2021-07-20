<?php
require './admin/config.php';
require './funtions.php';

$conexion2 = conexion2();

header("Content-Type: appplication/xls");
header("Content-Disposition: attachment; filename= compras.xls");
?>
<table class="consulta" border="1">
    <thead>
        <tr>
            <td>
                <p><b>id</b></p>
            </td>
            <td>
                <p><b>Producto</b></p>
            </td>
            <td>
                <p><b>Cliente</b></p>
            </td>
            <td>
                <p><b>Fecha</b></p>
            </td>
            <td>
                <p><b>Total</b></p>
            </td>

        </tr>
    </thead>
    <?php
        $compra = "SELECT compra.idcompra as 'idcompra', productos.NombreP as 'NombreP', cliente.Nombre as 'cliente', FechaHora, Total FROM compra INNER JOIN productos ON compra.idproducto=productos.idproductos INNER JOIN cliente ON compra.idcliente=cliente.idcliente ORDER BY compra.idcompra DESC";
        $resul = mysqli_query($conexion2,$compra);
        while ($row=mysqli_fetch_assoc($resul)) {
                        
        ?>
    <tr>
        <td><?php echo $row["idcompra"] ?></td>
        <td><?php echo $row["NombreP"] ?></td>
        <td><?php echo $row["cliente"] ?></td>
        <td><?php echo $row["FechaHora"] ?></td>
        <td><?php echo $row["Total"] ?></td>
    </tr>
    <?php } ?>
</table>