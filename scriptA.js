<script>
	$(document).ready(function(){
		$('#insert_form_A').on('submit', function(event){
			event.preventDefault();
			//Receber os dados do formulário
			var dados = $("#insert_form_A").serialize();

            $.post("cadastrarA.php", dados, function (retorna){
				if(retorna){
					alert(retorna);
					//Alerta sucesso
					$("#msg").html('<div class="alert alert-success" role="alert">Agendamento realizado com sucesso!</div>');						
					//Limpar os campos
					$('#insert_form_A')[0].reset();
							
					//Fechar a janela 
					$('#addAgendaModal').modal('hide');
				}else{
					//Alerta falha 
                    $("#msg").html('<div class="alert alert-warning" role="alert">Falha no Agendamento!</div>');
				}
						
			});
		});
	});
</script>