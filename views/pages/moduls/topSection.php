<?php 

	$lastest_article = ControlerBlog::ctrDisplayLastestArticle();
?>

<!--- Blog Top section  --->
<section class="content-container main-post d-flex mt-3 p-3">
	<div class="main-image-container mr-3">
		<a href="<?php echo $blog['dominio'].$lastest_article[0]['ruta_categoria'].'/'.$lastest_article[0]['ruta_articulo'];  ?>">
			<img class="border-r2" src="<?php echo $lastest_article[0]['portada_articulo'];  ?>" alt="1984 book cover">
		</a>
	</div>
	<div class="main-description">
		<div class="main-description_top">
			<a class="text-decoration-none" href="<?php echo $blog['dominio'].$lastest_article[0]['ruta_categoria'].'/'.$lastest_article[0]['ruta_articulo'];  ?>">
				<h1 class="main-description_top__title color-dark_color"><?php echo $lastest_article[0]['titulo_articulo'];  ?></h1>
			</a>
			<p class="main-description_top__text color-text_gray"><?php echo $lastest_article[0]['descripcion_articulo'];  ?></p>
		</div>
		<div class="main-description_footer d-flex align-items-center">
			<div class="main-description_footer__img d-flex mr-3">	
				<img class="mr-half" src="<?php echo $lastest_article[0]['img_author'] ?>" alt="profile picture">
				<div>
					<p class="m-0 color-pure_black"><?php echo $lastest_article[0]['name_author']; ?></p>
					<p class="m-0 color-pure_black"><?php echo $lastest_article[0]['fecha_articulo']; ?></p>
				</div>
			</div>	
			<div class="main-description_footer__cta">
				<a href="<?php echo $blog['dominio'].$lastest_article[0]['ruta_categoria'].'/'.$lastest_article[0]['ruta_articulo'];  ?>">
					<button class="bg-secondary_color color-pure_white border-r1 border-0 fw-bold click_active first-uppercase">leer más</button>
				</a>
			</div>
		</div>	

		<div class="main-description_cat mt-5">
			<a href="<?php echo $lastest_article[0]['ruta_categoria']; ?>">
				<label class="main-description__category-label <?php echo $lastest_article[0]['icono']; ?> border-r2 color-pure_white first-uppercase cursor-pointer"><?php echo $lastest_article[0]['titulo_categoria']; ?></label>
			</a>
			<div class="main-description_cat__hashtag">
				<label class="mr-half cursor-pointer">#1984</label>
				<label class="mr-half cursor-pointer">#leer</label>
				<label class="mr-half cursor-pointer">#opinion</label>
			</div>
		</div>

	</div>
	
</section>
