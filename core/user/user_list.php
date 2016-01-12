<script type="text/javascript">
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
		// $.getJSON('core/user/user_db.php?action=sel&id='+iduser, function(result){
			// $.each(result, function(i, field){				
				// $("#"+i).val(field);
			// });
		// });	
	});	
	
	$("#myModal").on('hidden.bs.modal', function () {
			table.ajax.reload();
    });
});
</script>

<div class="panel panel-default">
	<div class="panel-heading"><h4>Consulta de Usuários</h4></div>
	<div class="panel-body">	
	<table id="dbguser" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
			    <th></th>
				<th></th>
				<th></th>
				<th>Nome</th>
				<th>Email</th>
				<th>Login</th>
				<th>Data Cadastro</th>
			</tr>
		</thead>
	</table>				
	</div>
</div>

