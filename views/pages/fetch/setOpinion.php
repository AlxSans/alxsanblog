<?php 

	require_once "../../../controlers/blog.controler.php";
	require_once "../../../models/model.blog.php";

	if (isset($_POST)) {
		//$data = file_get_contents("php://input");
		//$opinionData = json_decode($data, true);
		
		if(isset($_FILES['photo']['tmp_name']) && !empty($_FILES['photo']['tmp_name'])){
			//print_r($_FILES['photo']['tmp_name']);
			//get the width and height from image and define new values
			list($width, $height) = getimagesize($_FILES['photo']['tmp_name']);
			$newWidth = 128;
			$newHeight = 128;

			//create directory
			$directory = 'views/img/profile/';//C:/xampp/htdocs/blog/views/img/profile/
			//default functions for jpg and png
			if($_FILES['photo']['type'] == "image/jpeg"){

				$random = mt_rand(100, 9999);
				$route = $directory.$random.".jpg";
				
				$origin = imagecreatefromjpeg($_FILES['photo']['tmp_name']);
				$destiny = imagecreatetruecolor($newWidth,$newHeight);

				imagecopyresized($destiny,$origin,0,0,0,0,$newWidth, $newHeight,$width,$height);

				imagejpeg($destiny, '../../img/profile/'.$random.".jpg");

			}else if($_FILES['photo']['type'] == "image/png"){

				$random = mt_rand(100, 9999);
				$route = $directory.$random.".png";

				$origin = imagecreatefrompng($_FILES['photo']['tmp_name']);
				$destiny = imagecreatetruecolor($newWidth, $newHeight);

				imagealphablending($destiny, FALSE);
				imagesavealpha($destiny, TRUE);

				imagecopyresized($destiny,$origin,0,0,0,0,$newWidth, $newHeight,$width,$height);

				imagepng($destiny, '../../img/profile/'.$random.".png");

			}else{

				return "error-format";

			}

		}else{

			$route = "views/img/profile_default/profile_default.png";

		}

		$setOpinion = ControlerBlog::ctrSetOpinion($_POST['name'], $_POST['email'], $_POST['opinion'],$route, $_POST['id']);

		$cat = json_encode($setOpinion, true);
		echo $cat;

		//$test = json_encode($opinionData, true);
		//echo implode($_FILES['photo']);
	}