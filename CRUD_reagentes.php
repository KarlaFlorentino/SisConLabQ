<!DOCTYPE html>
<html>
<head>
	<title>Reagente</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<h1>Reagentes</h1>
	<?php
	include_once 'conexao.php';
	$pdo = conectar();
	?>
	
	<div class="container">
		<form class="form-inline" action="/action_page.php">
			<div class="form-group">
				<div class="col-md-4">
		  		<label for="lote">Lote:</label>
		  		<div class="col-md-12">
			  		<input class="form-control" id="lote" placeholder="Lote" name="lote">
			  	</div>
				</div>
		  
		  
		  	<div class="col-md-4">
		  		<label for="cas">Cas:</label>
		  		<div class="col-md-12">
			  		<input class="form-control" id="cas" placeholder="Cas" name="cas">
			  	</div>
			  </div>

		  
		  	<div class="col-md-4">
			  	<label for="desc">Descrição:</label>
			  	<div class="col-md-12">
				  	<input class="form-control" id="desc" placeholder="Descrição" name="desc">
				  </div>
			  </div>

				<p></p>
		  
		  	<div class="col-md-4">
			  	<label for="classe">Classe:</label>
			  	<div class="col-md-12">
				  	<select id="classe" name="classe" class="form-control">
		            	<?php
		          		    $sql = $pdo->prepare("SELECT id_classe,desc_classe FROM lab.classe");
		          		    $result = $sql->execute();
		          		    
		          		    while($exibir = $sql->fetch(PDO::FETCH_ASSOC)){
	          		    ?>
	          		    <option value="<?php echo $exibir['id_classe'];?>"><?php echo $exibir['desc_classe']; ?></option>
	          		    <?php } ?>
              		</select>
				</div>
			</div>

		  
		  	<div class="col-md-4">
			  	<label for="local">Risco:</label>
			  	<div class="col-md-12">
				  	<select id="risco" name="risco" class="form-control">
		                <?php
		          		    $sql = $pdo->prepare("SELECT id_risco,desc_risco FROM lab.risco");
		          		    $result = $sql->execute();
		          		    
          		   			while($exibir = $sql->fetch(PDO::FETCH_ASSOC)){
          		    	?>
          		      	<option value="<?php echo $exibir['id_risco'];?>"><?php echo $exibir['desc_risco']; ?></option>
          		     	<?php } ?>
              		</select>
				</div>
			  </div>

		  
		  	<div class="col-md-4">
			  	<label for="qtd">Quantidade:</label>
			  	<div class="col-md-12">
				  	<input class="form-control" id="qtd" placeholder="Quantidade" name="qtd">
				  </div>
			  </div>

			  <p></p>
						  
		  	<div class="col-md-4">
			  	<label for="validade">Validade:</label>
			  	<div class="col-md-12">
				  	<input type="date" class="form-control" id="validade" name="validade">
				  </div>
				</div>

			
		  	<div class="col-md-4">
			  	<label for="local">Localização:</label>
			  	<div class="col-md-12">
				  	<input class="form-control" id="local" placeholder="Localização" name="local">
				  </div>
		  	</div>

			
				<div class="col-md-4">
				  <label for="controlado">Reagente controlado?</label>
				  <div class="col-md-12">
					  <input type="radio" id="sim" name="controlado" value="sim">
						<label for="sim">Sim</label>
						<input type="radio" id="nao" name="controlado" value="nao">
						<label for="nao">Não</label> <br>
					</div>
				</div>
			</div>
			
			<p></p>
		  <button type="submit" class="btn btn-success" style="margin-left: 80%">Cadastrar</button>
		
		</form>
	</div>


	<div id="tabela">
    <table class="table table-hover">
      <thead>
        <tr>
          <th></th>
          <th scope="col" width="10%">Lote</th>
          <th scope="col" width="10%">CAS</th>
          <th scope="col" width="45%">Descrição</th>
          <th scope="col" width="5%">Risco</th>
          <th scope="col" width="5%">Quantidade</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <?php
      //$email = $_SESSION['user'];
          $dataAtual = date("Y-m-d");
          $sql = $pdo->prepare("SELECT lote,cas,desc_reag,id_risco FROM lab.reagente");
          $result = $sql->execute();    

          
          while($exibir = $sql->fetch(PDO::FETCH_ASSOC)){
          	
            $pesq = $exibir['id_risco'];
            $sql2 = $pdo->prepare("SELECT desc_risco FROM lab.risco WHERE id_risco = '$pesq'");
            $result2 = $sql2->execute();
            $risco = $sql2->fetch(PDO::FETCH_ASSOC);

            $lote = $exibir['lote'];
            $cas = $exibir['cas'];
            $sql3 = $pdo->prepare("SELECT cas,qtd_reag,unidade,validade,lote FROM lab.EstoqueReag where cas = '$cas' AND lote = '$lote'" );
          	$result3 = $sql3->execute();
          	$resultReag =  $sql3->fetch(PDO::FETCH_ASSOC);

          ?>

      <tbody>
        <tr>
          <?php 
            $time_validade = strtotime($resultReag['validade']);
            $time_atual = strtotime($dataAtual);
            // Calcula a diferença de segundos entre as duas datas:
            $diferenca = $time_validade - $time_atual; // 19522800 segundos
            // Calcula a diferença de dias
            $dias = (int)floor( $diferenca / (60 * 60 * 24)); // 225 dias

            if ($dias < 0) {
              echo '<th scope="row"><img src="imagens/vencido.png" title="Vencido" width="30" height="30"></th>';
            }elseif ($dias > 10) {
              echo '<th scope="row"><img src="imagens/ok.png" title="OK" width="30" height="30"></th>';
            }else{
              echo '<th scope="row"><img src="imagens/quase.png" title="Quase Vencido" width="30" height="30"></th>';
            }
           ?>
           <td><?php echo $exibir['lote']; ?></td>
          <td><?php echo $exibir['cas']; ?></td>
          <td><?php echo $exibir['desc_reag']; ?></td>
          <td><?php echo $risco['desc_risco']; ?></td>
          <td><?php echo $resultReag['qtd_reag']; echo $resultReag['unidade'];?></td>
          <td><a href="" title="Vizualizar Reagente"><button type="button" class="btn btn-secundary" data-toggle="modal" data-target="#visulReagenteModal" id="<?php echo $exibir['cas']; ?>">Visualizar</button></a></td>
          <td><a  title="Cadastrar Anexo"><button type="button" class="btn btn-success" id="<?php echo $exibir['cas']; ?>"  onclick="retornaValor(this)" name="BotaoAnexo">Anexo</button></a></td>
        </tr>
        <?php 
           } ?>
      </tbody>
    </table>
  </div>

</body>
</html>