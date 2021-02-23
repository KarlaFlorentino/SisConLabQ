<?php
    include_once 'conexao.php';
    $sql = "SELECT id_equip,desc_equip,local_equip FROM equipamento";
    $result = mysqli_query($conn, $sql);    
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

         while($exibir = mysqli_fetch_assoc($result)){
                $id = $exibir['id_equip'];
                $sql3 = "SELECT qtd_equip FROM EstoqueEquip where id_equip = '$id'";
                $result3 = mysqli_query($conn, $sql3); 
                $resultEquip = mysqli_fetch_assoc($result3);

                $tabela .="<td>".$exibir['desc_equip']."</td>";
                $tabela .="<td>".$exibir['local_equip']."</td>";
                $tabela .="<td>".$resultEquip['qtd_equip']."</td>";
                $tabela .="<td><a href='' title='Visualizar Equipamento'><button type='button' class='btn btn-secundary' data-toggle='modal' data-target='#visulEquipamentoModal' id='".$exibir['id_equip']."'>Visualizar</button></a></td>";
                $tabela .="</tr>";
            
             } 
        $tabela .="
        </tbody>
    </table>";
    echo $tabela;
?>