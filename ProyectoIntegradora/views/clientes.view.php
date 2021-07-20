<?php require'../views/header.php'; ?>

<div class="contenedor">
        <div class="post-single">
            <article>
                <h2 class="titulo descarga-t">CLIENTES</h2>
                <a href="<?php echo RUTA ?>/clientes.exel.php" class="descarga" >Descargar clientes</a> <br><br>
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
                    $clientes = 'SELECT * FROM cliente';
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
            </article>
        </div>
    </div>


<?php require'footer.php' ?>