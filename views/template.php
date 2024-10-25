<?php 

	$blog = ControlerBlog::ctrDisplayBlog();
	$social_networks = ControlerBlog::ctrDisplaySocialNetworks();
	$categories = ControlerBlog::ctrDisplayCategories();
	$total_articles = ControlerBlog::ctrDisplayArticleRows();
	
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<!-- Main css -->
	<link rel="stylesheet" href="<?php echo $blog['dominio']; ?>views/css/main-css.css">
	<link rel="stylesheet" href="<?php echo $blog['dominio']; ?>views/css/support-css.css">
	<link rel="stylesheet" href="<?php echo $blog['dominio']; ?>views/css/loading.css">
	<link rel="icon" href="">
	<script> const domain = "<?php echo $blog['dominio']; ?>"</script>
	<script src="<?php echo $blog['dominio']; ?>views/js/paginationControl.js"></script>

	<?php  
		$validation = "";

		if(isset($_GET['search'])){
			print_r($_GET['search']);
			echo $_GET['search'];
			$validation = "search";
		}

		if (isset($_GET['page'])) {

			$rutas = explode("/", $_GET['page']);
			
			foreach($categories as $key => $value){

				if($_GET['page'] == $value['ruta_categoria']){
					
					$validation = "categorie";
					break;
				}
			}

			//inside an article
			if(isset($rutas[1])){
				print_r($rutas[1]);
				if($rutas[0] !== "search"){//<- erase this if if does not work
					$getArticle = ControlerBlog::ctrGetArticle($rutas[1]);

					if($rutas[1] == $getArticle['ruta_articulo']){
						
						$validation = "article_on";
					}
				}

			}

			if ($validation == "categorie") {

				echo '<meta name="title" content="'.$value['titulo_categoria'].'">
				<meta name="description" content="'.$value['descripcion_categoria'].'">';
				echo '<title>'.$blog['titulo'].' | '.$value['titulo_categoria'].'</title>';

				$keywords = json_decode($value['p_claves_categoria'], true);
				$p_keys = "";
				foreach ($keywords as $key => $value) {
					$p_keys .= $value.", ";
				}

				$p_keys = substr($p_keys, 0, -2);

					
				echo '<meta name="keywords" content="'.$p_keys.'">';

			}else if($validation == "article_on"){

				echo '<meta name="title" content="'.$getArticle['titulo_articulo'].'">
				<meta name="description" content="'.$getArticle['descripcion_articulo'].'">';
				echo '<title>'.$blog['titulo'].' | '.$getArticle['titulo_articulo'].'</title>';

				$keywords = json_decode($getArticle['p_claves_articulo'], true);
				$p_keys = "";
				foreach ($keywords as $key => $value) {
					$p_keys .= $value.", ";
				}

				$p_keys = substr($p_keys, 0, -2);

					
				echo '<meta name="keywords" content="'.$p_keys.'">';

				echo '<meta property="og:url" content="'.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"].'" />
					<meta property="og:type" content="article" />
					<meta property="og:title" content="'.$getArticle['titulo_articulo'].'" />
					<meta property="og:description" content="'.$getArticle['descripcion_articulo'].'" />
					<meta property="og:image" content="'.$blog['dominio'].$getArticle['portada_articulo'].'"/>';

			}else{

				echo '<meta name="title" content="'.$blog['titulo'].'">
				<meta name="description" content="'.$blog['descripcion'].'">';
				
				$keywords = json_decode($blog['palabras_claves'], true);
				$p_keys = "";
				foreach ($keywords as $key => $value) {
					$p_keys .= $value.", ";
				}

				$p_keys = substr($p_keys, 0, -2);

					
				echo '<meta name="keywords" content="'.$p_keys.'">';
				echo '<title>'.$blog['titulo'].'</title>';

			}
		}else{
			
			echo '<meta name="title" content="'.$blog['titulo'].'">
				<meta name="description" content="'.$blog['descripcion'].'">';
				
			$keywords = json_decode($blog['palabras_claves'], true);
			$p_keys = "";
			foreach ($keywords as $key => $value) {
				$p_keys .= $value.", ";
			}

			$p_keys = substr($p_keys, 0, -2);

				
			echo '<meta name="keywords" content="'.$p_keys.'">';
			echo '<title>'.$blog['titulo'].'</title>';

		}

	?>
	
</head>

<body>

	<?php  

		/*=============================
			TOP FIX MODULES
		=============================*/
		include "pages/moduls/nav.php";
		include "pages/moduls/searchTool.php";

		/*=============================
			NAVIGATING
		=============================*/
		$validation = "";
		$categorieSelected = "";


		if (isset($_GET['page'])) {
			
			//There's only one parameter
			if (count(array_unique($rutas)) === 1) {

				foreach($categories as $key => $value){

					if($rutas[0] == $value['ruta_categoria']){
						$validation = "categorie";
						$categorieSelected = $value['id_categorias'];
						break;
					}
				}

			//There's more than one parameter
			}else{
				if($rutas[0] == 'search'){
					$validation = "search";
				}else{
					$validation = "article";
				}

			}

			if ($validation == "categorie") {
				include "pages/categorie.php";
			}else if($validation == "article"){
				include "pages/article.php";
			}else if($validation == "search"){
				include "pages/searchResults.php";
			}else{
				include "pages/page404.php";
			}

		}else{
			include "pages/init.php";
		}
			
		/*=============================
			BOTTOM FIX MODULES
		=============================*/
		include "pages/moduls/footer.php";

	?>
	
	<script src="https://kit.fontawesome.com/2f55d50cb0.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<script src="<?php echo $blog['dominio']; ?>views/js/main-js.js"></script>
	<script src="<?php echo $blog['dominio']; ?>views/js/search.js"></script>
	
</body>

</html>