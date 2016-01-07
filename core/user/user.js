
 $(document).ready(function(){
	$('#dbguser').DataTable({
        "ajax": "core/user/user_insert.php?action=list",
        "columns": [
            { "data": "nome" },
            { "data": "email" },
            { "data": "login" },
            { "data": "dtcriacao" }
        ],	
		"paging":   true,
		"ordering": true,
		"info":     false,
		"pageLength": 5,
		"lengthChange": false,
			"language": {
			"lengthMenu": "Mostrar _MENU_ registros por página",
			"zeroRecords": "Zero registro encontrado",
			"info": "Página _PAGE_ de _PAGES_",
			"Previous": "Anterior",
			"infoEmpty": "Nenhum Registro Encontrado",
			"infoFiltered": "(Filtrados de _MAX_ registros)"}							
	});
  
  $('#frmuser').validator().on('submit', function (e) {
    validou = e.isDefaultPrevented();  
    e.preventDefault();        
    if (validou != true) { 		
		$.ajax({
		  type: 'POST',
		  dataType: 'json', 
		  async: true,
		  url: 'core/user/user_insert.php?action=insert',
		  data: $('#frmuser').serialize(),
		  success: function (response) {			
			if (response.success == true){	
				$("#alertsucess").append("Registro inserido com sucesso!");
				$('#alertsucess').show();
			}else{
				$("#alerterror").append("Erro ao inserir registro!");
				$('#alerterror').show();  
			}
			$('#frmuser').trigger("reset");
		  },
		  error: function(response) {
			$("#alerterror").append("Erro ao inserir registro!");
			$('#alerterror').show();  
			$('#frmuser').trigger("reset");		
		  }
		});
	}
  });

});
