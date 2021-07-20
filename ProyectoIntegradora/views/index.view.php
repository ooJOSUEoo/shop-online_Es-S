<?php require'header.php' ?>

<div class="part1">
	<div class="catalogos">
		<table>
			<tr>
				<td class="td-catalogos">
					<p class="superior"><a href="#">Catalogo de AVON</a></p>
				</td>
			</tr>
			<tr>
				<td class="td-catalogos">
					<p class="medio"><a href="#">Catalogo de ROPA</a></p>
				</td>
			</tr><tr>
				<td class="td-catalogos">
					<p class="medio"><a href="#">Catalogo de CALZADO</a></p>
				</td>
			</tr><tr>
				<td class="td-catalogos">
					<p class="inferior"><a href="#">Catalogo de PERFUMERIA</a></p>
				</td>
			</tr>
		</table>
	</div>
	<div class="contenedor1" id="contenedor">
		<section class="tarjeta">
			<div class="slider_banner">
				<div class="banner" id="banner">
					<img class="slide active" src="img/banner.png" alt="">
					<img class="slide" src="img/banner2.png" alt="">
					<img class="slide" src="img/banner3.png" alt="">
					<img class="slide" src="img/banner4.png" alt="">
				</div>

				<!-- Flechas del Banner -->
				<a href="#" id="banner-prev" class="flecha-banner anterior"><span class="fa fa-chevron-left"></span></a>
				<a href="#" id="banner-next" class="flecha-banner siguiente"><span
						class="fa fa-chevron-right"></span></a>
			</div>

	</div>
</div>

<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script src="js/main.js"></script>

<div class="contenedor-post">
	<?php foreach($posts as $post): ?>
		<div class="post">
			<article>
				<h3 class="titulo"><a href="single.php?id=<?php echo $post['idproductos'] ?>"><?php echo $post['NombreP'] ?></a></h3>
				<div class="thumb">
					<a href="single.php?id=<?php echo $post['idproductos'] ?>">
						<img src="<?php echo RUTA; ?>/img/<?php echo $post['img'] ?>" alt="<?php echo $post['NombreP'] ?>">
					</a>
				</div>
			</article>
		</div>
		<?php endforeach; ?>
</div>

<?php require'paginacion.php' ?>


<?php require'footer.php' ?>