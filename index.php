<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
<meta charset="utf-8">
<LINK REL=StyleSheet href="index.css" Type="text/css">

  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<script type="text/javascript">
  function showDiv( idName, value ){
    objDiv = document.getElementById( idName );
    if( value )
        objDiv.style.display = "";
    else
        objDiv.style.display = "none";
  }

  function mostraTotal() {  
    var senha =  document.getElementById('senha');
    var senha2 = document.getElementById('senha2');
    var botton =  document.getElementById('cadUser');

    if(senha.value != senha2.value){
      document.getElementById("msgSenha").innerHTML = ('<p class="message" style="color:red;" ->Senhas diferentes!</p><br>');
      botton.disabled=true;
    }else{
      document.getElementById("msgSenha").innerHTML = "";
      botton.disabled=false;
    }
  } 
</script>

<script type="text/javascript">
        setTimeout(function() {
            $("#erro").fadeOut().empty();
        }, 5000);
</script>
</head>
<body>
<div class="login-page">
  <div class="form">
    <div id="d2" style="display:none;">
      <form class="insert_form_U" method="post" action="cadastrarU.php">
        <input type="text" id="email" name="email" value="analuisadass@gmail.com" placeholder="e-mail"/>
        <input type="password" id="senha" name="senha" value="senha" placeholder="senha"/>
        <input type="password" id="senha2" value="senha" onblur="mostraTotal();"name="senha2" placeholder="confirmar senha"/>
        <span id="msgSenha"></span>
        <select id="area_Pessoa" name="area_Pessoa" class="form-control">
          <option>Selecione a área</option>
          <option value="Biologia" selected="">Biologia</option>
          <option value="Física">Física</option>
          <option value="Química">Química</option>
        </select>
        <select id="tipo" name="tipo" class="form-control">
          <option>Selecione a função</option>
          <option value="Professor" selected="">Professor</option>
          <option value="Monitor">Monitor</option>
        </select>
         <button type="submit" id="cadUser" name="CadUser">cadastrar</button>
        <p class="message">Já é cadastrado? <a href="javascript:void(0)" onclick="javascript:showDiv( 'd1', true );showDiv( 'd2', false );">Faça login.</a></p>
    </form>
    </div>
    <span id="msg"></span>
    <div id="d1" style="display: ">
      <form class="login-form" method="post">
        <input type="text" placeholder="e-mail"/>
        <input type="password" placeholder="senha"/>
        <p class="message"><a href="javascript:void(0)" onclick="javascript:showDiv( 'd1', false );showDiv( 'd3', true );">Esqueceu a senha?</a> </p>
        <br>
        <button type="submit">login</button>
        <p class="message">Não é cadastrado? <a href="javascript:void(0)" onclick="javascript:showDiv( 'd1', false );showDiv( 'd2', true );">Cadastre-se.</a></p>
        <br>
        <?php
        //session_destroy();
        //$_SESSION['erro'] = true;
        if (isset($_SESSION['erro'])) {
          if ($_SESSION['erro']=="ERRO") {
        ?>
          <div style="color: red; width: 100%, text-align: center;" id="erro">
            <strong>Erro </strong> ao inserir o registro.
          </div>
        <?php
          }
          else{
        ?>
          <div style="color: green; width: 100%, text-align: center;" id="erro">
            <strong>Sucesso</strong> ao cadastrar. 
          </div>
        <?php
        }
      session_unset($_SESSION['erro']);
      }
  ?>
      </form>
    </div>
    <div id="d3" style="display:none;">
      <form class="senha-form" method="post">
        <input type="text" placeholder="e-mail"/>
        <button onclick="javascript:showDiv( 'd1', true );showDiv( 'd3', false );">confirmar</button>
    </form>
    </div>
  </div> 
</div>
</body>
</html>


