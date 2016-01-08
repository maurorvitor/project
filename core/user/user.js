
 $(document).ready(function(){
	var table = $('#dbguser').DataTable({
        "ajax": "core/user/user_db.php?action=list",
		dom: 'Bfrtip',
        buttons: [
            {
                extend:    'copyHtml5',
                text:      '<span class="glyphicon glyphicon-copy" aria-hidden="true"></span>',
                titleAttr: 'Copiar'
            },
            {
                extend:    'excelHtml5',
                text:      '<span class="glyphicon glyphicon-th" aria-hidden="true"></span>',
                titleAttr: 'Excel'
            },
            {
                extend:    'pdfHtml5',
                text:      '<span class="glyphicon glyphicon-file" aria-hidden="true"></span>',
                titleAttr: 'PDF'
            },
            {
                extend:    'print',
                text:      '<span class="glyphicon glyphicon-print" aria-hidden="true"></span>',
                titleAttr: 'Imprimir'
            }			
        ],		
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
		"retrieve": true,
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
	
	$('#dbguser tbody').on('click', 'td', function () {
		var col = $(this).parent().children().index($(this));
		var row = $(this).parent().parent().children().index($(this).parent());
		var iduser = table.row(table.row(row)).data().iduser;
		var urluser = '';
		if (col == 0){
			urluser = 'core/user/user_view.php?page=view';
		}else
		if (col == 1){
			urluser = 'core/user/user_view.php?page=edt';
		}else
		if (col == 2){
			urluser = 'core/user/user_view.php?page=del';
		}else{
		  return;
		} 		
		$("#content-modal").load(urluser);
		
		$.getJSON('core/user/user_db.php?action=sel&id='+iduser, function(result){
			$.each(result, function(i, field){				
				$("#"+i).val(field);
			});
		});	
		$('#myModal').modal('show');	
		//console.log(iduser);
        $("#iduser").val(iduser);		
		
	});	
	
	$('#frmuser').validator().on('submit', function (e) {
		validou = e.isDefaultPrevented();  
		e.preventDefault();        
		if (validou != true) { 		
			$.ajax({
			  type: 'POST',
			  dataType: 'json', 
			  async: false,
			  url: 'core/user/user_db.php?action=insert',
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

	$('#btnEdit').on('click', function () {	
        //console.log($("#iduser").val());	
		$.ajax({
			type: 'POST',
			dataType: 'json', 
			async: false,
			url: 'core/user/user_db.php?action=edt&id='+$("#iduser").val(),
			data: $('#frmuser').serialize(),
			success: function (response) {
				if (response.success == true){	
					$("#alertsucess").append("Registro alterado com sucesso!");
					$('#alertsucess').show();
				}else{
					$("#alerterror").append("Erro ao alterar registro!");
					$('#alerterror').show();  
				}
			}
		});			
	}); 

});
