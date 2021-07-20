<?php require'../views/header.php'; ?>

<div class="contenedor">
        <div class="post-single">
            <article>
                <h2 class="titulo descarga-t">PROVEEDORES</h2>
                <a href="<?php echo RUTA ?>/proveedores.exel.php" class="descarga" >Descargar proveedores</a> <br><br>
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
            </article>
        </div>
    </div>


<?php require'footer.php' ?>