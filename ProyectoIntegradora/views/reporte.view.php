<?php require'../views/header.php'; ?>

<div class="contenedor">
    <div class="post-single">
        <article>
            <h2 class="titulo descarga-t">Generar Reporte</h2>
            <p>NOTA: Seleccione primero el 1.-, despues de la descarga llene el Nombre, elija el archivo y seleccione 2.-</p><br>
            <a href="<?php echo RUTA ?>/reporte.exel.php" class="descarga">1.- Generar Reporte</a><br><br>
            <form class="formulario" method="POST" enctype="multipart/form-data"
                action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <!-- Grupo: Nombre -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Nombre</label>
                            <div class="formulario__grupo-input">
                                <input type="text" class="formulario__input" name="titulo" placeholder="ej. Semana 1">
                            </div>
                    </div>
                <!-- Grupo: Imagen -->
                    <div class="formulario__grupo" id="grupo__nombre">
                        <label for="nombre" class="formulario__label">Archivo</label>
                            <div class="formulario__grupo-input">
                                <input type="file" name="thumb" id="" accept=".xls, .xlsx, .xml"> 
                            </div>
                    </div>

                <div class="formulario__grupo formulario__grupo-btn-enviar">
                    <button type="submit" class="formulario-btn formulario__btn" id="enviar">2.- Guardar Reporte en la Base de Datos</button>
                </div>
            </form>
        </article>
    </div>
</div>


<?php require'footer.php' ?>