<?php

header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
header('Content-Type: text/html; charset=utf-8');


require("conexaoPDO.php");

$userID = $_GET['id'];


$sqlPegaMembers = mysqli_query($conexao, "SELECT * FROM users WHERE id = '$userID'") or die(mysqli_error($conexao));

$array_retorno = array();

while($rows=mysqli_fetch_array($sqlPegaMembers)){
	
	$criaArray['id'] = $rows['id'];
	$criaArray['first'] = $rows['first'];
	$criaArray['last'] = $rows['last'];
	$criaArray['username'] = $rows['username'];
	$criaArray['email'] = $rows['email'];
	$criaArray['image'] = $rows['image'];
	
	array_push($array_retorno, $criaArray);
}

echo json_encode($array_retorno);

?>