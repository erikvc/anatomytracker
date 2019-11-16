<?php

header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
header('Content-Type: text/html; charset=utf-8');

require("conexaoPDO.php");

$first = $_POST['first'];
$last = $_POST['last'];
$title = $_POST['title'];
$officePhone = $_POST['officePhone'];
//$dataNascimentoConvertida = date('Y-m-d', strtotime($dataNascimento));
$mobilePhone = $_POST['mobilePhone'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$terms = $_POST['terms'];
$images    = $_FILES['imagem'];

//var_dump($images);



		$tiposPermitidos= array('gif', 'jpeg', 'jpg', 'pjpeg', 'png');
		$images    = $_FILES['imagem']['name'];
		$imagesType    = $_FILES['imagem']['type'];
		$rand	   = rand();
		$errorUpload = 'N';
        
			
			if (array_search($imagesType, $tiposPermitidos) === false && $password1 == $password2) {
                $images = str_replace("'", "", $images);
				$imgFileName = $rand.$images;
				$path 		 = '../images/temp/'.$imgFileName;

				move_uploaded_file($_FILES['imagem']['tmp_name'], $path);
                
                include("resize-class.php");
                $resizeObj = new resize('../images/temp/'.$imgFileName);
                $resizeObj -> resizeImage(200, 200, 'crop');
                $resizeObj -> saveImage('../images/'.$imgFileName, 80);
				
				
				$sqlPegaTasks = mysqli_query($conexao, "INSERT INTO users (first, last, title, officePhone, mobilePhone, username, email, password, image, type, creation_date)VALUES('$first', '$last', '$title', '$officePhone', '$mobilePhone', '$username', '$email', '$password', '$imgFileName', 0, NOW())") or die(mysqli_error($conexao));
                
                $removeTemp = unlink('../images/temp/'.$imgFileName);
				
				echo 'ok';
			}else{
				echo 'A senha não confere ou o arquivo de imagem tem um formato não permitido!';
			}

			


?>