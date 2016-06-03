$(document).ready(function(){  
		var table = $('#gdbTeste').DataTable({
			ajax:'core/pessoa/query.php?action=list&table=teste',dom:'Bfrtip',rowId:'codigo',stateSave:false,fixedColumns: {leftColumns: 0,rightColumns: 0},  buttons:[ ],columns:[{data:'codigo'},{data:'descricao'},{data:'sexo'},{data:'estado'},{data:'concorda'},{data:'data'},{data:'hora'}],scrollY:'200px,'
			scrollCollapse:true,
			paging:false,
			ordering:true,
			info:false,
			retrieve:false, 
			lengthChange:false,
			searching:false,
			language: {processing:'Processando...',search:'Buscar&nbsp;:',lengthMenu:'Mostrar _MENU_ registros por página',info:'Página _PAGE_ de _PAGES_',infoEmpty:'Sem registros',infoFiltered:'(Filtrados de _MAX_ registros)',infoPostFix:'',loadingRecords:'Carregando...',zeroRecords:'Nenhum Registro Encontrado',emptyTable:'Tabela Vazia',paginate: {first:'Primeiro',previous:'Anterior',next:'Próximo',last:'Ultimo'},select: {rows:{_: '%d linhas selecionadas', 0: 'Clique na linha para selecionar', 1: 'Somente 1 linha selecionada'}}}
		}); });