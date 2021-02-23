<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "lab";

	try {

		$conn = mysqli_connect($servername,$username,$password,$dbname);
	    
	}
	catch(MySqlException $e){

	    echo "Falha na conexao: " . $e->getMessage();
	    
	}


?>