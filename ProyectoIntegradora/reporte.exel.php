<?php
require './admin/config.php';
require './funtions.php';

$conexion2 = conexion2();

header("Content-Type: appplication/xls");
header("Content-Disposition: attachment; filename= -.xls");
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
                <p><b>Categoria</b></p>
            </td>
            <td>
                <p><b>Genero</b></p>
            </td>
            <td>
                <p><b>Precio</b></p>
            </td>
            <td>
                <p><b>Cantidad</b></p>
            </td>
            <td>
                <p><b>Caducidad</b></p>
            </td>
            <td>
                <p><b>Talla</b></p>
            </td>
            <td>
                <p><b>Marca</b></p>
            </td>
            <td>
                <p><b>Img</b></p>
            </td>
        </tr>
    </thead>
    <?php
        $clientes = 'SELECT * FROM productos INNER JOIN categoria ON productos.idcategoria=categoria.idcategoria INNER JOIN marca ON productos.marca=marca.idmarca ORDER BY productos.idproductos DESC';
        $resul = mysqli_query($conexion2,$clientes);
        while ($row=mysqli_fetch_assoc($resul)) {
                        
        ?>
    <tr>
        <td><?php echo $row["idproductos"] ?></td>
        <td><?php echo $row["NombreP"] ?></td>
        <td><?php echo $row["NombreC"] ?></td>
        <td><?php echo $row["Genero"] ?></td>
        <td><?php echo $row["Precio"] ?></td>
        <td><?php echo $row["Cantidad"] ?></td>
        <td><?php echo $row["Caducidad"] ?></td>
        <td><?php echo $row["Talla"] ?></td>
        <td><?php echo $row["Nombre"] ?></td>
        <td><?php echo $row["img"] ?></td>
    </tr>
    <?php } ?>
</table>    