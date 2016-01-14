<script type="text/javascript">
 $(document).ready(function(){
    var id = $("#iduser").val();
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
</script>

<div class="panel panel-default">
	<div class="panel-heading"><h4>Permissões do Usuário</h4></div>
	<div class="panel-body">	
	<table id="dbgperm" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
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

