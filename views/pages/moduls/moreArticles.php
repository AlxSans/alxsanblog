<?php 

	$mostViwedOnes = ControlerBlog::ctrMostViwedOnes();

?>
<!---More articles--->
<section class="content-container more-articles-container mt-3 p-3">
	
	<h3 class="fw-normal color-dark_color mb-3">Los más leídos</h3>

	<div class="d-flex justify-content-between more-articles-container__cards">

		<?php  

			for ($i = 0; $i < count($mostViwedOnes); $i++) {
				echo '<div class="card border-0 mr-1 more-articles-container__card">
					  <a href="'.$blog['dominio'].$mostViwedOnes[$i]['ruta_categoria'].'/'.$mostViwedOnes[$i]['ruta_articulo'].'">
					  <img class="border-r2" src="'.$mostViwedOnes[$i]['portada_articulo'].'" class="card-img-top" alt="..."></a>
					  <div class="card-body">
					  <a class="text-decoration-none" href="'.$blog['dominio'].$mostViwedOnes[$i]['ruta_categoria'].'/'.$mostViwedOnes[$i]['ruta_articulo'].'">
					    <h5 class="card-title fw-normal color-mid_black">'.$mostViwedOnes[$i]['titulo_articulo'].'</h5></a>
					    <p class="card-text color-text_gray">'.$mostViwedOnes[$i]['descripcion_articulo'].'</p>
					    <a href="'.$blog['dominio'].$mostViwedOnes[$i]['ruta_categoria'].'/'.$mostViwedOnes[$i]['ruta_articulo'].'" class="btn btn-primary float-end bg-secondary_color border-0">Leer más</a>
					  </div>
					</div>';
			}

		?>

	</div>

</section>