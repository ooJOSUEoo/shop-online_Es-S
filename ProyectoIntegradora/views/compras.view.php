<?php require'../views/header.php'; ?>

<div class="contenedor">
        <div class="post-single">
            <article>
                <h2 class="titulo descarga-t">COMPRAS</h2>
                <a href="<?php echo RUTA ?>/compras.exel.php" class="descarga" >Descargar compras</a> <br><br>
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
                            <p><b>Fecha-Hora</b></p>
                        </td>
                        <td>
                            <p><b>Total</b></p>
                        </td>
                        <td>
                            <p><b>Otros</b></p>
                        </td>
                    </tr>
                    </thead>
                    <?php
                    $compra = "SELECT compra.idcompra as 'idcompra', productos.NombreP as 'NombreP', cliente.Nombre as 'cliente', FechaHora, Total FROM compra INNER JOIN productos ON compra.idproducto=productos.idproductos INNER JOIN cliente ON compra.idcliente=cliente.idcliente";
                    $resul = mysqli_query($conexion2,$compra);
                    while ($row=mysqli_fetch_assoc($resul)) {
                        
                    ?>
                    <tr>
                        <td><?php echo $row["idcompra"] ?></td>
                        <td><?php echo $row["NombreP"] ?></td>
                        <td><?php echo $row["cliente"] ?></td>
                        <td><?php echo $row["FechaHora"] ?></td>
                        <td><?php echo $row["Total"] ?></td>
                        <td><a href="<?php echo (RUTA.'/admin/editarcompra.php?id='.$row['idcompra']); ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                            <a href="<?php echo (RUTA.'/admin/eliminarcompra.php?id='.$row['idcompra']); ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </article>
        </div>
    </div>


<?php require'footer.php' ?>