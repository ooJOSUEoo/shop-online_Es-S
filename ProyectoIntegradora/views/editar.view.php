<?php require'../views/header.php' ?>

    <div class="contenedor">
        <div class="post-single">
            <article>
                <h2 class="titulo">Editar Articulo</h2>
                <form class="formulario" method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <input type="hidden" name="id" value="<?php echo $post['idproductos'] ?>">
                    <h3>Nombre</h3>
                    <input type="text" name="titulo" value="<?php echo $post['NombreP']; ?>">
                    <h3>Genero</h3>
                    <input type="text" name="genero" value="<?php echo $post['Genero']; ?>" placeholder="M H / M-H">
                    <h3>Precio</h3>
                    <input type="text" name="precio" value="<?php echo $post['Precio']; ?>">
                    <h3>Categoria</h3>
                    <select name="categoria" id="">
                        <?php
                        $categoria = 'SELECT * FROM categoria';
                        $resul = mysqli_query($conexion2,$categoria);
                        while ($row=mysqli_fetch_assoc($resul)) {
                            
                        ?>
                        <option value="<?php echo ($row['idcategoria']) ?>"><?php echo ($row['NombreC']) ?></option>
                        <?php } ?>
                    </select><br>
                    <h3>Cantidad</h3>
                    <input type="text" name="cantidad" value="<?php echo $post['Cantidad']; ?>" placeholder="Num, numero de  piezas o numero de pares">
                    <h3>Caducidad</h3>
                    <input type="text" name="caducidad" value="<?php echo $post['Caducidad']; ?>" placeholder="YYYY-MM-DD">
                    <h3>Talla</h3>
                    <input type="text" name="talla" value="<?php echo $post['Talla']; ?>" placeholder=" Ch / M /G / XL / *">
                    <h3>Marca</h3>
                    <select name="marca" id="">
                        <?php
                        $marca = 'SELECT * FROM marca';
                        $resul = mysqli_query($conexion2,$marca);
                        while ($row=mysqli_fetch_assoc($resul)) {
                            
                        ?>
                        <option value="<?php echo nl2br($row["idmarca"]) ?>"><?php echo nl2br($row["Nombre"]) ?></option>
                        <?php } ?>
                    </select><br><br>
                    <p>Imagen actual en la base de datos: <b><?php echo $post['img']; ?></b></p>
                    <input type="file" name="thumb" id="">
                    <input type="hidden" name="thumb-guardada" value="<?php echo $post['img']; ?>">
    
                    <input type="submit" value="Modificar producto">
                </form>
            </article>
        </div>
    </div>

<?php require'../views/footer.php' ?>