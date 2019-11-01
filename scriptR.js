<script>
  $(document).ready(function(){
     $('#insert_form_R').on('submit', function(event){
      event.preventDefault();
      //Receber os dados do formulário
      var dados = $("#insert_form_R").serialize();
      $.post("cadastrarR.php", dados, function (retorna){
        if(retorna){
          //Alerta sucesso
          $("#msg").html('<div class="alert alert-success" role="alert">Risco cadastrado com sucesso!</div>');
                
        }else{
            //Alerta falha 
            $("#msg").html('<div class="alert alert-warning" role="alert">Falha no cadastro do Risco!</div>');
        }   

        //Limpar os campos
        $('#insert_form_R')[0].reset();
                
        //Fechar a janela 
        $('#addRiscoModal').modal('hide');

        setTimeout(function() {
          $("#msg").fadeOut().empty();
        }, 5000);
      });
    });   
  });
</script>