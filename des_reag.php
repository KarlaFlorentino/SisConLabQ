<?php
	include 'conexao.php'; 
	$cas = $_POST['busca'];
	$sql = "SELECT desc_reag FROM reagente WHERE cas ='$cas'";

	$result = mysqli_query($conn, $sql);    
	$resultReag = mysqli_fetch_assoc($result);

	
	//$desc2 = $resultReag['desc_reag'];
    

	if(($result) AND ($result->num_rows != 0)){
		echo '<input id="desc_reag" name="desc_reag" type="text"  value='.$resultReag['desc_reag'].' class="form-control input-md" readonly="readonly" style="text-align: center;">'; 
	}else if($result->num_rows == 0){
		echo '<input id="desc_reag" name="desc_reag" type="text" placeholder="Descrição" class="form-control input-md" required="" style="text-align: center;">' ;
	}
	
?>