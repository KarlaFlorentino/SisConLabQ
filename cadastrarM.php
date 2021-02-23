<?php

	include 'conexao.php';
	session_start();
	# recuperando os dados enviados via post:
	
	if (mysqli_connect_errno())

    trigger_error(mysqli_connect_error());

    # recuperando os dados enviados via post:
	$id_Mat = filter_input(INPUT_POST, 'id_Mat', FILTER_SANITIZE_NUMBER_INT);
	$desc_Mat = filter_input(INPUT_POST, 'desc_Mat', FILTER_SANITIZE_STRING);
	$area_Mat = filter_input(INPUT_POST, 'area_Mat', FILTER_SANITIZE_STRING);
	$local_Mat = filter_input(INPUT_POST, 'local_Mat', FILTER_SANITIZE_STRING);
	$qtd_Mat = filter_input(INPUT_POST, 'qtd_Mat', FILTER_SANITIZE_NUMBER_INT);

   // Executando uma consulta sql no banco de dados na tabela 'area'

    $query = $conn->query("INSERT INTO lab.material (`id_Mat`,`desc_Mat`,`area_Mat`,`local_Mat`)  VALUES (\"$id_Mat\", \"$desc_Mat\", \"$area_Mat\", \"$local_Mat\");");
	
	
	$query = $conn->query("INSERT INTO lab.Estoquemat (`qtd_Mat`,`desc_Mat`,`id_Mat`)  VALUES (\"$qtd_Mat\",\"$desc_Mat\",\"$id_Mat\");");
	
	
	try{
		$conn->close();
		try {
			$conn->close();
		} catch (Exception $e) {
			echo false;
			$query = $con->query("DELETE FROM lab.material WHERE id_Mat = '$id_Mat'");
  			$conn->close();
		}
	}catch(Exception $e){
		echo false;
	}
?>