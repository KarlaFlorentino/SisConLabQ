<?php
    include_once 'conexao.php';
    $queryString = $_POST['desc_Agenda'];
    $sql = "SELECT  id_agenda,data,desc_agenda FROM agenda where desc_agenda like('%" . $queryString . "%')";
    $result = mysqli_query($conn, $sql);
    $tabela="<table class='table table-hover'>
        <thead>
            <tr>
                <th scope='col' width='25%''>Data</th>
                <th scope='col' width='80%'>Descrição</th>
                <th></th>
            </tr>
        </thead>
        <tbody>";

         while($exibir = mysqli_fetch_assoc($result)){
                $tabela .="<td>".$exibir['data']."</td>";
                $tabela .="<td>".$exibir['desc_agenda']."</td>";
                $tabela .="<td><a href='' title='Visualizar Agendamento'><button type='button' class='btn btn-secundary' data-toggle='modal' data-target='#visulAgendaModal'>Visualizar</button></a></td>";
                $tabela .="</tr>";
            
             } 
        $tabela .="
        </tbody>
    </table>";
    echo $tabela;
?>