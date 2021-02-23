 <?php
    include_once 'conexao.php';
    $select="<select id='risco' name='risco' class='form-control'>";
    $sql = "SELECT id_risco,desc_risco FROM risco";
    $result = mysqli_query($conn, $sql);
       
    while($exibir = mysqli_fetch_assoc($result)){
      $select.="<option value='".$exibir['id_risco']."'>".$exibir['desc_risco']."</option>";
    }
    $select.="</select>";

    echo $select;
 ?> 





