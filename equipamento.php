<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
<?php include"header.php";include_once 'conexao.php';$pdo = conectar(); ?>

<!-- Conteudo -->

<div id="portal-column-content" class="cell width-3:4 position-1:4">
    <a name="acontent" id="acontent" class="anchor">conteúdo</a>
    <a href="" title="Cadastrar Equipamento"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#addEquipamentoModal">Cadastrar</button></a>
    <div style="margin: -5% 0% 0% 20%">    
        <div class="col-md-5">
            <input id="desc_Mat" name="desc_Mat" type="text" placeholder="Descrição" class="form-control input-md" required="" style="text-align: center;">
        </div>
        <a href="" title="Pesquisar Equipamento"><button type="button" class="btn btn-secundary" data-toggle="modal" data-target="#addMaterialModal">Pesquisar</button></a>
    </div>
    <br>

    <span id="msg"></span>
    <div id="tabela">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" width="45%">Descrição</th>
                <th scope="col" width="30%">Localização</th>
                <th scope="col" width="15%">Quantidade</th>
                <th></th>
            </tr>
        </thead>
        <?php
        //$email = $_SESSION['user'];
            $sql = $pdo->prepare("SELECT id_equip,desc_equip,local_equip,qtd_equip FROM lab.equipamento");
            $result = $sql->execute();


            
            while($exibir = $sql->fetch(PDO::FETCH_ASSOC)){
            ?>
        <tbody>
           <td><?php echo $exibir['desc_equip']; ?></td>
                <td><?php echo $exibir['local_equip']; ?></td>
                <td><?php echo $exibir['qtd_equip']; ?></td>
                <td><a href="" title="Visualizar Equipamento"><button type="button" class="btn btn-secundary" data-toggle="modal" data-target="#visulEquipamentoModal" id="<?php echo $exibir['id_equip']; ?>">Visualizar</button></a></td>
            </tr>
            <?php 
             } ?>
        </tbody>
    </table>
    </div>

    <div id="addEquipamentoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" style="position: fixed; height: 200%; margin-top: -25%; margin-left: -7%;">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 150%">
              <div class="modal-header">
                <h4 class="modal-title" id="addEquipamentoModalLabel">Cadastrar Equipamento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <form class="form-horizontal" id="insert_form_E" method="post">
                    <p></p>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="desc_Equip">Descrição</label>  
                          <div class="col-md-5">
                            <input id="desc_Equip" name="desc_Equip" type="text" placeholder="Descrição" class="form-control input-md" required="" style="text-align: center;">
                          </div>
                          <div class="col-md-2">
                              <select id="area_Equip" name="area_Equip" class="form-control" style="margin: 0% -60% 0% 0%">
                                <option value="Biologia">Biologia</option>
                                <option value="Física">Física</option>
                                <option value="Química">Química</option>
                              </select> 
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="local_Equip">Localização</label>  
                        <div class="col-md-5">
                            <input id="local_Equip" name="local_Equip" type="text" placeholder="Localização" class="form-control input-md" required="" style="text-align: center;">    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="qtd_Equip">Quantidade</label>  
                        <div class="col-md-5">
                            <input id="qtd_Equip" name="qtd_Equip" type="text" placeholder="Quantidade" class="form-control input-md" required="" style="text-align: center;"> 
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-right: 77.5%">Fechar</button>
                        <input type="submit" name="cadEq" id="cadEq" value="Cadastrar" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="visulEquipamentoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" style="position: fixed; height: 200%; margin-top: -25%; margin-left: -7%;">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 150%">
                <div class="modal-header">
                    <h4 class="modal-title" id="visulEquipamentoModalLabel">Detalhes do Equipamento</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
          
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <p></p>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="desc_Equip">Descrição</label>  
                        <div class="col-md-5">
                            <input id="desc_Equip" type="text" placeholder="Descrição" class="form-control input-md" required="" value="pHmetro" style="text-align: center;">
                        </div>
                        <div class="col-md-2">
                          <select id="area_Equip" class="form-control" style="margin: 0% -60% 0% 0%">
                            <option value="Biologia">Biologia</option>
                            <option value="Física">Física</option>
                            <option value="Química">Química</option>
                          </select> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="local_Equip">Localização</label>  
                        <div class="col-md-5">
                                <input id="local_Equip" type="text" placeholder="Localização" class="form-control input-md" required="" value="Armário X" style="text-align: center;">    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="qtd_Equip">Quantidade</label>  
                        <div class="col-md-5">
                            <input id="qtd_Equip" type="text" placeholder="Quantidade" class="form-control input-md" required="" value="3" style="text-align: center;"> 
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-right: 81%">Fechar</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Editar</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    setTimeout(function() {
            $("#div").load("equipamento.php #tabela");
    }, 5000);
</script>
<?php include"scriptE.js"; ?>    
<?php include"footer.php"; ?>