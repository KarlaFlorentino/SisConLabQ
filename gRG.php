<?php
	include 'conexao.php';
	session_start();
	# recuperando os dados enviados via post:
	
	if (mysqli_connect_errno())
	
	trigger_error(mysqli_connect_error());
	
	# recuperando os dados enviados via post:
	$cas = filter_input(INPUT_POST, 'cas', FILTER_SANITIZE_NUMBER_INT);
	$lote = filter_input(INPUT_POST, 'lote', FILTER_SANITIZE_STRING);
	$qtd_Reag = filter_input(INPUT_POST, 'qtd_Reag', FILTER_SANITIZE_STRING);
	$desc_Reag = filter_input(INPUT_POST, 'desc_Reag', FILTER_SANITIZE_STRING);

		
	$sql = "SELECT qtd_Reag from lab.Estoquereag WHERE cas = '$cas' and lote = '$lote'";
	$result = mysqli_query($conn, $sql);    
	$exibir = mysqli_fetch_assoc($result);

	$qtd_velho = $exibir['qtd_reag'];

	$qtd_novo =$qtd_velho - (float)$qtd_Reag;
	
    $query = $conn->query("UPDATE  lab.Estoquereag SET qtd_Reag='$qtd_novo'  WHERE cas='$cas' and lote = '$lote'");

	
	try{
		$conn->close();
		$_SESSION['erro'] = "OK";
		header("location:gestaoRG.php");
	}catch(Exception $e){
		echo false;
		$_SESSION['erro'] = "ERRO";
		header("location:gestaoRG.php");
	}
?>