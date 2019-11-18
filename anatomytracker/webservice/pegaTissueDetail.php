<?php

header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
header('Content-Type: text/html; charset=utf-8');


require("conexaoPDO.php");

$tissue_id = $_GET['id'];


$sqlPegaMembers = mysqli_query($conexao, "SELECT * FROM tissue WHERE id = '$tissue_id'") or die(mysqli_error($conexao));

$array_retorno = array();

while($rows=mysqli_fetch_array($sqlPegaMembers)){
	
	$criaArray['id'] = $rows['id'];
	$criaArray['type'] = $rows['type'];
	$criaArray['gender'] = $rows['gender'];
	$criaArray['age'] = $rows['age'];
	$criaArray['dateofdeath'] = $rows['dateofdeath'];
	$criaArray['causeofdeath'] = $rows['causeofdeath'];
	$criaArray['embalmedType'] = $rows['embalmedType'];
	$criaArray['dateEmbalmed'] = $rows['dateEmbalmed'];
	$criaArray['intendedUse'] = $rows['intendedUse'];
	$criaArray['termofuse'] = $rows['termofuse'];
	$criaArray['otherlimitations'] = $rows['otherlimitations'];
	$criaArray['datebedisposed'] = $rows['datebedisposed'];
	$criaArray['returnremains'] = $rows['returnremains'];
	$criaArray['lastScanned'] = $rows['lastScanned'];
	$criaArray['scannedBy'] = $rows['scannedBy'];
	$criaArray['dateScanned'] = $rows['dateScanned'];
	$criaArray['tissueBank'] = $rows['tissueBank'];
	$criaArray['contact'] = $rows['contact'];
	$criaArray['name'] = $rows['name'];
	$criaArray['email'] = $rows['email'];
	$criaArray['phone'] = $rows['phone'];
	$criaArray['streetAddress'] = $rows['streetAddress'];
	$criaArray['city'] = $rows['city'];
	$criaArray['state'] = $rows['state'];
	$criaArray['postalCode'] = $rows['postalCode'];
	$criaArray['country'] = $rows['country'];
	$criaArray['addByAdmin'] = $rows['addByAdmin'];
	$criaArray['custom_id'] = $rows['custom_id'];
	
	array_push($array_retorno, $criaArray);
}

echo json_encode($array_retorno);

?>