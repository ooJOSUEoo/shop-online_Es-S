<?php require'../views/header.php' ?>

    <div class="contenedor">
        <div class="post-single">
            <article>
                <h2 class="titulo">Registrar Marca</h2>
                <form class="formulario" method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <!-- Grupo: Nombre -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Nombre</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="titulo">
                            </div>
                    </div>

                    <!-- Grupo: Proveedor -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Proveedor</label>
                            <div class="formulario__grupo-input">
                                <select name="proveedor" id="" class="formulario__input">
                                    <?php
                                    $categoria = 'SELECT * FROM proveedor';
                                    $resul = mysqli_query($conexion2,$categoria);
                                    while ($row=mysqli_fetch_assoc($resul)) {
                                        
                                    ?>
                                    <option value="<?php echo ($row['idproveedor']) ?>"><?php echo ($row['Nombre']) ?> <?php echo ($row['ApellidoPaterno']) ?> <?php echo ($row['ApellidoMaterno']) ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                    </div>
                    
                    <div class="formulario__grupo formulario__grupo-btn-enviar">
                        <button type="submit" class="formulario-btn formulario__btn" id="enviar">Registrar Marca</button>
                    </div>
                </form>
            </article>
        </div>
    </div>

<?php require'../views/footer.php' ?>