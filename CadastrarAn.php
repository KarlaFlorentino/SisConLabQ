<?php
session_start();
	$id=$_SESSION['id'];
	include_once 'conexao.php';
	$pdo = conectar();
	
	echo "<script>alert('$id');</script>";

if ($_FILES["anexo"]["name"] != "") {

	$name = $_FILES["anexo"]["name"];

	$tmp_name = $_FILES['anexo']['tmp_name'];

	$error = $_FILES['anexo']['error'];

	$location = 'upload/';

	if  (move_uploaded_file($tmp_name, $location.$name)){
	    echo 'Uploaded';    
	}

	$anexo = $location."".$name;
	$sql = $pdo->prepare("INSERT INTO lab.reagente(anexo)  VALUES (:anexo) WHERE id_reag='$id'");

	$sql->bindValue(":anexo",$anexo);
	
}
	try{
		$conn = $sql->execute();
		echo true;
	}catch(Exception $e){
		echo false;
	}
	
?>