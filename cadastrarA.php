<?php
include 'conexao.php';
session_start();
# recuperando os dados enviados via post:

if (mysqli_connect_errno())

trigger_error(mysqli_connect_error());

	# recuperando os dados enviados via post:
	$data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
	$desc_Agenda = filter_input(INPUT_POST, 'desc_Agenda', FILTER_SANITIZE_STRING);
	$horaInicio = filter_input(INPUT_POST, 'horaInicio', FILTER_SANITIZE_STRING);
	$horaFim = filter_input(INPUT_POST, 'horaFim', FILTER_SANITIZE_STRING);

	$query = $conn->query("INSERT INTO lab.agenda (`data`,`desc_Agenda`,`horaInicio`,`horaFim`)  VALUES (\"$data\",\"$desc_Agenda\", \"$horaInicio\", \"$horaFim\");");

	try{
		$conn->close();
		echo true;
	}catch(Exception $e){
		echo false;
	}

	/*$conn = $sql->execute();

	if($conn){
		$sql = $pdo->prepare("SELECT id_Agenda WHERE data = :data AND horaInicio = :horaInicio");
		$sql->bindValue(":data",$data);
		$sql->bindValue(":horaInicio",$horaInicio);
		$id_Agenda = $sql->execute();

		$sql = $pdo->prepare("INSERT INTO lab.pessoaagenda(email,id_Agenda) VALUES ('admin',:id_Agenda)");
		$sql->bindValue(":id_Agenda",$id_Agenda);
		$conn = $sql->execute();
		if($conn){
			echo true;
		}
		else{
			echo false;
		}
	}else{
		echo false;
	}*/
?>