<?php 

	require_once "../../../controlers/blog.controler.php";
	require_once "../../../models/model.blog.php";

	if (isset($_POST)) {

		$pageNm = file_get_contents("php://input");

		if ($pageNm == 1) {
			$articles = ControlerBlog::ctrDisplayArticles1();
		}else{
			$articles = ControlerBlog::ctrDisplayArticlesNext($pageNm);
		}

		$art = json_encode($articles, true);
		echo $art;

	}