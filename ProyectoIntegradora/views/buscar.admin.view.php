<?php require'header.php' ?>

<div class="contenedor">
    <a href="<?php echo RUTA.'/admin'?>"><h2>Panel de Control</h2></a>
    <form name="busqueda" class="buscar" action="<?php echo RUTA; ?>/admin/buscar.admin.php" method="get">
        <input type="text" name="busqueda" placeholder="Buscar">
        <button type="submit" class="icono fa fa-search"></button>
    </form>
    <a href="nuevo.php" class="btn">Nuevo PRODUCTO</a>
    <a href="clientes.php" class="btn">CLIENTES</a>
    <a href="proveedores.php" class="btn">PROVEEDORES</a>
    <a href="compras.php" class="btn">COMPRAS</a>
    <a href="reporte.php" class="btn">REPORTE DE INVENTARIO</a>
    <a href="categoria.php" class="btn">CATEGORIAS</a>
    <a href="marca.php" class="btn">MARCAS</a>
    <h2><?php echo $titulo ?></h2>
    <?php foreach($resultados as $post): ?>
    <div class="post-single">
        <article>
            <h2 class="titulo"><?php echo $post['idproductos'] . '.-' . $post['NombreP']; ?></h2>
            <a href="<?php echo RUTA ?>/admin/editar.php?id=<?php echo $post['idproductos']; ?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
            <a href="<?php echo RUTA ?>/single.php?id=<?php echo $post['idproductos']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></a>
            <a href="<?php echo RUTA ?>/admin/eliminarp.php?id=<?php echo $post['idproductos']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
        </article>
    </div>
    <?php endforeach; ?>

    <?php require'../paginacion.php' ?>
</div>

<?php require'footer.php' ?>