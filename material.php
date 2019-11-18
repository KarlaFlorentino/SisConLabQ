<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


<?php include"header.php";include_once 'conexao.php';$pdo = conectar(); ?>

<!-- Conteudo -->


<div id="portal-column-content" class="cell width-3:4 position-1:4">
    <a name="acontent" id="acontent" class="anchor">conteúdo</a>
    <a href="" title="Cadastrar Material"><button type="button" class="btn btn-success" data-toggle="modal"
            data-target="#addMaterialModal">Cadastrar</button></a>
    <div style="margin: -5% 0% 0% 20%">
        <div class="col-md-5">
            <input id="desc_Mat" name="desc_Mat" type="text" placeholder="Descrição" class="form-control input-md"
                required="" style="text-align: center;">
        </div>
        <a href="" title="Pesquisar Material"><button type="button" class="btn btn-secundary" data-toggle="modal"
                data-target="#addMaterialModal">Pesquisar</button></a>
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
                    $sql = $pdo->prepare("SELECT id_mat,desc_mat,local_mat,qtd_mat FROM lab.material");
                    $result = $sql->execute();
                    while($exibir = $sql->fetch(PDO::FETCH_ASSOC)){
                ?>
            <tbody>
                <tr>
                    <td><?php echo $exibir['desc_mat']; ?></td>
                    <td><?php echo $exibir['local_mat']; ?></td>
                    <td><?php echo $exibir['qtd_mat']; ?></td>
                    <td><a href="" title="Visualizar Material"><button type="button"
                                class="btn btn-outline-primary view_data"
                                id="<?php echo $exibir['id_mat']; ?>">Visualizar</button></a></td>
                </tr>
                <?php 
                 } ?>
            </tbody>
        </table>
    </div>
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
                        <button type="button" class="btn btn-danger" data-dismiss="modal"
                            style="margin-right: 77.5%">Fechar</button>
                        <input type="submit" name="cadMat" id="cadMat" value="Cadastrar" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="visulMaterialModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="visulMaterialModalLabel">Detalhes do Material</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="post" enctype="multipart/form-data" >
                <div class="modal-body">
                    <span id="visul_material"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-info" data-dismiss="modal">Fechar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $(document).on('click', '.view_data', function() {
        var id_mat = $(this).attr("id");
        //alert(user_id);
        //Verificar se há valor na variável "user_id".
        if (id_mat !== '') {
            var dados = {
                id_mat: id_mat
            };
            $.post('visualizarM.php', dados, function(retorna) {
                //Carregar o conteúdo para o usuário
                $("#visul_material").html(retorna);
                $('#visulMaterialModal').modal('show');
            });
        }
    });
}); //não fechou
</script>
<?php include"scriptM.js"; ?>
<?php include"footer.php"; ?>