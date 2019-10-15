<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php include"header.php"; ?>

<!-- Conteudo -->


<div id="portal-column-content" class="cell width-3:4 position-1:4">
    <a name="acontent" id="acontent" class="anchor">conteúdo</a>
    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#addMaterialModal">Cadastrar</button>
    <div style="margin: -5% 0% 0% 20%">    
        <div class="col-md-5">
            <input id="desc_Mat" name="desc_Mat" type="text" placeholder="Descrição" class="form-control input-md" required="" style="text-align: center;">
        </div>
        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#addMaterialModal">Pesquisar</button>
    </div>
    
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
                <td scope="row">Balão de fundo chato 500ml</td>
                <td>Armário X</td>
                <td>6</td>
                <td><button type="button" class="btn btn-outline-success" data-toggle="modal"
                        data-target="#visulMaterialModal">Visualizar</button></td>
            </tr>
        </tbody>
    </table>

    <span id="msg"></span>

    <div id="addMaterialModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-backdrop="static"
        style="position: fixed; height: 200%; margin-top: -25%; margin-left: -7%;">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 150%">
                <div class="modal-header">
                    <h4 class="modal-title" id="addMaterialModalLabel">Cadastrar Material</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="form-horizontal" method="post" id="insert_form_M">
                    <p></p>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="desc_Mat">Descrição</label>
                        <div class="col-md-5">
                            <input id="desc_Mat" name="desc_Mat" type="text" placeholder="Descrição"
                                class="form-control input-md" required="" style="text-align: center;">
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" id="area_Mat" name="area_Mat" style="margin: 0% -60% 0% 0%">
                                <option value="Área">Área</option>
                                <option value="Biologia">Biologia</option>
                                <option value="Física">Física</option>
                                <option value="Química">Química</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="local_Mat">Localização</label>
                        <div class="col-md-5">
                            <input id="local_Mat" name="local_Mat" type="text" placeholder="Localização"
                                class="form-control input-md" required="" style="text-align: center;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="qtd_Mat">Quantidade</label>
                        <div class="col-md-5">
                            <input id="qtd_Mat" name="qtd_Mat" type="text" placeholder="Quantidade"
                                class="form-control input-md" required="" style="text-align: center;">
                        </div>
                    </div>
                    <div class="modal-footer">
                    <input type="submit" name="cadMat" id="cadMat" value="Cadastrar" class="btn btn-outline-success" style="margin-right: 78%">
                    <button type="button" class="btn btn-outline-info" data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="visulMaterialModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-backdrop="static"
        style="position: fixed; height: 200%; margin-top: -25%; margin-left: -7%;" onclose="AtualizarPai()">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 150%">
                <div class="modal-header">
                    <h4 class="modal-title" id="visulMaterialModalLabel">Detalhes do Material</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form class="form-horizontal" action="CadastrarL.php" method="post" enctype="multipart/form-data">
                    <p></p>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="desc_Mat">Descrição</label>
                        <div class="col-md-5">
                            <input id="desc_Mat" type="text" placeholder="Descrição" class="form-control input-md"
                                required="" value="Balão de fundo chato 500ml" style="text-align: center;">
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" id="area_Mat" style="margin: 0% -60% 0% 0%">
                                <option value="Selecione">Área</option>
                                <option value="Sim">Biologia</option>
                                <option value="Não">Física</option>
                                <option value="Não">Química</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="local_mat">Localização</label>
                        <div class="col-md-5">
                            <input id="local_mat" type="text" placeholder="Localização" class="form-control input-md"
                                required="" value="Armário X" style="text-align: center;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" for="qtd_Mat">Quantidade</label>
                        <div class="col-md-5">
                            <input id="qtd_Mat" type="text" placeholder="Quantidade" class="form-control input-md"
                                required="" value="6" style="text-align: center;">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-success" data-dismiss="modal"
                            style="margin-right: 82%">Editar</button>
                        <button type="button" class="btn btn-outline-info" data-dismiss="modal">Fechar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include"scriptM.js"; ?>
<?php include"footer.php"; ?>