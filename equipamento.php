<LINK REL=StyleSheet href="listarReagente.css" Type="text/css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<?php include"header.php"; ?>

<!-- Conteudo -->

<div id="portal-column-content" class="cell width-3:4 position-1:4">
    <a name="acontent" id="acontent" class="anchor">conteúdo</a>
    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#addUsuarioModal">Cadastrar</button>
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
                <td><button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#visulUsuarioModal">Visualizar</button></td>
            </tr>
        </tbody>
    </table>

    <div id="addUsuarioModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" style="position: fixed; height: 200%; margin-top: -25%; margin-left: -7%;">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 150%">
              <div class="modal-header">
                <h4 class="modal-title" id="addUsuarioModalLabel">Cadastrar Equipamento</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <form class="form-horizontal" action="CadastrarL.php" method="post" enctype="multipart/form-data">
                    <p></p>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="idTitulo">Descrição</label>  
                          <div class="col-md-5">
                            <input id="idTitulo" name="idTitulo" type="text" placeholder="Descrição" class="form-control input-md" required="" style="text-align: center;">
                          </div>
                          <div class="col-md-2">
                              <select name="Quantidade" class="form-control" style="margin: 0% -60% 0% 0%">
                                <option value="Selecione">Área</option> 
                                <option value="Sim">Biologia</option>
                                <option value="Não">Física</option>
                                <option value="Não">Química</option>
                              </select> 
                            </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="idAutor">Localização</label>  
                        <div class="col-md-5">
                            <input id="idAutor" name="idAutor" type="text" placeholder="Localização" class="form-control input-md" required="" style="text-align: center;">    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="idEdicao">Quantidade</label>  
                        <div class="col-md-5">
                            <input id="idEdicao" name="idEdicao" type="text" placeholder="Quantidade" class="form-control input-md" required="" style="text-align: center;"> 
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


    <div id="visulUsuarioModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" style="position: fixed; height: 200%; margin-top: -25%; margin-left: -7%;">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 150%">
                <div class="modal-header">
                    <h4 class="modal-title" id="visulUsuarioModalLabel">Detalhes do Equipamento</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
          
                <form class="form-horizontal" action="CadastrarL.php" method="post" enctype="multipart/form-data">
                    <p></p>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="idTitulo">Descrição</label>  
                        <div class="col-md-5">
                            <input id="idTitulo" name="idTitulo" type="text" placeholder="Descrição" class="form-control input-md" required="" value="pHmetro" style="text-align: center;">
                        </div>
                        <div class="col-md-2">
                          <select name="Quantidade" class="form-control" style="margin: 0% -60% 0% 0%">
                            <option value="Selecione">Área</option> 
                            <option value="Sim">Biologia</option>
                            <option value="Não">Física</option>
                            <option value="Não">Química</option>
                          </select> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="idAutor">Localização</label>  
                        <div class="col-md-5">
                                <input id="idAutor" name="idAutor" type="text" placeholder="Localização" class="form-control input-md" required="" value="Armário X" style="text-align: center;">    
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="idEdicao">Quantidade</label>  
                        <div class="col-md-5">
                            <input id="idEdicao" name="idEdicao" type="text" placeholder="Quantidade" class="form-control input-md" required="" value="3" style="text-align: center;"> 
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