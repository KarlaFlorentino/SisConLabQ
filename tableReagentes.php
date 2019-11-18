<?php
    include_once 'conexao.php';
    $pdo = conectar();
    $dataAtual = date("Y-m-d");
    $sql = $pdo->prepare("SELECT cas,desc_reag,id_risco,qtd_reag,unidade,validade FROM lab.reagente");
    $result = $sql->execute();
    $tabela="<table class='table table-hover'>
    <thead>
      <tr>
        <th></th>
        <th scope='col' width='10%'>CAS</th>
        <th scope='col' width='45%'>Descrição</th>
        <th scope='col' width='5%'>Risco</th>
        <th scope='col' width='5%'>Quantidade</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    	<tr>";

    while($exibir = $sql->fetch(PDO::FETCH_ASSOC)){
    	$pesq = $exibir['id_risco'];
        $sql2 = $pdo->prepare("SELECT desc_risco FROM lab.risco WHERE id_risco = '$pesq'");
        $result2 = $sql2->execute();
        $risco = $sql2->fetch(PDO::FETCH_ASSOC);
        
        $time_validade = strtotime($exibir['validade']);
        $time_atual = strtotime($dataAtual);
        // Calcula a diferença de segundos entre as duas datas:
        $diferenca = $time_validade - $time_atual; // 19522800 segundos
        // Calcula a diferença de dias
        $dias = (int)floor( $diferenca / (60 * 60 * 24)); // 225 dias

        if ($dias < 0) {
        	$tabela .="<th scope='row'><img src='imagens/vencido.png' title='Vencido' width='15' height='15'></th>";
        }elseif ($dias > 10) {
            $tabela .="<th scope='row'><img src='imagens/ok.png' title='OK' width='15' height='15'></th>";
        }else{
            $tabela .="<th scope='row'><img src='imagens/quase.png' title='Quase Vencido' width='15' height='15'></th>";
        }

        $tabela .="<td>".$exibir['cas']."</td>";
        $tabela .="<td>".$exibir['desc_reag']."</td>";
        $tabela .="<td>".$risco['desc_risco']."</td>";
        $tabela .="<td>".$exibir['qtd_reag'].$exibir['unidade']."</td>";
        $tabela .="<td><a href='' title='Vizualizar Reagente'><button type='button' class='btn btn-secundary' data-toggle='modal' data-target='#visulReagenteModal' id='".$exibir['cas']."'>Visualizar</button></a></td>";
        $tabela .="<td><a  title='Cadastrar Anexo'><button type='button' class='btn btn-success' id='".$exibir['cas']."'onclick='retornaValor(this)' name='BotaoAnexo'>Anexo</button></a></td></tr>";
	}
	$tabela .="
	        </tbody>
	    </table>";
	    
	 echo $tabela;
?>