 $(document).ready(function(){
  
  $('#frmuser').validate({
    rules: {
      confirmar_senha: {        
        equalTo: "#senha"
      }
    },
    messages: {      
      confirmar_senha: {        
        equalTo: "O campo confirmação de senha deve ser identico ao campo senha."
      }
    }
  });  

  $('#frmuser').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      type: 'post',
      url: 'core/user/user_actions.php',
      data: $('#frmuser').serialize(),
      success: function () {
        $('#alertsucess').show();
        $('#frmuser').trigger("reset");
      },
      error: function() {
        $('#alerterror').show();  
      }
    });
  });





});