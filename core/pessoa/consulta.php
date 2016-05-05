<script type="text/javascript">
 $(document).ready(function(){
	var table = $('#dbguser').DataTable({
        ajax:'core/pessoa/db.php?action=list&table=teste',
		dom:'Bfrtip',
		rowId:'codigo',
		stateSave: true,
		fixedColumns: {leftColumns: 1,rightColumns: 5},
        select: {style:'os,multi',selector:'td:first-child'},
        order:[[ 1,'asc']],			
        buttons: 
			[{extend:'selectAll',
            text:'<span class="glyphicon glyphicon-check" aria-hidden="true"></span>'},
			{extend:'selectNone',
            text:'<span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span>'},	
			
			{text:'<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>',
			titleAttr:'Novo',
            action:function ( e, dt, node, config ) {
				window.location.replace("core/pessoa/layout.php?type=insert");
            }},		
			
			{extend:'colvis',
			text:'<span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>',
			columns:'1,2'},
			
			{text: '<span class="glyphicon glyphicon-filter" aria-hidden="true"></span>',
            action: function ( e, dt, node, config ) {
				$('#filtromodal').modal('show');
            }},			
            {extend:'copyHtml5',
            text:'<span class="glyphicon glyphicon-copy" aria-hidden="true"></span>',
            titleAttr:'Copiar',
			exportOptions:{columns:'1,2'}},
			
            {extend:'excelHtml5',
            text:'<span class="glyphicon glyphicon-th" aria-hidden="true"></span>',
            titleAttr:'Excel',
			exportOptions:{columns:'1,2'}},
			
            {extend:'pdfHtml5',
			text:'<span class="glyphicon glyphicon-file" aria-hidden="true"></span>',
            titleAttr:'PDF',
			exportOptions:{columns: '1,2'}},
			
            {extend:'print',
            text:'<span class="glyphicon glyphicon-print" aria-hidden="true"></span>',
            titleAttr:'Imprimir',
			exportOptions: {columns: '1,2'}}],		
        columns: [				
			{className:'select-checkbox',orderable:false,data:null,width: '5%',defaultContent: ''},	
            {data:'codigo'},
            {data:'descricao'},
			{className:'btngrid',orderable:false,data:null,width:'5%',
				defaultContent:'<span class="glyphicon glyphicon-search" aria-hidden="true"></span>'},
			{className:'btngrid',orderable:false,data:null,width:'5%',
				defaultContent:'<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>'},
			{className:'btngrid',orderable:false,data:null,width:'5%',
                defaultContent:'<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>'},
			{className:'btngrid',orderable:false,data:null,width:'5%',
                defaultContent:'<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>'},	
			{className:'btngrid',orderable:false,data: null,width:'5%',
                defaultContent:'<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>'}],	
		scrollY:'200px',
		scrollCollapse:true,
		paging:false,
		ordering:true,
		info:true,
		retrieve:false,
		pageLength:100,
		lengthChange:false,
		searching:false,
		language: {
			processing:'Processando...',
			search:'Buscar&nbsp;:',
			lengthMenu:'Mostrar _MENU_ registros por página',
			info:'Página _PAGE_ de _PAGES_',
			infoEmpty:'Sem registros',
			infoFiltered:'(Filtrados de _MAX_ registros)',
			infoPostFix:'',
			loadingRecords:'Carregando...',
			zeroRecords:'Nenhum Registro Encontrado',
			emptyTable:'Tabela Vazia',
			paginate: {first:'Primeiro',previous:'Anterior',next:'Próximo',last:'Ultimo'},
			select: {rows:{_: '%d linhas selecionadas', 0: 'Clique na linha para selecionar', 1: 'Somente 1 linha selecionada'}}
		}
	});
	
	$('#dbguser tbody').on('click', 'td', function () {
		var col = $(this).index();
		var iduser = table.row($(this).parent()).id();
		var urluser = '';
		if (col == 3){
			urluser = 'core/pessoa/layout.php?type=show&modal=false&cod='+iduser;
		}else
		if (col == 4){
			urluser = 'core/pessoa/layout.php?type=edit&modal=false&cod='+iduser;
		}else
		if (col == 5){
			urluser = 'core/pessoa/layout.php?type=delete&modal=false&cod='+iduser;
		}else{		
		  return;
		} 
		$('#content-modal').load(urluser);
		$('#myModal').modal('show');			
	 });	
	
	$("#myModal").on('hidden.bs.modal', function () {
		table.ajax.reload();
    });
	
	$('#demo_rules1').jui_filter_rules({ 
        bootstrap_version: '3', 
        filters: [
			{filterName: 'codigo', 'filterType': 'number', 'numberType': 'integer', field: 'codigo', filterLabel: 'Código',excluded_operators: ['in', 'not_in']},		
			{filterName: 'descicao', 'filterType': 'text', field: 'descricao', filterLabel: 'Descrição',excluded_operators: ['in', 'not_in']//,
				//filter_interface: [{filter_element: 'input',filter_element_attributes: {'type': 'text'}}]
			}]
    });
	
	$('#btnconfirm').on('click', function () {		
		var a_rules = false, use_prepared_statements, pst_placeholder;		
		a_rules = $('#demo_rules1').jui_filter_rules('getRules', 0, []);		
		if(!a_rules) {
			alert('Erro no filtro...');
			return false;
		}else
		if(a_rules.length == 0) {
			alert('Filtro não definido...');
			return false;
		}else{		
			$.ajax({
				type: 'POST',
				url: 'filter/ajax_create_sql.dist.php',
				data: {
					a_rules: a_rules,
					use_ps: use_prepared_statements,
					pst_placeholder: pst_placeholder
				},
				dataType: 'JSON',
				success: function(data) {
					if(data.hasOwnProperty('error')) {
						alert(data['error']);
					}else{
						table.ajax.url('core/pessoa/db.php?action=list&table=teste&where='+data['sql']).load();
					}
				}
			});				
		}
	});	
});
</script>
<div id="filtromodal" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog">
	<div class="modal-content">			
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>						
		<h4> Filtrar </h4>
	  </div>	  
	  <div class="modal-body" id="filtro-content">	
	  <div id="demo_rules1"></div>
	  </div>	  
	  <div class="modal-footer">
	    <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnconfirm">Aplicar</button>
		<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
	  </div>			  
	</div>
  </div>
