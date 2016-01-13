<script type="text/javascript">
 $(document).ready(function(){
	var table = $('#dbgperm').DataTable({
        "ajax": "core/user/user_db.php?action=perm&id=83",	
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
		"retrieve": false,
		"scrollY": "200px",
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
	
	$('#btnPerm').click( function() {
		var data = table.$('input').serialize();
		console.log(data.substr( 0, 120 ));
		return false;
	});	
});
</script>

<div class="panel panel-default">
	<div class="panel-heading"><h4>Consulta de Usuários</h4></div>
	<div class="panel-body">	
	<table id="dbgperm" class="table table-hover table-striped table-bordered" cellspacing="1" width="100%">
		<thead>
			<tr>
				<th>Tela</th>
				<th>Inserir</th>
				<th>Alterar</th>
				<th>Apagar</th>
				<th>Visualizar</th>
			</tr>
		</thead>
	</table>				
	</div>
</div>

