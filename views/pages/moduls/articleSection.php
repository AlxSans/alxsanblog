<?php

	$addViewToArticle = ControlerBlog::ctrAddViewToArticle($getArticle['id_articulo']);

?>

<!--- Breadcrumbs --->
<section class="content-container pt-0">
	<div class="d-flex align-items-center pl-1">
		<div class="mr-half"><a href="<?php echo $blog['dominio'] ?>" class="text-decoration-none color-dark_color">Inicio</a></div>
		<div class="mr-half fs-1-half">&gt;</div>
		<div class="mr-half"><a id="category_breadcrumb" class="text-decoration-none color-dark_color" href=""></a></div>
		<div class="mr-half fs-1-half">&gt;</div>
		<div id="title_breadcrumb" class="fw-bold"><?php echo $getArticle['titulo_articulo'] ?></div>
	</div>
</section>

<!--- Article section --->
<section class="content-container mt-3 p-3">
	
	<h1><?php echo $getArticle['titulo_articulo'] ?></h1>
	<?php 
		echo $getArticle['contenido_articulo'];
	?>

</section>

<section class="content-container p-3 d-flex align-items-center justify-content-end">
	<p class="m-0 mr-1">Compartir en: </p>
	<a class=”twitter-share-button” target=”_blank” href="https://twitter.com/intent/tweet?url=<?php echo $blog['dominio'].$getArticle['ruta_categoria'].$getArticle['ruta_articulo'];?>">
		<button class="color-pure_white border-0 fw-bold click_active first-uppercase" style="background-color:#0f1419;padding: 5px 10px;;">twitter</button>
	</a>
	<a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $blog['dominio'].$getArticle['ruta_categoria'].$getArticle['ruta_articulo'];?>">
		<button class="color-pure_white border-0 fw-bold click_active first-uppercase" style="background-color:#3b5998;padding: 5px 10px;">Facebook</button>
	</a>
	<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $blog['dominio'].$getArticle['ruta_categoria'].$getArticle['ruta_articulo'];?>" target=”_blank”>
		<button class="color-pure_white border-0 fw-bold click_active first-uppercase" style="background-color:#0078b6;padding: 5px 10px;">linkedin</button>
	</a>
</section>

<!-- Article footer information--->
<section class="content-container mt-3 p-3 d-flex justify-content-between">
	<div class="main-description_footer d-flex align-items-center">
		<div class="main-description_footer__img d-flex mr-3">	
			<img class="mr-half" src="<?php echo $blog['dominio'].$getArticle['img_author'] ?>" alt="profile picture">
			<div>
				<p class="m-0 color-pure_black"><?php echo $getArticle['name_author'] ?></p>
				<p class="m-0 color-pure_black"><?php echo $getArticle['fecha_articulo'] ?></p>
			</div>
		</div>	
	</div>
	<div class="main-description_cat">
		<div>
			<label class="main-description__category-label bg-book_category border-r2 color-pure_white first-uppercase cursor-pointer"><?php echo $getArticle['titulo_categoria'] ?></label>
		</div>
		<div class="main-description_cat__hashtag">
			<label class="mr-half cursor-pointer">#1984</label>
			<label class="mr-half cursor-pointer">#leer</label>
			<label class="mr-half cursor-pointer">#opinion</label>
			<label class="mr-half cursor-pointer">#another</label>
			<label class="mr-half cursor-pointer">#addedUp</label>
		</div>
	</div>
</section>


<!--- Article's opinion --->
<section class="content-container mt-5 p-3">

	<h3 class="mb-4">Opiniones</h3>

	<?php 

		$getOpinions = ControlerBlog::ctrGetArticleOpinions($getArticle['id_articulo']);
		//print_r($getOpinions);

		if (count($getOpinions) > 0) {

			foreach($getOpinions as $key => $value){

				if ($value['respuesta_opinion'] !== null) {

					$answer_content = '<div class="opinion_container--answer d-flex">
							<div class="main-description_footer__img mr-1">
								<img src="'.$blog['dominio'].$value['foto_opinion'].'">
							</div>
							<div>
								<p>'.$value['name_admin'].' '.$value['fecha_respuesta'].'</p>
								<p>'.$value['respuesta_opinion'].'</p>
							</div>
						</div>';
				}else{

					$answer_content = " ";
				}

				echo '

					<div class="opinion_container">

						<div class="opinion_container--original d-flex">
							<div class="main-description_footer__img mr-1">
								<img src="'.$blog['dominio'].$value['foto_opinion'].'">
							</div>
							<div>
								<p class="fw-bold">'.$value['nombre_opinion'].' '.$value['fecha_opinion'].'</p>
								<p>'.$value['contenido_opinion'].'</p>
							</div>
						</div>

						'.$answer_content.'

					</div>

				';

			}
			
			
		}else{

			echo '<p>No hay opiniones para este artículo...</p>';

		}

	?>

</section>

<!-- Contact -->
<section id="opinion-section" class="content-container mt-3 p-3">
	<div id="alertMessage"></div>
	<h4>¡Deja una opinión!</h4>
	<div class="mt-3 form-default">
		<form id="opinionForm" enctype="multipart/form-data">
			<div class="mb-3">
				<label for="name" class="form-label">Nombre</label>
			    <input type="text" placeholder="Tu nombre..." class="form-control" name="name_opinion" required>
			    <div id="name-validation">
				    <label class="valid-feedback">Nombre válido</label>
				    <label class="invalid-feedback"></label>
			    </div>
			</div>
			<div class="mb-3">
				<label for="email" class="form-label">Email</label>
				<input type="text" placeholder="Tú e-mail..." class="form-control" name="email_opinion" required>
				<div id="email-validation">
				    <label class="valid-feedback">E-mail válido</label>
				    <label class="invalid-feedback"></label>
			    </div>
				<div id="emailHelp" class="form-text">Nunca compartimos tu información con terceros</div>
			</div>
			<input id="photoOpinion" type="file" name="photoOpinion" class="d-none">
			<div id="photoOptions" class="mb-3">
				<label class="form-label">¿Quieres agregar tu foto?</label>
				<label for="photoOpinion" class="btn btn-primary bg-secondary_color border-0">Subir foto</label>
			</div>
			<div class="mb-3">
				<label for="message" class="form-label">Deja tu opinión</label>
				<textarea name="opinion" id="" cols="30" rows="10" placeholder="Escribe tu opinión..." class="form-control"></textarea>
				<div id="opinion-validation">
				    <label class="valid-feedback">Opinión válida</label>
				    <label class="invalid-feedback"></label>
			    </div>
			</div>
			<div class="mb-3 pb-1">
				<input class="btn btn-primary float-end bg-secondary_color border-0" type="submit" value="Enviar">
			</div>
			<input type="hidden" name="articleReference" value="<?php echo $getArticle['id_articulo'] ?>">
		</form>
	</div>

</section>
<!-- Sending opinion -->
<section id="loader-container">
	<div class="loader"></div>
	<h6>Enviando opinion...</h6>
</section>
<section class="content-container mt-3 p-3">
	<p style="font-size: 14px;">* Los comentarios están sujetos a previa aprobación de los administradores del sitio</p>
</section>

<script src="<?php echo $blog['dominio']; ?>views/js/setOpinion.js"></script>
<script>
	
	let categoryId = '<?php echo $getArticle['id_cat'] ?>'; 
	const submit = document.querySelector('#opinionForm input[type="submit"]');
	submit.addEventListener('click', sendOpinionToReview);

</script>