<?php
include 'conexao.php';
session_start();
# recuperando os dados enviados via post:

if (mysqli_connect_errno())

trigger_error(mysqli_connect_error());
	$id = $_POST['busca1'];
	$qtd = $_POST['busca2'];

	$sql = "SELECT qtd_Mat FROM lab.Estoquemat WHERE id_Mat ='$id'";
	$result = mysqli_query($conn, $sql);    
	$resultReag = mysqli_fetch_assoc($result);

	$qtd2 = (int)$resultReag['qtd_Mat'];

	$result = (int)$qtd2 - (int)$qtd;
    


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