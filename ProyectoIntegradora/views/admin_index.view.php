<?php require'../views/header.php' ?>

<div class="contenedor">
    <a href="<?php echo RUTA.'/admin'?>"><h2>Panel de Control</h2></a>
    <form name="busqueda" class="buscar" action="<?php echo RUTA; ?>/buscar.admin.php" method="get">
        <input type="text" name="busqueda" placeholder="Buscar">
        <button type="submit" class="icono fa fa-search"></button>
    </form>
    <a href="nuevo.php" class="btn">Nuevo PRODUCTO</a>
    <a href="clientes.php" class="btn">CLIENTES</a>
    <a href="proveedores.php" class="btn">PROVEEDORES</a>
    <a href="compras.php" class="btn">COMPRAS</a>
    <a href="reporte.php" class="btn">REPORTE DE INVENTARIO</a>
    <?php foreach($posts as $post): ?>
    <div class="post-single">
        <article>
            <h2 class="titulo"><?php echo $post['idproductos'] . '.-' . $post['NombreP']; ?></h2>
            <a href="editar.php?id=<?php echo $post['idproductos']; ?>">Editar</a>
            <a href="../single.php?id=<?php echo $post['idproductos']; ?>">Ver</a>
        </article>
    </div>
    <?php endforeach; ?>

    <?php require'../paginacion.php' ?>
</div>

<?php require'../views/footer.php' ?>