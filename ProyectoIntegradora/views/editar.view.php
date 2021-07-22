<?php require'../views/header.php' ?>

    <div class="contenedor">
        <div class="post-single">
            <article>
                <h2 class="titulo">Editar Articulo</h2>
                <form class="formulario" method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <input type="hidden" name="id" value="<?php echo $post['idproductos'] ?>">
                    <!-- Grupo: Nombre -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Nombre</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="titulo" value="<?php echo $post['NombreP']; ?>">
                            </div>
                    </div>
                    <!-- Grupo: Genero -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Genero</label>
                            <div class="formulario__grupo-input">
                                <select name="genero" id="" class="formulario__input">
                                <option selected value="<?php echo $post['Genero']; ?>"><?php echo $post['Genero']; ?></option>
                                    <?php
                                    $gene=$post['Genero'];
                                    $genero = "SELECT DISTINCT(Genero)as'Genero' FROM productos WHERE Genero!='$gene'";
                                    $resul = mysqli_query($conexion2,$genero);
                                    while ($row=mysqli_fetch_assoc($resul)) {
                                        
                                    ?>
                                    <option value="<?php echo nl2br($row["Genero"]) ?>"><?php echo nl2br($row["Genero"]) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                    </div>
                    <!-- Grupo: Precio -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Precio</label>
                            <div class="formulario__grupo-input">
                                <input type="number" step="any" class="formulario__input" name="precio" value="<?php echo $post['Precio']; ?>" placeholder="200.00">
                            </div>
                    </div>
                    <!-- Grupo: Categoria -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Categoria actual</label>
                            <div class="formulario__grupo-input">
                                <select name="categoria" id="" class="formulario__input">
                                    <option selected value="<?php echo nl2br($categoria['idcategoria']); ?>"><?php echo nl2br($categoria['NombreC']); ?></option>
                                    <?php
                                    $idcate = $categoria['idcategoria'];
                                    $categoria = "SELECT * FROM categoria WHERE idcategoria!=$idcate";
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
                        <label for="nombre" class="formulario__label">Cantidad </label>
                            <div class="formulario__grupo-input">
                                <input type="number" class="formulario__input" min="0" name="cantidad" value="<?php echo $post['Cantidad']; ?>" placeholder="Num, numero de  piezas o numero de pares">
                            </div>
                    </div>
                    <!-- Grupo: Caducidad -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Caducidad</label>
                            <div class="formulario__grupo-input">
                                <input type="date" class="formulario__input" name="caducidad"  value="<?php echo $post['Caducidad']; ?>">
                            </div>
                    </div>
                    <!-- Grupo: Talla -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Talla</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="talla" value="<?php echo $post['Talla']; ?>" placeholder="CH / M / G / XL / * | num-">
                            </div>
                    </div>
                    <!-- Grupo: Marca -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Marca actual</label>
                            <div class="formulario__grupo-input">
                                <select name="marca" id="" class="formulario__input">
                                <option selected value="<?php echo nl2br($marca['idmarca']); ?>"><?php echo nl2br($marca['Nombre']); ?></option>
                                    <?php
                                    $idmar=$marca['idmarca'];
                                    $marca = "SELECT * FROM marca WHERE idmarca!=$idmar";
                                    $resul = mysqli_query($conexion2,$marca);
                                    while ($row=mysqli_fetch_assoc($resul)) {
                                        
                                    ?>
                                    <option value="<?php echo nl2br($row["idmarca"]) ?>"><?php echo nl2br($row["Nombre"]) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                    </div>
                    <!-- Grupo: Imagen -->
                    <div class="thumb" style="display:flex;flex-direction:column;align-items:center;">
                    <p>Imagen actual en la base de datos: <b><?php echo $post['img']; ?></b></p>
                    <img src="<?php echo RUTA; ?>/img/<?php echo $post['img'] ?>"
                        alt="<?php echo $post['NombreP'] ?>" style="width: 40%;">
                    </div>
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Nueva imagen</label>
                            <div class="formulario__grupo-input">
                                <input type="file" name="thumb"  id="" accept="image/*"> 
                            </div>
                    </div>
                    <input type="hidden" name="thumb-guardada" value="<?php echo $post['img']; ?>">
                    <div class="formulario__grupo formulario__grupo-btn-enviar">
                        <button type="submit" class="formulario-btn formulario__btn" id="enviar">Modificar producto</button>
                    </div>
                </form>
            </article>
        </div>
    </div>

<?php require'../views/footer.php' ?>