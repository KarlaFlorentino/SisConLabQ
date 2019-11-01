<script>
	$(document).ready(function(){
		$('#insert_form_M').on('submit', function(event){
			event.preventDefault();
			//Receber os dados do formulário
			var dados = $("#insert_form_M").serialize();

            $.post("cadastrarM.php", dados, function (retorna){
				if(retorna){
					//Alerta sucesso
					$("#msg").html('<div class="alert alert-success" role="alert">Material cadastrado com sucesso!</div>');

				}else{
					//Alerta falha 
                    $("#msg").html('<div class="alert alert-warning" role="alert">Falha no cadastro do Material!</div>');
                    
				}	
				
				//Limpar os campos
				$('#insert_form_M')[0].reset();
							
				//Fechar a janela 
				$('#addMaterialModal').modal('hide');

				setTimeout(function() {
					$("#msg").fadeOut().empty();
				}, 5000);
			});
		});
	});


	

</script>