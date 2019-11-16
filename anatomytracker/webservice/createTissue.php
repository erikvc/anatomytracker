<?php

header('Access-Control-Allow-Origin: *');
header("Content-type: application/json; charset=utf-8");
header('Content-Type: text/html; charset=utf-8');

require("conexaoPDO.php");

$type = $_POST['type'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$dateofdeath = $_POST['dateofdeath'];
$causeofdeath = $_POST['causeofdeath'];
//$dataNascimentoConvertida = date('Y-m-d', strtotime($dataNascimento));
$embalmedType = $_POST['embalmedType'];
$dateEmbalmed = $_POST['dateEmbalmed'];
$intendedUse = $_POST['intendedUse'];
$termofuse = $_POST['termofuse'];
$othrlimitations = $_POST['othrlimitations'];
$datebedisposed = $_POST['datebedisposed'];
$returnremains = $_POST['returnremains'];
$lastScanned = $_POST['lastScanned'];
$scannedBy = $_POST['scannedBy'];
$dateScanned = $_POST['dateScanned'];
$tissueBank = $_POST['tissueBank'];
$contact = $_POST['contact'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$streetAddress = $_POST['streetAddress'];
$city = $_POST['city'];
$state = $_POST['state'];
$postalCode = $_POST['postalCode'];
$country = $_POST['country'];
$addByAdmin = $_POST['addByAdmin'];

//var_dump($images);



				
				
				$sqlPegaTasks = mysqli_query($conexao, "INSERT INTO tissue (type, gender, age, dateofdeath, causeofdeath, embalmedType, dateEmbalmed, intendedUse, termofuse, otherlimitations, datebedisposed, returnremains, lastScanned, scannedBy, dateScanned, tissueBank, contact, name, email, phone, streetAddress, city, state, postalCode, country, addByAdmin)VALUES('$type', '$gender', '$age', '$dateofdeath', '$causeofdeath', '$embalmedType', '$dateEmbalmed', '$intendedUse', '$termofuse', '$othrlimitations', '$datebedisposed', '$returnremains', '$lastScanned', '$scannedBy', '$dateScanned', '$tissueBank', '$contact', '$name', '$email', '$phone', '$streetAddress', '$city', '$state', '$postalCode', '$country', '$addByAdmin')") or die(mysqli_error($conexao));
                


			


?>