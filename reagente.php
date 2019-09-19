<LINK REL=StyleSheet href="reagente.css" Type="text/css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<?php include"header.php"; ?>

<!-- Conteudo -->

<div id="portal-column-content" class="cell width-3:4 position-1:4">
  <a name="acontent" id="acontent" class="anchor">conteúdo</a>
  <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#addUsuarioModal">Cadastrar</button>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">CAS</th>
        <th scope="col">Descrição</th>
        <th scope="col">Localização</th>
        <th scope="col">Controlado</th>
        <th scope="col">Risco</th>
        <th scope="col">Quantidade</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">64-19-7</th>
        <td>Ácido Acético</td>
        <td>Armário X</td>
        <td>Sim</td>
        <td>risco</td>
        <td>2 L</td>
        <td><button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#visulUsuarioModal">Visualizar</button></td>
      </tr>
    </tbody>
  </table>

  <div id="addUsuarioModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" style="position: fixed; height: 200%; margin-top: -25%; margin-left: -7%;">
  <!-- style="position: fixed; height: 100; margin-top: -15.2%; margin-left: -6%; --> 
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="width: 150%">
        <div class="modal-header">
          <h4 class="modal-title" id="addUsuarioModalLabel">Cadastrar Reagente</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" action="CadastrarL.php" method="post" enctype="multipart/form-data">
          <p></p>
          <div class="form-group">
            <label class="col-md-4 control-label" for="idTitulo">CAS</label>  
            <div class="col-md-5">
              <input id="idTitulo" name="idTitulo" type="text" placeholder="CAS" class="form-control input-md" required="" style="text-align: center;">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="idAutor">Descrição</label>  
            <div class="col-md-5">
              <input id="idAutor" name="idAutor" type="text" placeholder="Nome" class="form-control input-md" required="" style="text-align: center;">  
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="idEdicao">Localização</label>  
            <div class="col-md-5">
              <input id="idEdicao" name="idEdicao" type="text" placeholder="Localização" class="form-control input-md" required="" style="text-align: center;">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="idCategoria">Controlado</label>
            <div class="col-md-3">
              <select id="idCategoria" name="idCategoria" class="form-control">
                <option>Selecione</option>
                <option value="Sim">Sim</option>
                <option value="Não">Não</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="idTitulo">Classe: </label>  
            <div class="col-md-5">
              <select id="idClasse" name="idClasse" class="form-control">
                <option>Selecione</option>
                <option value="Ácido">Ácido</option>
                <option value="Ácido Carboxílico">Ácido Carboxílico</option>
                <option value="Aldeído">Aldeído</option>
                <option value="Álcool">Álcool</option>
                <option value="Anidrido">Anidrico</option>
                <option value="Amida">Amida</option>
                <option value="Amina">Amina</option>
                <option value="Base">Base</option>
                <option value="Cetona">Cetona</option>
                <option value="Éster">Éster</option>
                <option value="Éter">Éter</option>
                <option value="Fenol">Fenol</option>
                <option value="Haleto orgânico">Haleto orgânico</option>
                <option value="Hidrocarboneto">Hidrocarboneto</option>
                <option value="Sal">Sal</option>
                <option value="Óxido">Óxido</option>
              </select>
            </div>
            <div class="col-md-2">
              <button style="margin: 0% -60% 0% 0%" type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#addClasseModal"">Adicionar</button> 
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="idRisco">Risco</label>
            <div class="col-md-3">
              <select id="idRisco" name="idCategoria" class="form-control">
                <option value="Risco1">Selecione</option>
              </select>
            </div>
            <div class="col-md-2">
              <button style="margin: 0% -60% 0% 0%" type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#addRiscoModal" >Adicionar</button> 
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="idTitulo">Quantidade: </label>  
            <div class="col-md-5">
                <input placeholder="Quantidade" class="form-control input-md" style="text-align: center;">
            </div>
            <div class="col-md-2">
              <select name="Quantidade" class="form-control" style="margin: 0% -60% 0% 0%">
                <option value="Selecione">Unidade</option> 
                <option value="L">L</option> 
              </select> 
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="idTitulo">Validade: </label>  
            <div class="col-md-5">
              <input type="date" class="form-control input-md" style="text-align: center;">    
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="idTitulo">Anexo: </label>  
            <div class="col-md-7">
              <input type="file" placeholder="Anexo" class="form-control input-md">    
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

  <div id="visulUsuarioModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" style="position: fixed; height: 200%; margin-top: -25%; margin-left: -7%;" onclose="AtualizarPai()">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="width: 150%">
        <div class="modal-header">
          <h4 class="modal-title" id="visulUsuarioModalLabel">Detalhes do Reagente</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          
        <form class="form-horizontal" action="CadastrarL.php" method="post" enctype="multipart/form-data">
          <p></p>
          <div class="form-group">
            <label class="col-md-4 control-label" for="idTitulo">CAS</label>  
            <div class="col-md-5">
              <input id="idTitulo" name="idTitulo" type="text" placeholder="CAS" class="form-control input-md" required="" value="64-19-7" style="text-align: center;">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="idAutor">Descrição</label>  
            <div class="col-md-5">
              <input id="idAutor" name="idAutor" type="text" placeholder="Nome" class="form-control input-md" required="" value="Ácido Acético" style="text-align: center;">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="idEdicao">Localização</label>  
            <div class="col-md-5">
              <input id="idEdicao" name="idEdicao" type="text" placeholder="Localização" class="form-control input-md" required="" value="Armário X" style="text-align: center;">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="idCategoria">Controlado</label>
            <div class="col-md-3">
              <select id="idCategoria" name="idCategoria" class="form-control">
                <option>Selecione</option>
                <option value="Sim" selected="">Sim</option>
                <option value="Não">Não</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="idTitulo">Classe: </label>  
            <div class="col-md-5">
              <select id="idClasse" name="idClasse" class="form-control">
                <option>Selecione</option>
                <option value="Ácido">Ácido</option>
                <option value="Ácido Carboxílico">Ácido Carboxílico</option>
                <option value="Aldeído">Aldeído</option>
                <option value="Álcool">Álcool</option>
                <option value="Anidrido">Anidrico</option>
                <option value="Amida">Amida</option>
                <option value="Amina">Amina</option>
                <option value="Base">Base</option>
                <option value="Cetona">Cetona</option>
                <option value="Éster">Éster</option>
                <option value="Éter">Éter</option>
                <option value="Fenol">Fenol</option>
                <option value="Haleto orgânico">Haleto orgânico</option>
                <option value="Hidrocarboneto">Hidrocarboneto</option>
                <option value="Sal">Sal</option>
                <option value="Óxido">Óxido</option>
              </select>
            </div>
            <div class="col-md-2">
              <button style="margin: 0% -60% 0% 0%" type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#addClasseModal"">Adicionar</button> 
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="idRisco">Risco</label>
            <div class="col-md-3">
              <select id="idRisco" name="idCategoria" class="form-control">
                <option value="Risco">Selecione</option>
                <option selected="">Risco</option>
              </select>
            </div>
            <div class="col-md-2">
              <button style="margin: 0% -60% 0% 0%" type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#addRiscoModal" >Adicionar</button> 
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="idTitulo">Quantidade: </label>  
            <div class="col-md-5">
              <input placeholder="Quantidade" value="2" class="form-control input-md" style="text-align: center;">
            </div>
            <div class="col-md-2">
              <select name="Quantidade" class="form-control" style="margin: 0% -60% 0% 0%">
                <option value="Selecione">Unidade</option> 
                <option value="L" selected="">L</option> 
              </select> 
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="idTitulo">Validade: </label>  
            <div class="col-md-5">
              <input type="date" placeholder="Validade" class="form-control input-md" style="text-align: center;">    
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-4 control-label" for="idTitulo">Anexo: </label>  
            <div class="col-md-7">
              <input type="file" placeholder="Anexo" class="form-control input-md">    
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


  <div id="addClasseModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" style="position: fixed; margin-top: -10%; margin-left: 10%;">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="addUsuarioModalLabel">Cadastrar Classe</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" action="CadastrarL.php" method="post" enctype="multipart/form-data">
          <p></p>
            <div class="form-group">
              <label class="col-md-4 control-label" for="idTitulo">Classe</label>  
              <div class="col-md-5">
                <input id="idTitulo" name="idTitulo" type="text" placeholder="Classe" class="form-control input-md" required="" style="text-align: center;">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-success" data-dismiss="modal" style="margin-right: 70%">Editar</button>
              <button type="button" class="btn btn-outline-info" data-dismiss="modal">Fechar</button>
            </div>
        </form>                   
      </div>
    </div>
  </div>

  <div id="addRiscoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" style="position: fixed; margin-top: -10%; margin-left: 10%;">  <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="addUsuarioModalLabel">Cadastrar Risco</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="form-horizontal" action="CadastrarL.php" method="post" enctype="multipart/form-data">
          <p></p>
            <div class="form-group">
              <label class="col-md-4 control-label" for="idTitulo">Risco</label>  
              <div class="col-md-5">
                <input id="idTitulo" name="idTitulo" type="text" placeholder="Risco" class="form-control input-md" required="" style="text-align: center;">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-success" data-dismiss="modal" style="margin-right: 70%">Editar</button>
              <button type="button" class="btn btn-outline-info" data-dismiss="modal">Fechar</button>
            </div>
        </form>                   
      </div>
    </div>
  </div>
                            
  </div>
<?php include"footer.php"; ?>
