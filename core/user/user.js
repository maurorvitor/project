
 $(document).ready(function(){
	$('#dbguser').DataTable({
        "ajax": "core/user/user_insert.php?action=list",
        "columns": [
			{
                "className":      'btngrid',
                "orderable":      false,
                "data":           null,
                "defaultContent": '<span class="glyphicon glyphicon-search" aria-hidden="true"></span>'
            },
			{
                "className":      'btngrid',
                "orderable":      false,
                "data":           null,
                "defaultContent": '<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>'
            },
			{
                "className":      'btngrid',
                "orderable":      false,
                "data":           null,
                "defaultContent": '<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>'
            },			
            { "data": "nome" },
            { "data": "email" },
            { "data": "login" },
            { "data": "dtcriacao" }
        ],	
		"paging":   true,
		"ordering": true,
		"info":     true,
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

	// $('#dbguser > tbody').on( 'click', 'tr td', function () {
	// console.log(table.row(table.row(this).index()).data());		
	// console.log(table.column(table.row(this).index()).data().iduser);
	// console.log(table.column( 'email:name' ).data());
	// console.log($(this));		
	// } );
	
	$('#dbguser tbody').on( 'click', 'td', function () {
		//console.log(table.column($(this).index()).data());
		//console.log($(this).index());
		//console.log(table.column($(this).index()).data());		
		//console.log($('#dbguser > tbody > tr'));	
		var col = $(this).parent().children().index($(this));
		var row = $(this).parent().parent().children().index($(this).parent());
        console.log('Row: ' + row + ', Column: ' + col);
		var table = $('#dbguser').DataTable();
		console.log(table.row(table.row(row)).data().iduser);	
		$('#myModal').modal('show');	
	} );	
  
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
