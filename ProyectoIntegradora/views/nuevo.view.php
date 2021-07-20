<?php require'../views/header.php' ?>

    <div class="contenedor">
        <div class="post-single">
            <article>
                <h2 class="titulo">Nuevo Articulo</h2>
                <form class="formulario" method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="text" name="titulo" placeholder="Nombre">
                    <input type="text" name="genero" placeholder="Genero: M / H / M-H ">
                    <input type="text" name="precio" placeholder="Precio">
                    <h3>Categoria</h3>
                    <select name="categoria" id="">
                        <?php
                        $categoria = 'SELECT * FROM categoria';
                        $resul = mysqli_query($conexion2,$categoria);
                        while ($row=mysqli_fetch_assoc($resul)) {
                            
                        ?>
                        <option value="<?php echo ($row['idcategoria']) ?>"><?php echo ($row['NombreC']) ?></option>
                        <?php } ?>
                    </select><br><br>
                    <input type="text" name="cantidad" placeholder="Cantidad: Num, numero de  piezas o numero de pares">
                    <input type="text" name="caducidad" placeholder="Caducidad YYYY-MM-DD">
                    <input type="text" name="talla" placeholder="Talla: CH / M / G / XL / *">
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
                    <input type="file" name="thumb" id="" accept="image/*">        
                    <input type="submit" value="Crear Articulo">
                </form>
            </article>
        </div>
    </div>

<?php require'../views/footer.php' ?>