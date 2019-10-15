<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php include"header.php"; ?>

<!-- Conteudo -->

  <div id="portal-column-content" class="cell width-3:4 position-1:4">
    <a name="acontent" id="acontent" class="anchor">conteúdo</a>
    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#addAgendaModal">Agendar</button>
    <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Responsável</th>
        <th scope="col">Data</th>
        <th scope="col">Descrição</th>
        <th scope="col">Horário inicio</th>
        <th scope="col">Horário fim</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td scope="row">Karla</td>
        <td>Aula prática</td>
        <td>13/09/2019</td>
        <td>9:00</td>
        <td>11:00</td>
        <td><button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#visulUsuarioModal">
            Visualizar
          </button></td>
      </tr>
    </tbody>
    </table>
<span id="msg"></span>
    <div id="addAgendaModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" style="position: fixed; height: 200%; margin-top: -25%; margin-left: -7%;">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 150%">
          <div class="modal-header">
            <h4 class="modal-title" id="addUsuarioModalLabel">Agendar Laborátorio</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-horizontal" method="post" id="insert_form_A">
            <p></p>
            <div class="form-group">
              <label class="col-md-4 control-label" for="idTitulo">Data: </label>  
              <div class="col-md-5">
                <input type="date" id="data" name="data "class="form-control input-md" style="text-align: center;">    
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="idTitulo">Descrição: </label>  
              <div class="col-md-5">
                <input id="desc_Agenda" name="desc_Agenda" type="text" placeholder="Descrição" class="form-control input-md" required="" style="text-align: center;">  
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="idEdicao">Horário Início</label>  
              <div class="col-md-5">
                <input id="horaInicio" name="horaInicio" type="text" placeholder="Horário Início" class="form-control input-md" required="" style="text-align: center;">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="idEdicao">Horário Fim</label>  
              <div class="col-md-5">
                <input id="horaFim" name="horaFim" type="text" placeholder="Horário fim" class="form-control input-md" required="" style="text-align: center;">
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

    <div id="visulUsuarioModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" style="position: fixed; height: 200%; margin-top: -25%; margin-left: -7%;" onclose="AtualizarPai()">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 150%">
          <div class="modal-header">
            <h4 class="modal-title" id="visulUsuarioModalLabel">Detalhes do Agendamento</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form class="form-horizontal" action="CadastrarL.php" method="post" enctype="multipart/form-data">
            <p></p>
            <div class="form-group">
              <label class="col-md-4 control-label" for="idTitulo">Data: </label>  
              <div class="col-md-5">
                <input type="date" class="form-control input-md" style="text-align: center;">    
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="idTitulo">Descrição: </label>  
              <div class="col-md-5">
                <input id="idEdicao" name="idEdicao" type="text" value="Aula prática" class="form-control input-md" required="" style="text-align: center;">  
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="idEdicao">Horário Início</label>  
              <div class="col-md-5">
                <input id="idEdicao" name="idEdicao" type="text" placeholder="Horário Início" class="form-control input-md" required="" value="9:00" style="text-align: center;">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label" for="idEdicao">Horário Fim</label>  
              <div class="col-md-5">
                <input id="idEdicao" name="idEdicao" type="text" placeholder="Horário fim" class="form-control input-md" required="" value="11:00" style="text-align: center;">
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
<?php include"scriptA.js"; ?>  
<?php include"footer.php"; ?>
