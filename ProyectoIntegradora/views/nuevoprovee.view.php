<?php require'header.php' ?>
    <div class="contenedor">
        <div class="post-single">
            <article>
                <h2 class="titulo">Nuevo Poveedor</h2>
                <main>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="formulario" id="formulario" method="POST">
                        <!-- Grupo: Nombre -->
                        <div class="formulario__grupo" id="grupo__nombre">
                            <label for="nombre" class="formulario__label">Nombre</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="nombre" id="nombre"
                                    placeholder="John" require>
                            </div>
                        </div>
                        <!-- Grupo: ApellidoP -->
                        <div class="formulario__grupo" id="grupo__apellidop">
                            <label for="apellidop" class="formulario__label">Apellido Paterno</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="apellidop" id="apellidop"
                                    placeholder="Smith" require>
                            </div>
                        </div>
                        <!-- Grupo: ApellidoM -->
                        <div class="formulario__grupo" id="grupo__apellidom">
                            <label for="apellidom" class="formulario__label">Apellido Materno</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="apellidom" id="apellidom"
                                    placeholder="Marvin" require>
                            </div>
                        </div>

                        <!-- Grupo: Correo Electronico -->
                        <div class="formulario__grupo" id="grupo__correo">
                            <label for="correo" class="formulario__label">Correo Electrónico</label>
                            <div class="formulario__grupo-input">
                                <input type="email" class="formulario__input" name="correo" id="correo"
                                    placeholder="correo@correo.com" require>
                            </div>
                        </div>
                                               
                        <!-- Grupo: Teléfono -->
                        <div class="formulario__grupo" id="grupo__telefono">
                            <label for="telefono" class="formulario__label">Teléfono</label>
                            <div class="formulario__grupo-input">
                                <input type="number" class="formulario__input" name="telefono" id="telefono"
                                    placeholder="4491234567" require>
                            </div>
                        </div>

                        <div class="formulario__grupo formulario__grupo-btn-enviar">
                            <button type="submit" class="formulario-btn formulario__btn" id="enviar">Enviar</button>
                        </div>
                    </form>
                </main><br>

            </article>
        </div>
    </div>

    <?php require'footer.php' ?>