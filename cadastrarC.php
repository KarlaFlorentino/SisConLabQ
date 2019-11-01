<?php

	include_once 'conexao.php';
	$pdo = conectar();

	# recuperando os dados enviados via post:
	$desc_Classe = filter_input(INPUT_POST, 'desc_Classe', FILTER_SANITIZE_STRING);
	$email = 'admin';

	$sql = $pdo->prepare("INSERT INTO lab.classe (desc_Classe, email)  VALUES (:desc_Classe, :email)");

	$sql->bindValue(":desc_Classe",$desc_Classe);
	$sql->bindValue(":email",$email);

	try{
		$conn = $sql->execute();
		echo true;
	}catch(Exception $e){
		echo false;
	}
?>