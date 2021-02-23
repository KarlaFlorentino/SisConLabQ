<?php
    include_once 'conexao.php';
    $dataAtual = date("Y-m-d");
    $sql = "SELECT lote,cas,desc_reag,id_risco FROM reagente";
    $result = mysqli_query($conn, $sql);    

    $tabela="<table class='table table-hover'>
    <thead>
      <tr>
        <th></th>
        <th scope='col' width='10%'>Lote</th>
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

    while($exibir = mysqli_fetch_assoc($result)){
    	$pesq = $exibir['id_risco'];
        $sql2 = "SELECT desc_risco FROM risco WHERE id_risco = '$pesq'";
        $result2 = mysqli_query($conn, $sql2);   
        $risco = mysqli_fetch_assoc($result2);
        
        $cas = $exibir['cas'];

        $sql3 = "SELECT cas,qtd_reag,unidade,validade FROM EstoqueReag where cas = '$cas'" ;
        $result3 = mysqli_query($conn, $sql3);   
        $resultReag = mysqli_fetch_assoc($result3);
        
        $time_validade = strtotime($resultReag['validade']);
        $time_atual = strtotime($dataAtual);
        // Calcula a diferença de segundos entre as duas datas:
        $diferenca = $time_validade - $time_atual; // 19522800 segundos
        // Calcula a diferença de dias
        $dias = (int)floor( $diferenca / (60 * 60 * 24)); // 225 dias

        

        if ($dias < 0) {
        	$tabela .="<th scope='row'><img src='imagens/vencido.png' title='Vencido' width='30' height='30'></th>";
        }elseif ($dias > 10) {
            $tabela .="<th scope='row'><img src='imagens/ok.png' title='OK' width='30' height='30'></th>";
        }else{
            $tabela .="<th scope='row'><img src='imagens/quase.png' title='Quase Vencido' width='30' height='30'></th>";
        }

        $tabela .="<td>".$exibir['lote']."</td>";
        $tabela .="<td>".$exibir['cas']."</td>";
        $tabela .="<td>".$exibir['desc_reag']."</td>";
        $tabela .="<td>".$risco['desc_risco']."</td>";
        $tabela .="<td>".$resultReag['qtd_reag'].$resultReag['unidade']."</td>";
        $tabela .="<td><a href='' title='Vizualizar Reagente'><button type='button' class='btn btn-secundary' data-toggle='modal' data-target='#visulReagenteModal' id='".$exibir['cas']."'>Visualizar</button></a></td>";
        $tabela .="<td><a  title='Cadastrar Anexo'><button type='button' class='btn btn-success' id='".$exibir['cas']."'onclick='retornaValor(this)' name='BotaoAnexo'>Anexo</button></a></td></tr>";
	}
	$tabela .="
	        </tbody>
	    </table>";
	    
	 echo $tabela;
?>