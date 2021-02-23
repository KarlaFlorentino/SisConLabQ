<?php

include 'conexao.php';
session_start();
# recuperando os dados enviados via post:

if (mysqli_connect_errno())

trigger_error(mysqli_connect_error());


	# recuperando os dados enviados via post:
	$desc_Classe = filter_input(INPUT_POST, 'desc_Classe', FILTER_SANITIZE_STRING);
	$email = $_SESSION['user'];

	$query = $conn->query("INSERT INTO lab.classe (`desc_Classe`,`email`)  VALUES (\"$desc_Classe\", \"$email\");");

	$conn->close();

	if($conn){
		echo true;
	}else{
		echo false;
	}
?>