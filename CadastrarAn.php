<?php

	$id=$_POST['id'];
	include_once 'conexao.php';
	$pdo = conectar();
	
//echo "<script>alert('$id');</script>";
$name;
$tmp_name;
$error;
$location;
if ($_FILES["anexo"]["name"] != "") {

	$name = $_FILES["anexo"]["name"];

	$tmp_name = $_FILES['anexo']['tmp_name'];

	$error = $_FILES['anexo']['error'];

	$location = 'upload/';

	move_uploaded_file($tmp_name, $location.$name);
	  }
	
	$anexo = $location."".$name;
	//echo "<script>alert('$anexo');</script>";

	$sql = $pdo->prepare("UPDATE lab.reagente SET anexo=:anexo WHERE cas='$id'");

	$sql->bindValue(":anexo",$anexo);
	//var_dump($sql);

	try{
		$conn = $sql->execute();
		//echo True;
		header("location:reagente.php");
	}catch(Exception $e){
		//echo False;
		header("location:reagente.php");
	}
	
?>