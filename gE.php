<?php
	
	include 'conexao.php';
	session_start();
	# recuperando os dados enviados via post:
	
	if (mysqli_connect_errno())
	
	trigger_error(mysqli_connect_error());
	
	# recuperando os dados enviados via post:
	$id_Equip = filter_input(INPUT_POST, 'id_Equip', FILTER_SANITIZE_NUMBER_INT);
	$desc_Equip = filter_input(INPUT_POST, 'desc_Equip', FILTER_SANITIZE_STRING);
	$qtd_Equip = filter_input(INPUT_POST, 'qtd_Equip', FILTER_SANITIZE_NUMBER_INT);

	
	$sql = "SELECT qtd_equip from lab.Estoqueequip WHERE id_equip = '$id_Equip'";
	$result = mysqli_query($conn, $sql);    
	$exibir = mysqli_fetch_assoc($result);

	$qtd_velho = $exibir['qtd_equip'];

	$qtd_novo =$qtd_velho - (int)$qtd_Equip;
	
    $query = $conn->query("UPDATE  lab.estoqueequip SET qtd_Equip ='$qtd_novo'  WHERE id_Equip='$id_Equip'");
	
	
	try{
		$conn->close();
		$_SESSION['erro'] = "OK";
		header("location:gestaoE.php");
	}catch(Exception $e){
		echo false;
		$_SESSION['erro'] = "ERRO";
		header("location:gestaoE.php");
	}
?>