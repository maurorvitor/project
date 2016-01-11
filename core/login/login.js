 $(document).ready(function(){
    //$('#frmlogin').validator();
	
    $('#btnLogin').on('click', function () {	
	//$('#frmlogin').validator().on('submit', function (e) {
	    
		var validou = $('.has-error').length;
		console.log(validou);
		//e.preventDefault();        
		if (validou == 0) { 	
			$.ajax({
				type: 'POST',
				dataType: 'json', 
				async: false,
				url: 'core/login/logar.php',
				data: $('#frmlogin').serialize(),
				success: function (response) {	
					//console.log(response.success);				
					if (response.success == true){	
						$("#alertsucess > span").html(response.mensage);
						$('#alertsucess').show();
						window.location.replace("index.php");
					}else{
						$("#alerterror > span").html(response.mensage);
						$('#alerterror').show();  
					}
					$('#frmlogin').trigger("reset");
				},
				error: function(response) {
					//console.log(response);
					error('Retorno Invalido'); 
					$('#frmlogin').trigger("reset");		
				}
			});
		}	    
	});
});
