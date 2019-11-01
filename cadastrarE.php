<?php

	include_once 'conexao.php';
	$pdo = conectar();
	
	# recuperando os dados enviados via post:
	$desc_Equip = filter_input(INPUT_POST, 'desc_Equip', FILTER_SANITIZE_STRING);
	$area_Equip = filter_input(INPUT_POST, 'area_Equip', FILTER_SANITIZE_STRING);
	$local_Equip = filter_input(INPUT_POST, 'local_Equip', FILTER_SANITIZE_STRING);
	$qtd_Equip = filter_input(INPUT_POST, 'qtd_Equip', FILTER_SANITIZE_NUMBER_INT);

	$sql = $pdo->prepare("INSERT INTO lab.equipamento (desc_Equip,local_Equip,qtd_Equip,area_Equip)  VALUES (:desc_Equip,:local_Equip,:qtd_Equip,:area_Equip)");
	//$sql = $pdo->prepare("INSERT INTO lab.material (desc_Mat,qtd_Mat,area_Mat,local_Mat)  VALUES ('desc_Mat',3,'area_Mat','local_Mat')");


	$sql->bindValue(":desc_Equip",$desc_Equip);
	$sql->bindValue(":local_Equip",$local_Equip);
	$sql->bindValue(":qtd_Equip",$qtd_Equip);
	$sql->bindValue(":area_Equip",$area_Equip);
	
	
	try{
		$conn = $sql->execute();
		echo true;
	}catch(Exception $e){
		echo false;
	}
?>