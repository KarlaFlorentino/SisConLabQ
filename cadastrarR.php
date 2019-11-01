<?php

	include_once 'conexao.php';
	$pdo = conectar();

	# recuperando os dados enviados via post:
	$desc_Risco = filter_input(INPUT_POST, 'desc_Risco', FILTER_SANITIZE_STRING);
	$email = 'admin';

	$sql = $pdo->prepare("INSERT INTO lab.risco (desc_Risco, email)  VALUES (:desc_Risco, :email)");

	$sql->bindValue(":desc_Risco",$desc_Risco);
	$sql->bindValue(":email",$email);

	try{
		$conn = $sql->execute();
		echo true;
	}catch(Exception $e){
		echo false;
	}
?>