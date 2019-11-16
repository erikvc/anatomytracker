<?php

header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
header('Content-Type: text/html; charset=utf-8');

require("conexaoPDO.php");

$joinID = $_GET['id'];


$verificaEmail = mysqli_query($conexao, "SELECT * FROM invite WHERE system_id = '$joinID'") or die(mysqli_error($conexao));
$contagem = mysqli_num_rows($verificaEmail);

if($contagem != 0){
	
	$sqlPegaIvite = mysqli_fetch_assoc($verificaEmail);
	
	$admin_id = $sqlPegaIvite['admin_id'];
	
	$sqlPegaAccountInfo = mysqli_fetch_assoc(mysqli_query($conexao, "SELECT * FROM admin WHERE id = '$admin_id'")) or die(mysqli_error($conexao));
	
	
	$invite[0]['admin_id'] = $admin_id;
	$invite[0]['accountName'] = $sqlPegaAccountInfo['accountName'];
	$invite[0]['system_id'] = $sqlPegaIvite['system_id'];
	$invite[0]['invite_email'] = $sqlPegaIvite['email'];
	
	echo json_encode($invite);
	
}else{
	echo 'erro';
}

				
				
			


?>