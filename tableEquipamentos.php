<?php
    include_once 'conexao.php';
    $pdo = conectar();
    $sql = $pdo->prepare("SELECT id_equip,desc_equip,local_equip,qtd_equip FROM lab.equipamento");
    $result = $sql->execute();
    $tabela="<table class='table table-hover'>
        <thead>
            <tr>
                <th scope='col' width='45%'>Descrição</th>
                <th scope='col' width='30%'>Localização</th>
                <th scope='col' width='15%'>Quantidade</th>
                <th></th>
            </tr>
        </thead>
        <tbody>";

         while($exibir = $sql->fetch(PDO::FETCH_ASSOC)){
                $tabela .="<td>".$exibir['desc_equip']."</td>";
                $tabela .="<td>".$exibir['local_equip']."</td>";
                $tabela .="<td>".$exibir['qtd_equip']."</td>";
                $tabela .="<td><a href='' title='Visualizar Equipamento'><button type='button' class='btn btn-secundary' data-toggle='modal' data-target='#visulEquipamentoModal' id=".$exibir['id_equip'].">Visualizar</button></a></td>";
                $tabela .="</tr>";
            
             } 
        $tabela .="
        </tbody>
    </table>";
    echo $tabela;
?>