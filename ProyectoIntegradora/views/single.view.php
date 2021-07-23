<?php require'header.php' ?>

<div class="contenedor">
    <div class="post-single">
        <article class="single-article">
            <div>
                <h2 class="titulo"><?php echo $post['NombreP'] ?></h2> 
                <div class="thumb">
                    <img class="img-single" src="<?php echo RUTA; ?>/img/<?php echo $post['img'] ?>"
                        alt="<?php echo $post['NombreP'] ?>">
                </div>
            </div>
            <div>
                <div><p class="extracto">Genero: <?php echo nl2br($post['Genero']); if ($post['Genero']=='H') {
                    ?> <i class="fa fa-male" aria-hidden="true"></i><?php
                }elseif ($post['Genero']=='M') {
                    ?> <i class="fa fa-female" aria-hidden="true"></i><?php
                }elseif ($post['Genero']=='H-M' || $post['Genero']=='M-H') {
                    ?> <i class="fa fa-male" aria-hidden="true"></i><i class="fa fa-female" aria-hidden="true"></i><?php
                } ?></p></div>
                <div><p class="extracto">Precio: <i class="fa fa-usd" aria-hidden="true"></i> <?php echo nl2br($post['Precio']); ?></p></div>
                <div><p class="extracto">Categoria: <?php echo nl2br($categoria['NombreC']); ?></p></div>
                <div><p class="extracto">Cantidad: <?php echo nl2br($post['Cantidad']); ?></p></div>
                <?php if ($post['Caducidad']>1) {
                    ?>
                <div><p class="extracto">Caducidad: <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo nl2br($post['Caducidad']); ?></p></div>
                    <?php
                } ?>
                <?php ?>
                <div><p class="extracto">Talla: <?php echo nl2br($post['Talla']); ?></p></div>
                <div><p class="extracto">Marca: <?php echo nl2br($marca["Nombre"]); ?></p></div>
            </div>
            <div><br><br>
                <a href="#" class="btn-compra-agotada" id="compra" onclick="">COMPRAR <i class="fa fa-credit-card" aria-hidden="true"></i></a>
            </div>
            <script>
                var compra = document.getElementById("compra");
            </script>
            <?php 
                if ($post['Cantidad']>0) {
                    ?>
                    <script>
                        compra.className="btn-compra";
                    </script>
                    <?php
                    }elseif ($post['Cantidad']<=0) {
                        ?>
                        <script>
                            compra.onclick=alert('Cantidad de productos NO existentes, favor de intentar mas tarde o contactarse por email o telefono');
                            compra.href ='#';
                        </script>
                        
                        <?php
                    }
                 ?>
        </article>
    </div>
</div>

<?php require'footer.php' ?>