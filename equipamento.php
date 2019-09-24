<LINK REL=StyleSheet href="listarReagente.css" Type="text/css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<?php include"header.php"; ?>

<!-- Conteudo -->

<div id="portal-column-content" class="cell width-3:4 position-1:4">
    <a name="acontent" id="acontent" class="anchor">conteúdo</a>
    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#addEquipamentoModal">Cadastrar</button>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Descrição</th>
                <th scope="col">Localização</th>
                <th scope="col">Quantidade</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row">pHmetro</td>
                <td>Armário X</td>
                <td>3</td>
                <td><button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#visulEquipamentoModal">Visualizar</button></td>
            </tr>
        </tbody>
    </table>

    <div id="addEquipamentoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" style="position: fixed; height: 200%; margin-top: -25%; margin-left: -7%;">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 150%">
              <div class="modal-header">
                <h4 class="modal-title" id="addEquipamentoModalLabel">Cadastrar Equipamento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                    <p></p>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="desc_Equip">Descrição</label>  
                          <div class="col-md-5">
                            <input id="desc_Equip" type="text" placeholder="Descrição" class="form-control input-md" required="" style="text-align: center;">
                          </div>
                          <div class="col-md-2">
                              <select id="area_Equip" class="form-control" style="margin: 0% -60% 0% 0%">
                                <option value="Selecione">Área</option> 
                                <option value="Sim">Biologia</option>
                                <option value="Não">Física</option>
                                <option value="Não">Química</option>
                              </select> 
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="local_Equip">Localização</label>  
                        <div class="col-md-5">
                            <input id="local_Equip" type="text" placeholder="Localização" class="form-control input-md" required="" style="text-align: center;">    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="qtd_Equip">Quantidade</label>  
                        <div class="col-md-5">
                            <input id="qtd_Equip" type="text" placeholder="Quantidade" class="form-control input-md" required="" style="text-align: center;"> 
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success" data-dismiss="modal" style="margin-right: 78%">Cadastrar</button>
                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">Fechar</button>
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
                            <option value="Selecione">Área</option> 
                            <option value="Sim">Biologia</option>
                            <option value="Não">Física</option>
                            <option value="Não">Química</option>
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
                        <button type="button" class="btn btn-outline-success" data-dismiss="modal" style="margin-right: 82%">Editar</button>
                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">Fechar</button>
                    </div>
                </form>  
            </div>
        </div>
    </div>
    </div>
<?php include"footer.php"; ?>