<?php require'../views/header.php' ?>

    <div class="contenedor">
        <div class="post-single">
            <article>
                <h2 class="titulo">Crear Categoria</h2>
                <form style="grid-template-columns: 1fr" class="formulario" method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                    <!-- Grupo: Nombre -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Nombre</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="titulo">
                            </div>
                    </div>
                    <div class="formulario__grupo formulario__grupo-btn-enviar">
                        <button type="submit" class="formulario-btn formulario__btn" id="enviar">Crear Categoria</button>
                    </div>
                </form>
            </article>
        </div>
    </div>

<?php require'../views/footer.php' ?>