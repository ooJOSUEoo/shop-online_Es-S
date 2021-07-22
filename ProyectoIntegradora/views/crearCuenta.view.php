<?php require'./views/headercrear.php' ?>
    <div class="contenedor">
        <div class="post-single">
            <article>
                <h2 class="titulo">Nueva Cuenta</h2>
                <main>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="formulario" id="formulario" method="POST">
                        <!-- Grupo: Nombre -->
                        <div class="formulario__grupo" id="grupo__nombre">
                            <label for="nombre" class="formulario__label">Nombre</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="nombre" id="nombre"
                                    placeholder="John">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El nombre tiene que ser de 3 a 18 dígitos y solo puede
                                contener letras.</p>
                        </div>
                        <!-- Grupo: ApellidoP -->
                        <div class="formulario__grupo" id="grupo__apellidop">
                            <label for="apellidop" class="formulario__label">Apellido Paterno</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="apellidop" id="apellidop"
                                    placeholder="Smith">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El apellido paterno tiene que ser de 3 a 18 dígitos y solo puede
                                contener letras.</p>
                        </div>
                        <!-- Grupo: ApellidoM -->
                        <div class="formulario__grupo" id="grupo__apellidom">
                            <label for="apellidom" class="formulario__label">Apellido Materno</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="apellidom" id="apellidom"
                                    placeholder="Marvin">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El apellido materno tiene que ser de 3 a 18 dígitos y solo puede
                                contener letras.</p>
                        </div>

                        <!-- Grupo: Correo Electronico -->
                        <div class="formulario__grupo" id="grupo__correo">
                            <label for="correo" class="formulario__label">Correo Electrónico</label>
                            <div class="formulario__grupo-input">
                                <input type="email" class="formulario__input" name="correo" id="correo"
                                    placeholder="correo@correo.com">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos,
                                guiones y guion bajo.</p>
                        </div>
                                               
                        <!-- Grupo: Teléfono -->
                        <div class="formulario__grupo" id="grupo__telefono">
                            <label for="telefono" class="formulario__label">Teléfono</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="telefono" id="telefono"
                                    placeholder="4491234567">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son
                                14 dígitos.</p>
                        </div>

                        <!-- Grupo: Contraseña -->
                        <div class="formulario__grupo" id="grupo__password">
                            <label for="password" class="formulario__label">Contraseña</label>
                            <div class="formulario__grupo-input">
                                <input type="password" class="formulario__input" name="password" id="password">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">La contraseña tiene que ser de 6 a 12 dígitos.</p>
                        </div>

                        <!-- Grupo: Contraseña 2 -->
                        <div class="formulario__grupo" id="grupo__password2">
                            <label for="password2" class="formulario__label">Repetir Contraseña</label>
                            <div class="formulario__grupo-input">
                                <input type="password" class="formulario__input" name="password2" id="password2">
                                <i class="formulario__validacion-estado fas fa-times-circle"></i>
                            </div>
                            <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
                        </div>

                        <!-- Grupo: Terminos y Condiciones -->
                        <div class="formulario__grupo" id="grupo__terminos">
                            <label class="formulario__label">
                                <input class="formulario__checkbox" type="checkbox" name="terminos" value="terminos" id="terminos">
                                Acepto los Terminos y Condiciones
                            </label>
                        </div>

                        <div class="formulario__mensaje" id="formulario__mensaje">
                            <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario
                                correctamente. </p>
                        </div>

                        <div class="formulario__grupo formulario__grupo-btn-enviar">
                            <button type="submit" class="formulario-btn" id="enviar">Enviar</button>
                        </div>
                    </form>
                </main><br>

            </article>
        </div>
    </div>

    <?php require'./views/footer.php' ?>