</div>	

<div class="panel panel-primary">
	<div class="panel-heading"><h4>Consulta Teste</h4></div>
	<div class="panel-body">	
	<table id="dbguser" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
			    <th></th>			
				<th>Código</th>
				<th>Descricao</th>			
			    <th></th>
				<th></th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
		</thead>
	</table>				
	</div>
</div>

<?php

class Grid{
	private $titletable = '';
	private $idtable = 0;
	private $width = 0;
	private $ajax = '';
	private $rowid = '';
	private $statesave = false;
	private $fixedleft = 0;
	private $fixedright = 0;
	private $select = false;
	private $multiselect = false;
	private $buttonselect = false;
	private $pagenew = '';
	private $buttoncolvisible = false;
	private $buttonfilter = false;
	private $buttoncopy = false;
	private $buttonexcel = false;
	private $buttonpdf = false;
	private $buttonprint = false;
	private $recordshow = false;
	private $recordedit = false;
	private $recorddelete = false;
	private $paging = false;
	private $ordering = false;
	private $info = false;
	private $pageLength = 5;
	private $buttonsrecord = array();
	private $searching = false;
	
	
}

function table($title, $idtable, $width, $content){
	return
	"<div class='panel panel-primary'>
		<div class='panel-heading'><h4>$title</h4></div>
		<div class='panel-body'>	
		<table id='$id' class='table table-hover table-striped table-bordered' cellspacing='0' width='$width'>
			$content
		</table>				
		</div>
	</div>";
}

function modalfilter($idmodal, $title, $idfilter, $idconfirm){
	return
	"<div id='$idmodal' class='modal fade' role='dialog' aria-labelledby='myLargeModalLabel'>
	  <div class='modal-dialog'>
		<div class='modal-content'>			
		  <div class='modal-header'>
			<button type='button' class='close' data-dismiss='modal'>&times;</button>						
			<h4> $title </h4>
		  </div>	  
		  <div class='modal-body' >	
		  <div id='$idfilter'></div>
		  </div>	  
		  <div class='modal-footer'>
			<button type='button' class='btn btn-primary' data-dismiss='modal' id='$idconfirm'>Aplicar</button>
			<button type='button' class='btn btn-danger' data-dismiss='modal'>Fechar</button>
		  </div>			  
		</div>
	  </div>
	</div>"	;
}
	
	
?>