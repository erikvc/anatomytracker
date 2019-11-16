<?php

header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
header('Content-Type: text/html; charset=utf-8');


require("conexaoPDO.php");

$admin_id = $_GET['id'];


$sqlPegaMembers = mysqli_query($conexao, "SELECT * FROM tissue WHERE addByAdmin = '$admin_id'") or die(mysqli_error($conexao));

$array_retorno = array();

while($rows=mysqli_fetch_array($sqlPegaMembers)){
	
	$criaArray['id'] = $rows['id'];
	$criaArray['first'] = $rows['name'];
	$criaArray['last'] = $rows['name'];
	$criaArray['username'] = $rows['name'];
	$criaArray['email'] = $rows['email'];
	
	array_push($array_retorno, $criaArray);
}

echo json_encode($array_retorno);

?>