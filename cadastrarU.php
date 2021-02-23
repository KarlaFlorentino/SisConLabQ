<?php
	include 'conexao.php';
	session_start();
	# recuperando os dados enviados via post:
	
	if (mysqli_connect_errno())
	
	trigger_error(mysqli_connect_error());
	
	# recuperando os dados enviados via post:
	$email = $_POST['email'];
	$senha = $_POST['senha'];
	$area_Pessoa = $_POST['area_Pessoa'];
	$tipo = $_POST['tipo'];

	$query = $conn->query("INSERT INTO lab.pessoa (`email`,`senha`,`area_Pessoa`,`tipo`)  VALUES (\"$email\", \"$senha\", \"$area_Pessoa\", \"$tipo\");");

	$conn->close();
	
	try{
		 
		$_SESSION['erro'] = "OK";
		header("location: index.php");
		//echo "<script> window.location('index.php');</script>";
	}catch(Exception $e){
		$_SESSION['erro'] = "ERRO";
		header("location: index.php");
		//echo "<script> window.location('index.php');</script>";
		//echo "Erro";
		//echo "<script> alert('Erro ao cadastrar o usuário!');</script>";
		   
	}
?>