<script>
$(document).ready(function(){
    $('#insert_form_RG').on('submit', function(event){
      event.preventDefault();
      //Receber os dados do formulário
      var dados = $("#insert_form_RG").serialize();
      $.post("cadastrarRG.php", dados, function (retorna){

        if(retorna){
          $.post("tableReagentes.php",1,function(valor) {
            $("#tabela").html(valor);
          });
          //Alerta sucesso
          $("#msg").html('<div class="alert alert-success" role="alert">Reagente cadastrado com sucesso!</div>');
                
        }else{
            //Alerta falha 
            $("#msg").html('<div class="alert alert-warning" role="alert">Falha no cadastro do Reagente!</div>');
        }   

        //Limpar os campos
        $('#insert_form_RG')[0].reset();
                
        //Fechar a janela 
        $('#addReagenteModal').modal('hide');

        setTimeout(function() {
          $("#msg").fadeOut().empty();
        }, 5000);
      });
    });
  });
</script>