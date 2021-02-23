<?php

include 'conexao.php';
session_start();
# recuperando os dados enviados via post:

if (mysqli_connect_errno())

trigger_error(mysqli_connect_error());


	# recuperando os dados enviados via post:
	$desc_Risco = filter_input(INPUT_POST, 'desc_Risco', FILTER_SANITIZE_STRING);
	$email = $_SESSION['user'];

	$query = $conn->query("INSERT INTO lab.risco (`desc_Risco`,`email`)  VALUES (\"$desc_Risco\", \"$email\");");

	$conn->close();
	if($conn){
		echo true;
	}else{
		echo false;
	}
?>