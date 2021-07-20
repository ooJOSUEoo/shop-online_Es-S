<?php require'header.php' ?>

<div class="contenedor">
    <h2>Panel de Control</h2>
    <form name="busqueda" class="buscar" action="<?php echo RUTA; ?>/buscar.admin.php" method="get">
        <input type="text" name="busqueda" placeholder="Buscar">
        <button type="submit" class="icono fa fa-search"></button>
    </form>
    <a href="./admin/nuevo.php" class="btn">Nuevo PRODUCTO</a>
    <a href="./admin/clientes.php" class="btn">CLIENTES</a>
    <a href="./admin/proveedores.php" class="btn">PROVEEDORES</a>
    <a href="./admin/compras.php" class="btn">COMPRAS</a>
    <a href="./admin/reporte.php" class="btn">REPORTE DE INVENTARIO</a>
    <h2><?php echo $titulo ?></h2>
    <?php foreach($resultados as $post): ?>
    <div class="post-single">
        <article>
            <h2 class="titulo"><?php echo $post['idproductos'] . '.-' . $post['NombreP']; ?></h2>
            <a href="editar.php?id=<?php echo $post['idproductos']; ?>">Editar</a>
            <a href="./single.php?id=<?php echo $post['idproductos']; ?>">Ver</a>
        </article>
    </div>
    <?php endforeach; ?>

    <?php require'./paginacion.php' ?>
</div>

<?php require'footer.php' ?>