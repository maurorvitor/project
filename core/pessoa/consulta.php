<script type="text/javascript">
 $(document).ready(function(){
	var table = $('#dbguser').DataTable({
        "ajax": "core/pessoa/db.php?action=list&table=teste",
		dom: 'Bfrtip',
		rowId: 'codigo',
		//stateSave: true,
		
        select: {
            style:    'os,multi',
            selector: 'td:first-child'
        },
        order: [[ 1, 'asc' ]],	
		
        buttons: [
			{
                extend:    'selectAll',
                text:      '<span class="glyphicon glyphicon-check" aria-hidden="true"></span>',
            },
			{
                extend:    'selectNone',
                text:      '<span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span>',
            },			           
			{
                text: '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>',
				titleAttr: 'Novo',
                action: function ( e, dt, node, config ) {
                    window.location.replace("index.php?page=userc");
					//console.log(table.rows({ selected: true }).ids());
                }
            },		
			{
				extend: 'colvis',
				text: '<span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>',
				columns: '1,2'	
			},
			{
                text: '<span class="glyphicon glyphicon-filter" aria-hidden="true"></span>',
                action: function ( e, dt, node, config ) {
                    $('#filtromodal').modal('show');
                }
            },			
            {
                extend:    'copyHtml5',
                text:      '<span class="glyphicon glyphicon-copy" aria-hidden="true"></span>',
                titleAttr: 'Copiar',
				exportOptions: {
                    columns: '1,2'
                }
            },
            {
                extend:    'excelHtml5',
                text:      '<span class="glyphicon glyphicon-th" aria-hidden="true"></span>',
                titleAttr: 'Excel',
				exportOptions: {
                    columns: '1,2'
                }
            },
            {
                extend:    'pdfHtml5',
                text:      '<span class="glyphicon glyphicon-file" aria-hidden="true"></span>',
                titleAttr: 'PDF',
				exportOptions: {
                    columns: '0,1'
                }
            },
            {
                extend:    'print',
                text:      '<span class="glyphicon glyphicon-print" aria-hidden="true"></span>',
                titleAttr: 'Imprimir',
				exportOptions: {
                    columns: '1,2'
                }				
            }						
        ],		
        "columns": [				
			{
                "className":      'select-checkbox',
                "orderable":      false,
                "data":           null,
				"width": "5%",
                "defaultContent": ''
            },	
            { "data": "codigo" },
            { "data": "descricao" },
			{
                "className":      'btngrid',
                "orderable":      false,
                "data":           null,
				"width": "5%",
                "defaultContent": '<span class="glyphicon glyphicon-search" aria-hidden="true"></span>'
            },
			{
                "className":      'btngrid',
                "orderable":      false,
                "data":           null,
				"width": "5%",
                "defaultContent": '<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>'
            },
			{
                "className":      'btngrid',
                "orderable":      false,
                "data":           null,
				"width": "5%",
                "defaultContent": '<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>'
            },
			{
                "className":      'btngrid',
                "orderable":      false,
                "data":           null,
				"width": "5%",
                "defaultContent": '<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>'
            },	
			{
                "className":      'btngrid',
                "orderable":      false,
                "data":           null,
				"width": "5%",
                "defaultContent": '<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>'
            }
        ],	
		"scrollY": "200px",
		"scrollCollapse": true,
		"paging": false,
		//"paging":   true,
		"ordering": true,
		"info":     true,
		"retrieve": true,
		"pageLength": 100,
		"lengthChange": false,
		language: {
				processing:     "Processando...",
				search:         "Buscar&nbsp;:",
				lengthMenu:     "Mostrar _MENU_ registros por página",
				info:           "Página _PAGE_ de _PAGES_",
				infoEmpty:      "Sem registros",
				infoFiltered:   "(Filtrados de _MAX_ registros)",
				infoPostFix:    "",
				loadingRecords: "Carregando...",
				zeroRecords:    "Nenhum Registro Encontrado",
				emptyTable:     "Tabela Vazia",
				paginate: {
					first:      "Primeiro",
					previous:   "Anterior",
					next:       "Próximo",
					last:       "Ultimo"
				},
				select: {
					rows: {
						_: "%d linhas selecionadas",
						0: "Clique na linha para selecionar",
						1: "Somente 1 linha selecionada"
					}				
				}
		}
	});
	
	// $('#dbguser tbody').on('click', 'td', function () {
		// var col = $(this).index();
		// var iduser = $(this).parent().attr('id');
		
		// var urluser = '';
		// if (col == 0){
			// urluser = 'core/user/user_view.php?page=view&id='+iduser;
		// }else
		// if (col == 1){
			// urluser = 'core/user/user_view.php?page=edt&id='+iduser;
		// }else
		// if (col == 2){
			// urluser = 'core/user/user_view.php?page=del&id='+iduser;
		// }else
		// if (col == 3){
			// urluser = 'core/user/user_view.php?page=per&id='+iduser;
		// }else{		
		  // return;
		// } 

		// $("#content-modal").load(urluser);
		// $('#myModal').modal('show');			
	// });	
	
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
	});	
	
 $("#demo_rules1").jui_filter_rules({
 
        bootstrap_version: "3",
 
        filters: [
            {
                filterName: "codigo", "filterType": "number", "numberType": "integer", field: "codigo", filterLabel: "Código",
                excluded_operators: ["in", "not_in"]
            },		
            {
                filterName: "descicao", "filterType": "text", field: "descricao", filterLabel: "Descrição",
                excluded_operators: ["in", "not_in"],
                filter_interface: [
                    {
                        filter_element: "input",
                        filter_element_attributes: {"type": "text"}
                    }
                ]
            }
        ], 
        onValidationError: function(event, data) {
            alert(data["err_description"] + ' (' + data["err_code"] + ')');
            if(data.hasOwnProperty("elem_filter")) {
                data.elem_filter.focus();
            }
        }, 
        onSetRules: function() {
            //show_modal($("#modal_dialog"), $("#modal_dialog_content"), "New rules have been applied.");
            return false;
        }
    });
	
	$('#btnconfirm').on('click', function () {		
		var a_rules = false, use_prepared_statements, pst_placeholder;
		
		a_rules = $("#demo_rules1").jui_filter_rules("getRules", 0, []);
		
		if(!a_rules) {
			alert("Erro no filtro...");
			return false;
		}else
		if(a_rules.length == 0) {
			alert("Filtro não definido...");
			return false;
		}else{
		
		
		$.ajax({
			type: 'POST',
			url: "filter/ajax_create_sql.dist.php",
			data: {
				a_rules: a_rules,
				use_ps: use_prepared_statements,
				pst_placeholder: pst_placeholder
			},
			dataType: "JSON",
			success: function(data) {
				if(data.hasOwnProperty("error")) {
					alert(data["error"]);
				}else{
					table.ajax.url('core/pessoa/db.php?action=list&table=teste&where='+data["sql"]).load();
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
	  <div class="modal-header"> Filtrar
		<button type="button" class="close" data-dismiss="modal">&times;</button>						
	  </div>	  
	  <div class="modal-body" id="content-modal">	
	  <div id="demo_rules1"></div>
	  </div>	  
	  <div class="modal-footer">
	    <button type="button" class="btn btn-success" data-dismiss="modal" id="btnconfirm">Aplicar</button>
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

