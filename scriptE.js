<script>
	$(document).ready(function(){
		$('#insert_form_E').on('submit', function(event){
			event.preventDefault();
			//Receber os dados do formulário
			var dados = $("#insert_form_E").serialize();

            $.post("cadastrarE.php", dados, function (retorna){
				if(retorna){
					//Alerta sucesso
					$("#msg").html('<div class="alert alert-success" role="alert">Equipamento cadastrado com sucesso!</div>');						

				}else{
					//Alerta falha  
                    $("#msg").html('<div class="alert alert-warning" role="alert">Falha no cadastro do Equipamento!</div>');
				}
				
				//Limpar os campos
				$('#insert_form_E')[0].reset();
							
				//Fechar a janela 
				$('#addEquipamentoModal').modal('hide');

				setTimeout(function() {
					$("#msg").fadeOut().empty();
				}, 5000);

			});
			$.post("tableEquipamentos.php",1,function(valor) {
                        $("#tabela").html(valor);
                    });
		});
	});
</script>