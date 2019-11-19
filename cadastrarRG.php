<?php

	include_once 'conexao.php';
	$pdo = conectar();
	
	
	
	# recuperando os dados enviados via post:
	$cas = filter_input(INPUT_POST, 'cas', FILTER_SANITIZE_STRING);
	$desc_reag = filter_input(INPUT_POST, 'desc_reag', FILTER_SANITIZE_STRING);
	$area_reag = filter_input(INPUT_POST, 'area_reag', FILTER_SANITIZE_STRING);
	$local_reag = filter_input(INPUT_POST, 'local_reag', FILTER_SANITIZE_STRING);
	$qtd_reag = filter_input(INPUT_POST, 'qtd_reag', FILTER_SANITIZE_NUMBER_FLOAT);
	$controlado = filter_input(INPUT_POST, 'controlado', FILTER_SANITIZE_STRING);
	$classe = filter_input(INPUT_POST, 'classe', FILTER_SANITIZE_STRING);
	$risco = filter_input(INPUT_POST, 'risco', FILTER_SANITIZE_STRING);
	$unidade = filter_input(INPUT_POST, 'unidade', FILTER_SANITIZE_STRING);
	$validade = filter_input(INPUT_POST, 'validade', FILTER_SANITIZE_STRING);


	$sql2 = $pdo->prepare("SELECT id_risco FROM lab.risco WHERE desc_risco = '$risco'");
	$sql2->execute();
	//$id_risco = $sql2->fetchall(PDO::FETCH_ASSOC);
	//$result_id_risco = $sql2-> fetch(PDO_FETCH_ASSOC); 
	//echo $id_risco;

	$sql3 = $pdo->prepare("SELECT id_classe FROM lab.classe WHERE desc_classe = '$classe'");
	$sql3->execute();
	//$id_classe = $sql3->fetchall(PDO::FETCH_ASSOC);
	//$result_id_classe = $sql3-> fetch(PDO_FETCH_ASSOC); 
	//echo $id_classe;

	$sql = $pdo->prepare("INSERT INTO lab.reagente (cas,desc_reag,local_reag,controlado,area_reag,id_classe,id_risco)  VALUES (:cas,:desc_reag,:local_reag,:controlado,:area_reag,:id_classe,:id_risco)");
	$sql->bindValue(":cas",$cas);
	$sql->bindValue(":desc_reag",$desc_reag);
	$sql->bindValue(":local_reag",$local_reag);
	$sql->bindValue(":controlado",$controlado);
	$sql->bindValue(":area_reag",$area_reag);
	$sql->bindValue(":id_classe",$classe);
	$sql->bindValue(":id_risco",$risco);
	//echo $sql;
	 $sql2 = $pdo->prepare("INSERT INTO lab.EstoqueReag (cas,qtd_reag,unidade,validade)  VALUES (:cas,:qtd_reag,:unidade,:validade)");
	$sql2->bindValue(":cas",$cas);
	$sql2->bindValue(":qtd_reag",$qtd_reag);
	$sql2->bindValue(":unidade",$unidade);
	$sql2->bindValue(":validade",$validade);
	try{
		$conn = $sql->execute();
		$conn = $sql2->execute();
		echo true;
	}catch(Exception $e){
		echo false;
	}

?>