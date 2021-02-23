<?php
include 'conexao.php';
session_start();
# recuperando os dados enviados via post:

if (mysqli_connect_errno())

trigger_error(mysqli_connect_error());

	
	# recuperando os dados enviados via post:
	$id_Equip = filter_input(INPUT_POST, 'id_Equip', FILTER_SANITIZE_NUMBER_INT);
	$desc_Equip = filter_input(INPUT_POST, 'desc_Equip', FILTER_SANITIZE_STRING);
	$area_Equip = filter_input(INPUT_POST, 'area_Equip', FILTER_SANITIZE_STRING);
	$local_Equip = filter_input(INPUT_POST, 'local_Equip', FILTER_SANITIZE_STRING);
	$qtd_Equip = filter_input(INPUT_POST, 'qtd_Equip', FILTER_SANITIZE_NUMBER_INT);

	$query = $conn->query("INSERT INTO lab.equipamento (`id_Equip`,`desc_Equip`,`local_Equip`,`area_Equip`)  VALUES (\"$id_Equip\", \"$desc_Equip\", \"$local_Equip\", \"$area_Equip\");");
	$query = $conn->query("INSERT INTO lab.EstoqueEquip (`id_Equip`,`desc_Equip`,`qtd_Equip`)  VALUES (\"$id_Equip\", \"$desc_Equip\", \"$qtd_Equip\");");

	
	try{
		$conn->close();
		try {
			$conn->close();
			echo true;
		} catch (Exception $e) {
			echo false;
			$query = $con->query("DELETE FROM lab.equipamento WHERE id_Equip = '$id_Equip'");
  			$conn->close();
		}
	}catch(Exception $e){
		echo false;
	}
?>