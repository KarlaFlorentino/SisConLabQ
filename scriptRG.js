<script>
$(document).ready(function(){
    $('#insert_form_RG').on('submit', function(event){
      event.preventDefault();
      //Receber os dados do formulário
      var dados = $("#insert_form_RG").serialize();
      
      $.post("cadastrarRG.php", dados, function (retorna){

        if(retorna){
          
          //Alerta sucesso
          $("#msg2").html('<div class="alert alert-success" role="alert">Reagente cadastrado com sucesso!</div>');
                
        }else{
            //Alerta falha 
            $("#msg2").html('<div class="alert alert-warning" role="alert">Falha no cadastro do Reagente!</div>');
        }

        //Limpar os campos
        $('#insert_form_RG')[0].reset();
              
        //Fechar a janela 
        $('#addReagenteModal').modal('hide');

        setTimeout(function() {
          $("#msg2").fadeOut().empty();
        }, 5000);   
      });
    });
  });
</script>