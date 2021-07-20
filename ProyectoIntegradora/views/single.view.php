<?php require'header.php' ?>

<div class="contenedor">
    <div class="post-single">
        <article class="single-article">
            <div>
                <h2 class="titulo"><?php echo $post['NombreP'] ?></h2>
                <div class="thumb">
                    <img src="<?php echo RUTA; ?>/img/<?php echo $post['img'] ?>"
                        alt="<?php echo $post['NombreP'] ?>">
                </div>
            </div>
            <div>
                <p class="extracto">Genero: <?php echo nl2br($post['Genero']) ?></p>
                <p class="extracto">Precio: <?php echo nl2br($post['Precio']) ?></p>
                <p class="extracto">Categoria: <?php echo nl2br($categoria['NombreC']) ?></p>
                <p class="extracto">Cantidad: <?php echo nl2br($post['Cantidad']) ?></p>
                <p class="extracto">Caducidad: <?php echo nl2br($post['Caducidad']) ?></p>
                <p class="extracto">Talla: <?php echo nl2br($post['Talla']) ?></p>
                <p class="extracto">Marca: <?php echo nl2br($marca["Nombre"]) ?></p>
            </div>
            <div><br><br>
                <a href="#" class="" id="compra" onclick="">COMPRAR</a>
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
                        <style>
                            a.btn-compra-agotada{
                                text-decoration: none;
                                background: transparent;
                                padding:1px 1px;
                                cursor: not-allowed;
                                font-size: 0px;
                                width: 0.00005px;
                                cursor: auto;
                            }
                        </style>
                        <script>
                            compra.className="btn-compra-agotada";
                            compra.onclick=alert('Cantidad de productos NO existentes, favor de intentar mas tarde o contactarse por email o telefono');
                        </script>
                        
                        <?php
                    }
                 ?>
        </article>
    </div>
</div>

<?php require'footer.php' ?>