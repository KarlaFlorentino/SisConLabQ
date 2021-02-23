<?php

    include_once 'conexao.php';
    session_start();
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $query = "SELECT * from lab.pessoa where email='$email' and senha='$senha' ";
    $resultado = $conn->query($query);
   

    if ($resultado->num_rows > 0) {

        $linha = $resultado->fetch_assoc();
        
        $_SESSION['user'] = $linha['email'];
        $_SESSION['area_pessoa'] = $linha['area_pessoa'];
        //$_SESSION['tipo'] = $linha['tipo'];

        header("location: reagente.php");
    } else {
        
        $_SESSION['erro2']='Erro';
        //echo $_SESSION['erro'];
        header("location: index.php");

    }

?>
