<?php
	session_start();
	include"header.php"; 
	include 'conexao.php'; 
	if (isset($_SESSION['user'])) {
?>
<script type="text/javascript">
            //método que garante que o JQuery é executado somente após o documento ser carregado
            $('document').ready(function() {
                    $('#qtd_Mat').keyup(function() {
                        $.post('cont_mat.php', {busca1: $('#id_Mat').val(),busca2: $('#qtd_Mat').val()},
                        function(data) {
                            $('#conteudopesquisa').show();
                            $('#conteudopesquisa').empty().html(data);
                        }
                        );
                    });
                });
             
            
        </script>
	<div id="portal-column-content" class="cell width-3:4 position-1:4">
	  <a name="acontent" id="acontent" class="anchor">conteúdo</a>
	  <p><center><h2>Gestão do Estoque de Materiais</h2></center><br></p>
	  <form class="form-horizontal" action="gM.php" method="post" enctype="multipart/form-data">
			<fieldset>

			<div class="form-group">
			  <label class="col-md-4 control-label" for="id_Mat">Material</label>  
			  <div class="col-md-5" id="busca1">
				  <select id="id_Mat" name="id_Mat" class="form-control">
	            	<?php
	              //$email = $_SESSION['user'];
	          		    $sql = "SELECT id_Mat FROM lab.Estoquemat";
						$result = mysqli_query($conn, $sql);    

	          		    ?>
	          		    <option value="" disabled selected>Selecione</option>
	          		    <?php
	          		    
	          		    while($exibir = mysqli_fetch_assoc($result)){
	          		    	$id = $exibir['id_Mat'];
	          		    	$sql2 = "SELECT desc_Mat FROM lab.material WHERE id_Mat ='$id'";
                            $result2 = mysqli_query($conn, $sql2);    
							$exibir2 = mysqli_fetch_assoc($result2);
	          		    	$ponto = " - ";
	          		    	?>

	          		      <option value="<?php echo $exibir['id_Mat'];?>"><?php echo $exibir['id_Mat'],$ponto,$exibir2['desc_Mat']; ?></option>
	          		     <?php 
	          		     } ?>
	              </select>
			    
			  </div>
			</div>

			<div class="form-group">
			  <label class="col-md-4 control-label" for="qtd_Mat">Quantidade</label>  
			  <div class="col-md-5" id="busca2">
			  <input id="qtd_Mat" name="qtd_Mat" type="text" placeholder="Quantidade" class="form-control input-md" required="">
			    
			  </div>
			</div>

			<div   id="conteudopesquisa" ></div>
			<div class="form-group">
				<?php
			       if (isset($_SESSION['erro'])) {
			          if ($_SESSION['erro']=="ERRO") {
			        ?>
			          <div id="erro" class="alert alert-warning" role="alert">Falha na alteração do estoque!</div>
			        <?php
			          }
			          else if ($_SESSION['erro']=="OK"){
			        ?>
			          <div id="erro" class="alert alert-success" role="alert"> Estoque alterado com sucesso!</div>
			        <?php
			        }
			      $_SESSION['erro']="TESTE";
			      }
			      ?>
			</div>
		</form>
	</div>
    <script type="text/javascript">
        setTimeout(function() {
            $("#erro").fadeOut().empty();
        }, 6000);
  	</script>
<?php
    } else { //CASO NÃO ESTEJA AUTENTICADO
        echo '<div class="alert alert-warning" style="text-align:center;">Esta é uma área reservada, só usuários autorizados podem ter acesso. 
            <br/><a href="Index.php">Se identifique aqui</a></div>';
    }
?>
<?php include"footer.php"; ?>