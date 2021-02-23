<?php
include 'conexao.php';
session_start();
# recuperando os dados enviados via post:

if (mysqli_connect_errno())

trigger_error(mysqli_connect_error());
	$cas = $_POST['busca'];
	$lote = $_POST['busca3'];
	$qtd = $_POST['busca2'];

	$sql = "SELECT qtd_Reag FROM lab.Estoquereag WHERE cas='$cas' and lote = '$lote'";
	$result = mysqli_query($conn, $sql);    
	$resultReag = mysqli_fetch_assoc($result);

	$qtd2 = (float)$resultReag['qtd_Reag'];

	$result = (float)$qtd2 - (float)$qtd;
    


	if ($result < 0) {
		echo 'Quantidade indisponível! Total disponivel: '.$qtd2.''; 
	}else if ($result >= 0){
		echo '
			<div class="form-group">
			  <label class="col-md-4 control-label" for="idConfirmar"></label>
			  <div class="col-md-8">
			    <input type="submit" name="cadRG" id="cadRG" value="Enviar" class="btn btn-success" style="margin-left: 47%">
			  </div>
			</div>' ;
	}
	
?>