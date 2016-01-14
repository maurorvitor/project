$(document).ready(function(){
		
	var table = $('#dbguser').DataTable({
        "ajax": "core/user/user_db.php?action=list",
		dom: 'Bfrtip',
        buttons: [
			{
                text: '<a class="btn btn-success" href="#" role="button">Novo</a>',
				titleAttr: 'Novo',
                action: function ( e, dt, node, config ) {
                    window.location.replace("index.php?page=userc");
                }
            },		
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
			urluser = 'core/user/user_view.php?page=view&id='+iduser;
		}else
		if (col == 1){
			urluser = 'core/user/user_view.php?page=edt&id='+iduser;
		}else
		if (col == 2){
			urluser = 'core/user/user_view.php?page=del&id='+iduser;
		}else{
		  return;
		} 
		//console.log(iduser);
		$("#content-modal").load(urluser);
		$('#myModal').modal('show');			
	});	
	
	$("#myModal").on('hidden.bs.modal', function () {
			table.ajax.reload();
    });

	$("#myModal").on('shown.bs.modal', function () {
		var id = $("#iduser").val();
		$.getJSON('core/user/user_db.php?action=sel&id='+id, function(result){
			$.each(result, function(i, field){				
				$("#frmuser #"+i).val(field);
			});
		});	
		
		var tablep = $('#dbgperm').DataTable({
			"ajax": "core/user/user_db.php?action=perm&id="+id,	
			dom: 'Bfrtip',
			buttons: [
				{
					text: '<a class="btn btn-primary" href="#" role="button" id="btnPerm">Salvar</a>',
					titleAttr: 'Salvar'
				}],		
			"columns": [		
				{ "data": "descricao" },
				{ "data": "inserir" },
				{ "data": "alterar" },
				{ "data": "apagar" },
				{ "data": "visualizar" }
			],	
			 "paging":   false,
			 "ordering": false,
			 "info":     false,
			 //"retrieve": false,
			// "scrollY": "200px",
			 //"pageLength": 5,
			 //  "lengthChange": true,
				"language": {
				"lengthMenu": "Mostrar _MENU_ registros por página",
				"zeroRecords": "Zero registro encontrado",
				"info": "Página _PAGE_ de _PAGES_",
				"Previous": "Anterior",
				"infoEmpty": "Nenhum Registro Encontrado",
				"infoFiltered": "(Filtrados de _MAX_ registros)"}							
		});
		
		$('#btnPerm').click( function() {
			var dadosp = tablep.$('input').serialize();
			//var id = 83;
			//console.log(dados);
			$.ajax({
				type: 'POST',
				dataType: 'json', 
				async: false,
				url: 'core/user/user_db.php?action=updperm&id='+id,
				data: dadosp,
				success: function () {
					mensagem('Permissão Salva!');
				},
				error: function () {
					error('Erro ao Salvar Permissão!');
				}
			});		
			return false;
		});	
	});	
	
	// var tablep = $('#dbgperm').DataTable({
		// "ajax": "core/user/user_db.php?action=perm&id="+id,	
		// dom: 'Bfrtip',
		// buttons: [
			// {
				// text: '<a class="btn btn-primary" href="#" role="button" id="btnPerm">Salvar</a>',
				// titleAttr: 'Salvar'
			// }],		
		// "columns": [		
			// { "data": "descricao" },
			// { "data": "inserir" },
			// { "data": "alterar" },
			// { "data": "apagar" },
			// { "data": "visualizar" }
		// ],	
		// "paging":   false,
		// "ordering": false,
		// "info":     false,
		// "retrieve": false,
		// "scrollY": "200px",
		// "pageLength": 5,
		// "lengthChange": false,
			// "language": {
			// "lengthMenu": "Mostrar _MENU_ registros por página",
			// "zeroRecords": "Zero registro encontrado",
			// "info": "Página _PAGE_ de _PAGES_",
			// "Previous": "Anterior",
			// "infoEmpty": "Nenhum Registro Encontrado",
			// "infoFiltered": "(Filtrados de _MAX_ registros)"}							
	// });
	
	// $('#btnPerm').click( function() {
		// var dadosp = tablep.$('input').serialize();
		// //var id = 83;
		// //console.log(dados);
		// $.ajax({
			// type: 'POST',
			// dataType: 'json', 
			// async: false,
			// url: 'core/user/user_db.php?action=updperm&id='+id,
			// data: dadosp,
			// success: function () {
				// mensagem('Permissão Salva!');
			// },
			// error: function () {
				// error('Erro ao Salvar Permissão!');
			// }
		// });		
		// return false;
	// });		
	
	// $.getJSON('core/user/user_db.php?action=sel&id='+id, function(result){
		// $.each(result, function(i, field){				
			// $("#frmuser #"+i).val(field);
		// });
	// });	
	
	$('#btnEdit').on('click', function () {	
		$('#frmuser').validator('validate');
		if ($('.has-error').length == 0){
			var formData = new FormData($('#frmuser')[0]);
			$.ajax({
				type: 'POST',
				dataType: 'json', 
				async: false,
				url: 'core/user/user_db.php?action=edt&id='+id,
				data: formData,
				processData: false,  
				contentType: false,				
				success: function (response) {			
					mensagem(response);					
				}
			});				
		}	
	}); 
	
	$('#btnDelete').on('click', function () {	
		$.ajax({
			type: 'POST',
			dataType: 'json', 
			async: false,
			url: 'core/user/user_db.php?action=del&id='+id,
			success: function (response) {
				mensagem(response);
			}			
		});	
	});				
});
