<?php
	
	
	include 'conexao.php';
	session_start();
	# recuperando os dados enviados via post:
	
	if (mysqli_connect_errno())
	
	trigger_error(mysqli_connect_error());
	
	# recuperando os dados enviados via post:
	$id_Mat = filter_input(INPUT_POST, 'id_Mat', FILTER_SANITIZE_NUMBER_INT);
	$desc_Mat = filter_input(INPUT_POST, 'desc_Mat', FILTER_SANITIZE_STRING);
	$qtd_Mat = filter_input(INPUT_POST, 'qtd_Mat', FILTER_SANITIZE_NUMBER_INT);

	$sql = "SELECT qtd_mat from lab.estoquemat WHERE id_mat = '$id_Mat'";
	$result = mysqli_query($conn, $sql);    
	$exibir = mysqli_fetch_assoc($result);

	$qtd_velho = $exibir['qtd_mat'];

	$qtd_novo =$qtd_velho - (int)$qtd_Mat;
	
    $query = $conn->query("UPDATE  lab.estoquemat SET qtd_mat='$qtd_novo' WHERE id_mat='$id_Mat'");


	try{
		$conn->close();

		$_SESSION['erro'] = "OK";
		header("location:gestaoM.php");
	}catch(Exception $e){
		echo false;
		$_SESSION['erro'] = "ERRO";
		header("location:gestaoM.php");
	}
?>