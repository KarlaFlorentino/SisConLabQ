<?php
    include_once 'conexao.php';
    $queryString = $_POST['desc_Mat'];
    $sql = "SELECT id_mat,desc_mat,local_mat FROM material where desc_mat like('%" . $queryString . "%')";
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
                $id = $exibir['id_mat'];
                $sql3 = "SELECT qtd_mat FROM EstoqueMat where id_mat = '$id'";
                $result3 = mysqli_query($conn, $sql3);
                $resultMat = mysqli_fetch_assoc($result3);

                $tabela .="<td>".$exibir['desc_mat']."</td>";
                $tabela .="<td>".$exibir['local_mat']."</td>";
                $tabela .="<td>".$resultMat['qtd_mat']."</td>";
                $tabela .="<td><a href='' title='Visualizar Material'><button type='button' class='btn btn-secundary' data-toggle='modal' data-target='#visulMaterialModal' id='".$exibir['id_mat']."'>Visualizar</button></a></td>";
                $tabela .="</tr>";
            
             } 
        $tabela .="
        </tbody>
    </table>";
    echo $tabela;
?>