<?php

header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
header('Content-Type: text/html; charset=utf-8');


require("conexaoPDO.php");

	/*$email = $_POST['email'];
	$password = $_POST['password'];*/

	$email = $_GET['email'];
	$password = $_GET['password'];

	$verificaUser = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
	$verificaAdmin = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";

	$contagemUsers = mysqli_num_rows(mysqli_query($conexao, $verificaUser));
	$contagemAdmin = mysqli_num_rows(mysqli_query($conexao, $verificaAdmin));

	
	
	$erro = '0';

	if($contagemUsers != '0'){
		$sql = $verificaUser;
		$tabela = 'users';
		$type = '0';
	}else if($verificaAdmin != '0'){
		$sql = $verificaAdmin;
		$tabela = 'admin';
		$type = '1';
	}else{
		$erro = '1';
	}




		$runUser = mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

        if($erro != '1'){
			$dataAtual = date("Y-m-d");
			$SQLLastLogin = mysqli_query($conexao, "UPDATE $tabela SET lastLogin = NOW() WHERE email = '$email'");
            
			
			//Pega User Info
			$sqlPegaUserInfo = mysqli_fetch_assoc($runUser);
			
			$userInfo[0]['status'] = 'ok';
			$userInfo[0]['id'] = $sqlPegaUserInfo['id'];
			$userInfo[0]['first'] = $sqlPegaUserInfo['first'];
			$userInfo[0]['last'] = $sqlPegaUserInfo['last'];
			$userInfo[0]['email'] = $sqlPegaUserInfo['email'];
			$userInfo[0]['username'] = $sqlPegaUserInfo['username'];
			$userInfo[0]['type'] = $type;
			$userInfo[0]['image'] = $sqlPegaUserInfo['image'];
			
			if($contagemUsers != '0'){
				$userInfo[0]['admin_user'] = $sqlPegaUserInfo['admin_id'];
			}else{
				$userInfo[0]['admin_user'] = $sqlPegaUserInfo['id'];
			}
			
			echo json_encode($userInfo);
			
			
        }else{
            $userInfo[0]['status'] = 'erro';
			echo json_encode($erro);
        }

?>