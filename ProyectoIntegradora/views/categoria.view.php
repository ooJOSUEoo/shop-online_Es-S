<?php require'header.php' ?>

<div class="contenedor">
    <h2><b><?php echo $categoria['NombreC'] ?></b></h2><br>
    <div class="contenedor-post">
        <?php foreach($posts as $pos): ?>
        <div class="post">
            <article>
                <h3 class="titulo"><a href="single.php?id=<?php echo $pos['idproductos'] ?>"><?php echo $pos['NombreP'] ?></a></h3>
                <div class="thumb">
                    <a href="<?php echo RUTA ?>/single.php?id=<?php echo $pos['idproductos'] ?>">
                        <img src="<?php echo RUTA; ?>/img/<?php echo $pos['img'] ?>" alt="<?php echo $pos['NombreP'] ?>">
                    </a>
                </div>
            </article>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php require'paginacionc.php' ?>

<?php require'footer.php' ?>