<?php

    require_once "../../../controlers/blog.controler.php";
	require_once "../../../models/model.blog.php";

    if (isset($_POST)) {

        $data = file_get_contents("php://input");
		$searchData = json_decode($data, true);
		$searchResult = ControlerBlog::ctrGetFinalDataFromSearchInput( $searchData['input'], $searchData['pageNm']);

		$data = json_encode($searchResult, true);
		echo $data;

    }