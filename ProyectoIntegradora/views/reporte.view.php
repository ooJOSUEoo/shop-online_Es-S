<?php require'../views/header.php'; ?>

<div class="contenedor">
    <div class="post-single">
        <article>
            <h2 class="titulo descarga-t">Generar Reporte</h2>
            <p>NOTA: Seleccione primero el 1.-, despues de la descarga llene el Nombre, elija el archivo y seleccione 2.-</p><br>
            <a href="<?php echo RUTA ?>/reporte.exel.php" class="descarga">1.- Generar Reporte</a><br><br>
            <form class="formulario" method="POST" enctype="multipart/form-data"
                action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <input type="text" name="titulo" placeholder="Nombre. ej: Semana 1">
                <input type="file" name="thumb" id="" accept=".xls, .xlsx, .xml">
                <input type="submit" value="2.- Guardar Reporte en la Base de Datos">
            </form>
        </article>
    </div>
</div>


<?php require'footer.php' ?>