<?php 

	require_once "../../../controlers/blog.controler.php";
	require_once "../../../models/model.blog.php";

	if (isset($_POST)) {

		$data = file_get_contents("php://input");
		$catData = json_decode($data, true);
		$categoryArticles = ControlerBlog::ctrDisplayCategorieArticle($catData['pageNm'], $catData['id']);

		$cat = json_encode($categoryArticles, true);
		echo $cat;

	}