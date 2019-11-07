<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php 
  $id_reag=$_GET['id'];
  include"header.php"; 
?>

<!-- Conteudo -->

<div id="portal-column-content" class="cell width-3:4 position-1:4">
  <a name="acontent" id="acontent" class="anchor">conteúdo</a>
   <div class="col-md-10">
       	<form class="form-horizontal" method="POST" action="CadastrarAn.php" enctype="multipart/form-data">
          <p></p>
          <div class="form-group">
            <label class="col-md-4 control-label" for="idTitulo">Anexo: </label>  
            <div class="col-md-7">
              <input  name="id" id="<?php echo $id_reag;?>" value= "<?php echo $id_reag;?>">
              <input  type="file" id="anexo" name="anexo" placeholder="Anexo" class="form-control input-md">    
            </div>
              <a href="" title="Cadastrar Anexo"><input style="margin: -6% 0% 0% 92%" type="submit" class="btn btn-success" value="Cadatrar" ></a>
          </div>
        </form>
    </div>

	<p><br></p>

	<div  class="col-md-10">    
    <div class="col-md-5">
      <input id="desc_Mat" name="desc_Mat" type="text" placeholder="Descrição" class="form-control input-md" required="" style="text-align: center;">
    </div>
    <a href="" title="Pesquisar Anexo"><button type="button" class="btn btn-secundary" data-toggle="modal" data-target="#addMaterialModal">Pesquisar</button></a>
  </div>
<br>
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col" width="90%">Anexo</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">anexo.pdf</th>
        <td><a href="" title="Vizualizar Anexo"><button type="button" class="btn btn-secundary" data-toggle="modal" data-target="#visulReagenteModal">Visualizar</button></a></td>
      </tr>
    </tbody>
  </table>

</div>

<?php include"footer.php"; ?>