<?php 

	class ControlerBlog{

		/*::::: Show blog information ::::*/
		static public function ctrDisplayBlog(){

			$table = "blog";

			$response = ModelBlog::mdlDisplayBlog($table);

			return $response;

		}

		/*::::: Show social networks ::::*/
		static public function ctrDisplaySocialNetworks(){

			$table = "social_networks";

			$response = ModelBlog::mdlDisplaySocialNetworks($table);

			return $response;

		}

		/*::::: Show categories ::::*/
		static public function ctrDisplayCategories(){

			$table = "categorias";

			$response = ModelBlog::mdlDisplayCategories($table);

			return $response;

		}

		/*::::: Show articles ::::*/
		static public function ctrDisplayArticles1(){

			$table = "articulos";

			$response = ModelBlog::mdlDisplayArticles1($table);

			return $response;

		}

		/*::::: Show articles ::::*/
		static public function ctrDisplayArticlesNext($pageNm){

			$table = "articulos";
			$startFrom = ($pageNm - 1)*5;

			$response = ModelBlog::mdlDisplayArticlesNext($table, $startFrom);

			return $response;

		}

		/*::::: Show article rows ::::*/
		static public function ctrDisplayArticleRows(){

			$table = "articulos";

			$response = ModelBlog::mdlDisplayArticleRows($table);

			return $response;

		}

		/*::::: Show article rows ::::*/
		static public function ctrDisplayArticleCategoryRows($id){

			$table = "articulos";
			$table2 = "categorias";

			$response = ModelBlog::mdlDisplayArticleCategoryRows($table,$table2,$id);

			return $response;

		}

		/*::::: Show articles categorie rows ::::*/
		static public function ctrDisplayCategorieArticle($pageNumber, $id){

			$table1 = "articulos";
			$table2 = "categorias";
			$table3 = "authors";

			$startFrom = ($pageNumber-1)*10;

			$response = ModelBlog::mdlDisplayCategorieArticle($table1, $table2, $table3, $id, $startFrom);

			return $response;

		}

		/*::::: Show the lastest article ::::*/
		static public function ctrDisplayLastestArticle(){

			$table = "articulos";
			$table2 = "categorias";
			$table3 = "authors";

			$response = ModelBlog::mdlDisplayLastestArticle($table, $table2, $table3);

			return $response;

		}

		/*::::: Show the most viewed articles ::::*/
		static public function ctrMostViwedOnes(){

			$table = "articulos";
			$table2 = "categorias";
			$table3 = "authors";

			$response = ModelBlog::mdlMostViwedOnes($table, $table2, $table3);

			return $response;

		}


		static public function ctrGetArticle($article_title){

			$table = "articulos";
			$table2 = "categorias";
			$table3 = "authors";

			$response = ModelBlog::mdlGetArticle($table, $table2, $table3, $article_title);

			return $response;

		}

		static public function ctrGetArticleOpinions($id){

			$table = "opiniones";
			$table2 = "administrators";

			$response = ModelBlog::mdlGetArticleOpinions($table, $id, $table2);

			return $response;

		}

		//User sent an opinion
		static public function ctrSetOpinion($name, $email, $opinion, $photo, $id){
			//$response = [$name, $email, $opinion, $photo, $id];
			//return json_encode($response); 
			$table = "opiniones";

			$response = ModelBlog::mdlSetOpinion($table, $name, $email, $opinion, $photo, $id);

			return $response;

		}

		//Add view to Article
		static public function ctrAddViewToArticle($id){
			$table = "articulos";

			$response = ModelBlog::mdlAddViewToArticle($table,$id);

			return $response;

		}

		//Get data from search input
		static public function ctrGetDataFromSearchInput($data){

			$table = "articulos";
			$table2 = "categorias";
			$table3 = "authors";

			$response = ModelBlog::mdlGetDataFromSearchInput($table,$data,$table2,$table3);

			return $response;

		}

		//Get data from search input
		static public function ctrGetFinalDataFromSearchInput($data,$page){

			$table = "articulos";
			$table2 = "categorias";
			$table3 = "authors";

			$response = ModelBlog::mdlGetFinalDataFromSearchInput($table,$data,$page,$table2,$table3);

			return $response;

		}

	}