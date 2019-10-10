<?php

	include_once 'conexao.php';
	$pdo = conectar();
	
	# recuperando os dados enviados via post:
	$desc_Mat = filter_input(INPUT_POST, 'desc_Mat', FILTER_SANITIZE_STRING);
	$area_Mat = filter_input(INPUT_POST, 'area_Mat', FILTER_SANITIZE_STRING);
	$local_Mat = filter_input(INPUT_POST, 'local_Mat', FILTER_SANITIZE_STRING);
	$qtd_Mat = filter_input(INPUT_POST, 'qtd_Mat', FILTER_SANITIZE_NUMBER_INT);

	$sql = $pdo->prepare("INSERT INTO lab.material (desc_Mat,qtd_Mat,area_Mat,local_Mat)  VALUES (:desc_Mat,:qtd_Mat,:area_Mat,:local_Mat)");
	//$sql = $pdo->prepare("INSERT INTO lab.material (desc_Mat,qtd_Mat,area_Mat,local_Mat)  VALUES ('desc_Mat',3,'area_Mat','local_Mat')");


	$sql->bindValue(":desc_Mat",$desc_Mat);
	$sql->bindValue(":qtd_Mat",$qtd_Mat);
	$sql->bindValue(":area_Mat",$area_Mat);
	$sql->bindValue(":local_Mat",$local_Mat);
	
	$conn = $sql->execute();

	if($conn){
		echo true;
	}else{
		echo false;
	}
?>