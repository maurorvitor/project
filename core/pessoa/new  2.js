var table = $('#gdbTeste').DataTable({
			ajax:'core/pessoa/db.php?action=list&table=teste',
			dom:'Bfrtip',
			rowId:'',
			stateSave:false,
			fixedColumns: {leftColumns: 0,rightColumns: 0},  
			buttons:[{extend:'colvis',text:'<span class='glyphicon glyphicon-tasks' aria-hidden='true'></span>',columns:{'1,2'}, ],
			columns:[{data:'codigo'},{data:'descricao'}],
			scrollY:'200px',
			scrollCollapse:true,
			paging:false,
			ordering:true,
			info:true,
			retrieve:false, 
			lengthChange:false,
			searching:true,
			language: {processing:'Processando...',search:'Buscar&nbsp;:',lengthMenu:'Mostrar _MENU_ registros por página',info:'Página _PAGE_ de _PAGES_',infoEmpty:'Sem registros',infoFiltered:'(Filtrados de _MAX_ registros)',infoPostFix:'',loadingRecords:'Carregando...',zeroRecords:'Nenhum Registro Encontrado',emptyTable:'Tabela Vazia',paginate: {first:'Primeiro',previous:'Anterior',next:'Próximo',last:'Ultimo'},select: {rows:{_: '%d linhas selecionadas', 0: 'Clique na linha para selecionar', 1: 'Somente 1 linha selecionada'}}}
		}); })