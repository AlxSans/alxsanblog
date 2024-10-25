<?php 

	require_once "conection.php";

	class ModelBlog{

		//Display table blog content
		static public function mdlDisplayBlog($value='$table')
		{
			$stmt = Conection::conect()->prepare("SELECT * FROM $value");
			$stmt->execute();
			return $stmt -> fetch();

			$stmt -> close();
			$stmt = null;
		}

		//Display social networks
		static public function mdlDisplaySocialNetworks($value='$table')
		{
			$stmt = Conection::conect()->prepare("SELECT social_network FROM $value WHERE status=1 ORDER BY order_number ASC");
			$stmt->execute();
			return $stmt -> fetchAll();

			$stmt -> close();
			$stmt = null;
		}

		//Display categories
		static public function mdlDisplayCategories($value='$table')
		{
			$stmt = Conection::conect()->prepare("SELECT * FROM $value");
			$stmt->execute();
			return $stmt -> fetchAll();

			$stmt -> close();
			$stmt = null;
		}

		//Display articles
		static public function mdlDisplayArticles1($value='$table')
		{
			$stmt = Conection::conect()->prepare("SELECT portada_articulo, titulo_articulo, descripcion_articulo, ruta_articulo, categorias.ruta_categoria FROM $value INNER JOIN categorias ON categorias.id_categorias = $value.id_cat WHERE id_articulo NOT IN (SELECT MAX(id_articulo) FROM $value) ORDER BY id_articulo DESC LIMIT 5");
			$stmt->execute();
			return $stmt -> fetchAll();

			$stmt -> close();
			$stmt = null;
		}

		//Display articles according page
		static public function mdlDisplayArticlesNext($value='$table', $value2='$pageNumber')
		{
			$stmt = Conection::conect()->prepare("SELECT portada_articulo, titulo_articulo, descripcion_articulo, ruta_articulo, categorias.ruta_categoria FROM $value INNER JOIN categorias ON categorias.id_categorias = $value.id_cat WHERE id_articulo ORDER BY id_articulo DESC LIMIT $value2, 5");
			$stmt->execute();
			return $stmt -> fetchAll();

			$stmt -> close();
			$stmt = null;
		}

		//Display article rows
		static public function mdlDisplayArticleRows($value='$table')
		{
			$stmt = Conection::conect()->prepare("SELECT id_articulo FROM $value");
			$stmt->execute();	 
			return $stmt -> rowCount();

			$stmt -> close();
			$stmt = null;
		}

		//Display article according category rows
		static public function mdlDisplayArticleCategoryRows($value='$table',$value2='$table2',$value3='$id')
		{
			$stmt = Conection::conect()->prepare("SELECT * FROM $value INNER JOIN $value2 ON $value.id_cat = $value3 GROUP BY $value.id_articulo");
			$stmt->execute();	 
			return $stmt -> rowCount();

			$stmt -> close();
			$stmt = null;
		}

		//Display article categorie row
		static public function mdlDisplayCategorieArticle($value='$table1',$value2='$table2', $valueA='$table3', $value3='$id', $value4='$startFrom')
		{
			$stmt = Conection::conect()->prepare("SELECT *, DATE_FORMAT(fecha_articulo, '%d/%m/%Y') AS fecha_articulo FROM $value INNER JOIN $value2 ON $value2.id_categorias = $value3 && $value.id_cat = $value3 INNER JOIN $valueA ON $value.id_auth = $valueA.id_author GROUP BY $value.id_articulo DESC LIMIT $value4, 10");
			$stmt->execute();	 
			return $stmt -> fetchAll();

			$stmt -> close();
			$stmt = null;
		}

		//Display lastest articles
		static public function mdlDisplayLastestArticle($value='$table', $value2='$table2', $value3='$table3')
		{
			$stmt = Conection::conect()->prepare("SELECT *, DATE_FORMAT(fecha_articulo, '%d/%m/%Y') AS fecha_articulo FROM $value INNER JOIN $value2 ON $value.id_cat = $value2.id_categorias INNER JOIN $value3 ON $value.id_auth = $value3.id_author ORDER BY id_articulo DESC LIMIT 4");
			$stmt->execute();
			return $stmt -> fetchAll();

			$stmt -> close();
			$stmt = null;
		}

		//Display most viewed articles
		static public function mdlMostViwedOnes($value='$table', $value2='$table2', $value3='$table3')
		{
			$stmt = Conection::conect()->prepare("SELECT * FROM $value INNER JOIN $value2 ON $value.id_cat = $value2.id_categorias INNER JOIN $value3 ON $value.id_auth = $value3.id_author ORDER BY vistas_articulo DESC LIMIT 3");
			$stmt->execute();
			return $stmt -> fetchAll();

			$stmt -> close();
			$stmt = null;
		}

		//Display article based in url
		static public function mdlGetArticle($value='$table', $value2='$table2', $value3='$table3', $value4='$article_title')
		{	
			$stmt = Conection::conect()->prepare("SELECT *, DATE_FORMAT(fecha_articulo, '%d/%m/%Y') AS fecha_articulo FROM $value INNER JOIN $value2 ON $value.id_cat = $value2.id_categorias INNER JOIN $value3 ON $value.id_auth = $value3.id_author WHERE $value.ruta_articulo = '$value4'");
			$stmt->execute();
			return $stmt -> fetch();

			$stmt -> close();
			$stmt = null;
		}

		//Display article opinions
		static public function mdlGetArticleOpinions($value='$table', $value2='$id', $value3='$table2')
		{	
			$stmt = Conection::conect()->prepare("SELECT *, DATE_FORMAT(fecha_opinion, '%d/%m/%Y') AS fecha_opinion, DATE_FORMAT(fecha_respuesta, '%d/%m/%Y') AS fecha_respuesta FROM $value INNER JOIN $value3 ON $value.id_adm = $value3.id_admin OR $value.aprobacion_opinion = 1 WHERE $value.id_art = $value2");
			$stmt->execute();
			return $stmt -> fetchAll();

			$stmt -> close();
			$stmt = null;
		}

		//Set opinions
		static public function mdlSetOpinion($value0='$table', $value='$name', $value2='$email', $value3='$opinion', $valueP='$photo', $value4='$id')
		{	
			//return $valueP;
			//$response = [$value0, $value, $value2, $value3, $value4];
			//return json_encode($response); 
			$date = date('Y-m-d');
			$stmt = Conection::conect()->prepare("INSERT INTO $value0 (id_art,nombre_opinion,correo_opinion,foto_opinion,contenido_opinion,aprobacion_opinion,fecha_opinion) VALUES ('$value4','$value','$value2','$valueP','$value3',0,'$date')");
			$stmt->execute();
			return 'OK';
			
			$stmt -> close();
			$stmt = null;

		}

		//Add view to Article
		static public function mdlAddViewToArticle($value='$table', $value2='$id')
		{	
			$stmt = Conection::conect()->prepare("UPDATE $value SET vistas_articulo = vistas_articulo + 1 WHERE id_articulo = $value2");
			$stmt->execute();
			return "OK";

			$stmt -> close();
			$stmt = null;
		}

		//Get data from search input
		/*static public function mdlGetDataFromSearchInput($value='$table', $value2='$data', $value3='$page', $value4='$table2', $value5='table3')
		{	
			$stmt = Conection::conect()->prepare("SELECT *, DATE_FORMAT(fecha_articulo, '%d/%m/%Y') AS fecha_articulo 
			FROM $value 
			INNER JOIN $value4 ON $value.id_cat = $value4.id_categorias 
			INNER JOIN $value5 ON $value.id_auth = $value5.id_author 
			WHERE  ($value.titulo_articulo LIKE '%$value2%' OR $value.contenido_articulo LIKE '%$value2%')
			ORDER BY $value.id_articulo DESC 
			LIMIT $value3, 5");
			$stmt->execute();
			return $stmt -> fetchAll();

			$stmt -> close();
			$stmt = null;
		}*/

		static public function mdlGetDataFromSearchInput($value='$table', $value2='$data', $value4='$table2', $value5='table3')
		{	
			$stmt = Conection::conect()->prepare("SELECT *, DATE_FORMAT(fecha_articulo, '%d/%m/%Y') AS fecha_articulo 
			FROM $value 
			INNER JOIN $value4 ON $value.id_cat = $value4.id_categorias 
			INNER JOIN $value5 ON $value.id_auth = $value5.id_author 
			WHERE ($value.titulo_articulo LIKE '%$value2%' OR $value.contenido_articulo LIKE '%$value2%')
			");
			$stmt->execute();
			return $stmt -> rowCount();

			$stmt -> close();
			$stmt = null;
		}

		static public function mdlGetFinalDataFromSearchInput($value='$table', $value2='$data', $value3='$page', $value4='$table2', $value5='table3')
		{	
			$stmt = Conection::conect()->prepare("SELECT *, DATE_FORMAT(fecha_articulo, '%d/%m/%Y') AS fecha_articulo 
			FROM $value 
			INNER JOIN $value4 ON $value.id_cat = $value4.id_categorias 
			INNER JOIN $value5 ON $value.id_auth = $value5.id_author 
			WHERE  ($value.titulo_articulo LIKE '%$value2%' OR $value.contenido_articulo LIKE '%$value2%')
			ORDER BY $value.id_articulo DESC 
			LIMIT $value3, 5");
			$stmt->execute();
			return $stmt -> fetchAll();

			$stmt -> close();
			$stmt = null;
		}


	}