<?php
	include 'conexao.php';
	session_start();
	# recuperando os dados enviados via post:
	
	if (mysqli_connect_errno())
	
	trigger_error(mysqli_connect_error());
	$cas = $_POST['cas'];

	$sql = "SELECT lote FROM lab.Estoquereag WHERE cas ='$cas'";
	$result = mysqli_query($conn, $sql);

	if ($result == 0) {
	    echo '<option value="0">' . htmlentities('Não tem lote com esse cas') . '</option>';
	} 
	else {
	    while ($linha = mysqli_fetch_assoc($result)) {
	        echo '<option value="' . $linha['lote'] . '">' . utf8_encode($linha['lote']) . '</option>';
	    }
	}
?>