<?php require'header.php' ?>

<div class="contenedor">
    <div class="post-single">
        <article class="single-article">
            <div>
                <form class="formulario" action="">
                    <!-- Grupo: iD -->
                            <input type="hidden" class="formulario__input" name="" id="" value="<?php echo $id; ?>">
                    <!-- Grupo: Nombre -->
                    <div class="formulario__grupo" id="grupo__password">
                        <label for="password" class="formulario__label">Nombre</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="" id="" value="<?php echo $nombre; ?>">
                        </div>
                    </div>
                    <!-- Grupo: AP -->
                    <div class="formulario__grupo" id="grupo__password">
                        <label for="password" class="formulario__label">Apellido Paterno</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="" id="" value="<?php echo $ap; ?>">
                        </div>
                    </div>
                    <!-- Grupo: AM -->
                    <div class="formulario__grupo" id="grupo__password">
                        <label for="password" class="formulario__label">Apellido Materno</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="" id="" value="<?php echo $am; ?>">
                        </div>
                    </div>
                    <!-- Grupo: Email -->
                    <div class="formulario__grupo" id="grupo__password">
                        <label for="password" class="formulario__label">Correo Electronico</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="" id="" value="<?php echo $email; ?>">
                        </div>
                    </div>
                    <!-- Grupo: Tel -->
                    <div class="formulario__grupo" id="grupo__password">
                        <label for="password" class="formulario__label">Tel</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="" id="" value="<?php echo $tel; ?>">
                        </div>
                    </div>
                    <!-- Grupo: Actualizar -->
                    <div class="formulario__grupo formulario__grupo-btn-enviar">
                    <input class="formulario__btn" type="submit" value="Actualizar Datos">
                </div>
                </form>
            </div>
        </article>
    </div>
</div>

<?php require'footer.php' ?>