<?php require'../views/header.php' ?>

    <div class="contenedor">
        <div class="post-single">
            <article>
                <h2 class="titulo">Nuevo Articulo</h2>
                <a href="<?php echo RUTA. '/admin/nuevoprovee.php' ?>" class="btn">Nuevo Proveedor</a>
                <a href="<?php echo RUTA. '/admin/nuevamarca.php' ?>" class="btn">Registrar Marca</a>
                <a href="<?php echo RUTA. '/admin/nuevacatego.php' ?>" class="btn">Nueva Categoria</a>
                <form class="formulario" method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <!-- Grupo: Nombre -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Nombre</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="titulo">
                            </div>
                    </div>
                    <!-- Grupo: Genero -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Genero</label>
                            <div class="formulario__grupo-input">
                                <select name="genero" id="" class="formulario__input">
                                    <option value="H">H</option>
                                    <option value="M">M</option>
                                    <option value="HM">H-M</option>
                                </select>
                            </div>
                    </div>
                    <!-- Grupo: Precio -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Precio</label>
                            <div class="formulario__grupo-input">
                                <input type="number" class="formulario__input" name="precio" placeholder="200.00">
                            </div>
                    </div>
                    <!-- Grupo: Categoria -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Categoria</label>
                            <div class="formulario__grupo-input">
                                <select name="categoria" id="" class="formulario__input">
                                    <?php
                                    $categoria = 'SELECT * FROM categoria';
                                    $resul = mysqli_query($conexion2,$categoria);
                                    while ($row=mysqli_fetch_assoc($resul)) {
                                        
                                    ?>
                                    <option value="<?php echo ($row['idcategoria']) ?>"><?php echo ($row['NombreC']) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                    </div>
                    <!-- Grupo: Cantidad -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Cantidad</label>
                            <div class="formulario__grupo-input">
                                <input type="number" class="formulario__input" min="0" name="cantidad" placeholder="Num, numero de  piezas o numero de pares">
                            </div>
                    </div>
                    <!-- Grupo: Caducidad -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Caducidad</label>
                            <div class="formulario__grupo-input">
                                <input type="date" class="formulario__input" name="caducidad" placeholder="YYYY-MM-DD">
                            </div>
                    </div>
                    <!-- Grupo: Talla -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Talla</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="talla" placeholder="CH / M / G / XL / *" value="*">
                            </div>
                    </div>
                    <!-- Grupo: Marca -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Marca</label>
                            <div class="formulario__grupo-input">
                                <select name="marca" id="" class="formulario__input">
                                    <?php
                                    $marca = 'SELECT * FROM marca';
                                    $resul = mysqli_query($conexion2,$marca);
                                    while ($row=mysqli_fetch_assoc($resul)) {
                                        
                                    ?>
                                    <option value="<?php echo nl2br($row["idmarca"]) ?>"><?php echo nl2br($row["Nombre"]) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                    </div>
                    <!-- Grupo: Imagen -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Imagen</label>
                            <div class="formulario__grupo-input">
                                <input type="file" name="thumb" id="" accept="image/*"> 
                            </div>
                    </div>
                    <div class="formulario__grupo formulario__grupo-btn-enviar">
                        <button type="submit" class="formulario-btn formulario__btn" id="enviar">Crear Producto</button>
                    </div>
                </form>
            </article>
        </div>
    </div>

<?php require'../views/footer.php' ?>