 <?php
    include_once 'conexao.php';
    $select="<select id='classe' name='classe' class='form-control'>";
    $sql = "SELECT id_classe,desc_classe FROM classe";
    $result = mysqli_query($conn, $sql);
       
    while($exibir = mysqli_fetch_assoc($result)){
      $select.="<option value='".$exibir['id_classe']."'>".$exibir['desc_classe']."</option>";
    }
    $select.="</select>";

    echo $select;
 ?> 





