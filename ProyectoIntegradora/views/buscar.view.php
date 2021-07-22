<?php require'header.php' ?>

<div class="contenedor">
    <h2><?php echo $titulo ?></h2>
    <?php foreach($resultados as $post): ?>
    <div class="post-single">
    <article class="single-article">
            <div>
                <a href="<?php echo RUTA.'/single.php?id='.$post['idproductos'] ?>">
                <h2 class="titulo"><?php echo $post['NombreP'] ?></h2>
                <div class="thumb">
                    <img class="img-single" src="<?php echo RUTA; ?>/img/<?php echo $post['img'] ?>"
                        alt="<?php echo $post['NombreP'] ?>">
                </div>
            </div>
            <div>
                <p class="extracto">Genero: <?php echo nl2br($post['Genero']) ?></p>
                <p class="extracto">Precio: <?php echo nl2br($post['Precio']) ?></p>
                <p class="extracto">Categoria: <?php echo nl2br($post['NombreC']) ?></p>
                <p class="extracto">Cantidad: <?php echo nl2br($post['Cantidad']) ?></p>
                <p class="extracto">Caducidad: <?php echo nl2br($post['Caducidad']) ?></p>
                <p class="extracto">Talla: <?php echo nl2br($post['Talla']) ?></p>
                <p class="extracto">Marca: <?php echo nl2br($post["Nombre"]) ?></p>
            </div></a>
        </article>
    </div>
    <?php endforeach; ?>
</div>

<?php require'footer.php' ?>