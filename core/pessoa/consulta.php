<script type="text/javascript">
 // $(document).ready(function(){
	// var table = $('#dbguser').DataTable({
        // ajax:'core/pessoa/db.php?action=list&table=teste',
		// dom:'Bfrtip',
		// rowId:'codigo',
		// stateSave: true,
		// fixedColumns: {leftColumns: 1,rightColumns: 5},
        // select: {style:'os,multi',selector:'td:first-child'},
        // order:[[ 1,'asc']],			
        // buttons: 
			// [{extend:'selectAll',
            // text:'<span class="glyphicon glyphicon-check" aria-hidden="true"></span>'},
			// {extend:'selectNone',
            // text:'<span class="glyphicon glyphicon-unchecked" aria-hidden="true"></span>'},	
			
			// {text:'<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>',
			// titleAttr:'Novo',
            // action:function ( e, dt, node, config ) {
				// window.location.replace("core/pessoa/layout.php?type=insert");
            // }},		
			
			// {extend:'colvis',
			// text:'<span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>',
			// columns:'1,2'},
			
			// {text: '<span class="glyphicon glyphicon-filter" aria-hidden="true"></span>',
            // action: function ( e, dt, node, config ) {
				// $('#filtromodal').modal('show');
            // }},				
            // {extend:'excelHtml5',
            // text:'<span class="glyphicon glyphicon-th" aria-hidden="true"></span>',
            // titleAttr:'Excel',
			// exportOptions:{columns:'1,2'}},
			
            // {extend:'pdfHtml5',
			// text:'<span class="glyphicon glyphicon-file" aria-hidden="true"></span>',
            // titleAttr:'PDF',
			// exportOptions:{columns: '1,2'}},
			
            // {extend:'print',
            // text:'<span class="glyphicon glyphicon-print" aria-hidden="true"></span>',
            // titleAttr:'Imprimir',
			// exportOptions: {columns: '1,2'}}],		
        // columns: [				
			// {className:'select-checkbox',orderable:false,data:null,width: '5%',defaultContent: ''},	
            // {data:'codigo'},
            // {data:'descricao'},
			// {className:'btngrid',orderable:false,data:null,width:'5%',
				// defaultContent:'<span class="glyphicon glyphicon-search" aria-hidden="true"></span>'},
			// {className:'btngrid',orderable:false,data:null,width:'5%',
				// defaultContent:'<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>'},
			// {className:'btngrid',orderable:false,data:null,width:'5%',
                // defaultContent:'<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>'},
			// {className:'btngrid',orderable:false,data:null,width:'5%',
                // defaultContent:'<span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>'},	
			// {className:'btngrid',orderable:false,data: null,width:'5%',
                // defaultContent:'<span class="glyphicon glyphicon-lock" aria-hidden="true"></span>'}],	
		// scrollY:'200px',
		// scrollCollapse:true,
		// paging:false,
		// ordering:true,
		// info:true,
		// retrieve:false,
		// pageLength:100,
		// lengthChange:false,
		// searching:false,
		// language: {
			// processing:'Processando...',
			// search:'Buscar&nbsp;:',
			// lengthMenu:'Mostrar _MENU_ registros por página',
			// info:'Página _PAGE_ de _PAGES_',
			// infoEmpty:'Sem registros',
			// infoFiltered:'(Filtrados de _MAX_ registros)',
			// infoPostFix:'',
			// loadingRecords:'Carregando...',
			// zeroRecords:'Nenhum Registro Encontrado',
			// emptyTable:'Tabela Vazia',
			// paginate: {first:'Primeiro',previous:'Anterior',next:'Próximo',last:'Ultimo'},
			// select: {rows:{_: '%d linhas selecionadas', 0: 'Clique na linha para selecionar', 1: 'Somente 1 linha selecionada'}}
		// }
	// });
	
	// $('#dbguser tbody').on('click', 'td', function () {
		// var col = $(this).index();var iduser = table.row($(this).parent()).id();var urluser = '';
		// if (col == 3){
			// urluser = 'core/pessoa/layout.php?type=show&modal=false&cod='+iduser;
		// }else
		// if (col == 4){
			// urluser = 'core/pessoa/layout.php?type=edit&modal=false&cod='+iduser;
		// }else
		// if (col == 5){
			// urluser = 'core/pessoa/layout.php?type=delete&modal=false&cod='+iduser;
		// }else{		
		  // return;
		// } 
		// //$('#content-modal').load(urluser);
		// $('#main').load(urluser);
		// //$('#myModal').modal('show');			
	 // });	
	
	// $("#myModal").on('hidden.bs.modal', function () {
		// table.ajax.reload();
    // });
	
	// $('#demo_rules1').jui_filter_rules({ 
        // bootstrap_version: '3', 
        // filters: [
			// {filterName: 'codigo', 'filterType': 'number', 'numberType': 'integer', field: 'codigo', filterLabel: 'Código',excluded_operators: ['in', 'not_in']},		
			// {filterName: 'descicao', 'filterType': 'text', field: 'descricao', filterLabel: 'Descrição',excluded_operators: ['in', 'not_in']//,
				// //filter_interface: [{filter_element: 'input',filter_element_attributes: {'type': 'text'}}]
			// }]
    // });
	
	// $('#btnconfirm').on('click', function () {		
		// var a_rules = false;		
		// a_rules = $('#demo_rules1').jui_filter_rules('getRules', 0, []);		
		// if(!a_rules) {alert('Erro no filtro...');return false;}else
		// if(a_rules.length == 0) {alert('Filtro não definido...');return false;
		// }else{		
			// $.ajax({
				// type: 'POST',
				// url: 'filter/ajax_create_sql.dist.php',
				// data: {a_rules: a_rules},
				// dataType: 'JSON',
				// success: function(data) {if(data.hasOwnProperty('error')) {alert(data['error']);}else{table.ajax.url('core/pessoa/db.php?action=list&table=teste&where='+data['sql']).load();}}
			// });}
	// });	
// });
</script>
<?php

// <div id="filtromodal" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel">
  // <div class="modal-dialog">
	// <div class="modal-content">			
	  // <div class="modal-header">
		// <button type="button" class="close" data-dismiss="modal">&times;</button>						
		// <h4> Filtrar </h4>
	  // </div>	  
	  // <div class="modal-body" id="filtro-content">	
	  // <div id="demo_rules1"></div>
	  // </div>	  
	  // <div class="modal-footer">
	    // <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnconfirm">Aplicar</button>
		// <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
	  // </div>			  
	// </div>
  // </div>
// </div>	

// <div class="panel panel-primary">
	// <div class="panel-heading"><h4>Consulta Teste</h4></div>
	// <div class="panel-body">	
	// <table id="dbguser" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
		// <thead>
			// <tr>
			    // <th></th>			
				// <th>Código</th>
				// <th>Descricao</th>			
			    // <th></th>
				// <th></th>
				// <th></th>
				// <th></th>
				// <th></th>
			// </tr>
		// </thead>
	// </table>				
	// </div>
// </div>


class Grid{
	private $titletable = '';
	private $idtable = '';
	private $width = '100%';
	private $ajax = '';
	private $rowid = '';
	private $statesave = false;
	private $fixedleft = 0;
	private $fixedright = 0;
	private $select = false;
	private $multiselect = false;
	private $newrecord = '';
	private $buttoncolvisible = false;
	private $buttonfilter = false;
	private $buttonexcel = false;
	private $buttonpdf = false;
	private $buttonprint = false;
	private $paging = false;
	private $ordering = false;
	private $info = false;
	private $pageLength = 5;
	private $buttonsrecord = array();
	private $data = array();
	private $filters = array();
	private $searching = false;
	private $close = false;
	private $idmodal = '';
	private $titlemodal = '';
	private $idfilter = '';
	private $idconfirmfilter = '';
	private $listcont = '';
	public $sql = '';
	
	function __construct($id, $ajax, $title){
		$this->idtable = $id;
		$this->ajax = $ajax;
		$this->titletable = $title;
	}
	public function setrowid($id){
		$this->rowid = $id;
	}	
	public function add_data($name, $title){
		$this->data[$name] = $title;
	}
	public function setoptions($select, $multi, $colvis, $save, $pdf, $excel, $print, $paging, $order, $info, $search){
		$this->select = $select;
		$this->multiselect = $multi;
		$this->buttoncolvisible = $colvis;
		$this->statesave = $save;
		$this->buttonpdf = $pdf;
		$this->buttonexcel = $excel;
		$this->buttonprint = $print;
		$this->paging = $paging;
		$this->ordering = $order;
		$this->info = $info;
		$this->searching = $search;
	}	
	public function newrecord($ajax){
		$this->newrecord = $ajax;
	}
	public function add_recordbtn($icon, $ajax){
		$this->buttonsrecord[$icon] = $ajax;
	}	
	
	public function createfilter($idmodal, $title, $idfilter, $idconfirm){
		$this->idmodal = $idmodal;
		$this->titlemodal = $title;
		$this->idfilter = $idfilter;
		$this->idconfirmfilter = $idconfirm;
		$this->buttonfilter = true;
	}	
	public function add_filter($name, $title, $type, $numbertype = ''){
	    $filter = null;
		$filter = new Filter($name, $title, $type, $numbertype);
		array_push($this->filters, $filter);
	}
	public function show(){
		$content = '';
		$content .= $this->get_jstable();
		$content .= $this->get_jsbuttons();
		$content .= $this->get_jsfilter();
		$content .= $this->get_jsconfirmfilter();
		$content  = jsready($content);
		if ($this->buttonfilter == true){
			$content .= modalfilter($this->idmodal, $this->titlemodal, $this->idfilter, $this->idconfirmfilter);
		}
		$content .= $this->get_table();
		return $content;
	}
	private function get_data(){
	    $data = '';
		foreach ($this->data as $key => $value) {
			$data .= "{data:'$key'},";
		}  
		return substr($data,0,-1);	
	}
	private function get_buttonsrecord(){
		$data = '';
		foreach ($this->buttonsrecord as $key => $value) {
			$data .= ",{className:'btngrid',orderable:false,data:null,width:'5%',defaultContent:'<span class=\"glyphicon glyphicon-$key\" aria-hidden=\"true\"></span>'}";
		}  
		return $data;	
	}
	
	private function get_jsfilter(){
		$data = '';
		foreach ($this->filters as $key => $value) {
			if($value->type == 'number'){	
				$data .= "{filterName: '$value->name', 'filterType': 'number', 'numberType': '$value->numbertype', field: '$value->name', filterLabel: '$value->title',excluded_operators: ['in', 'not_in']},";
			}
			if($value->type == 'text'){
				$data .= "{filterName: '$value->name', 'filterType': 'text', field: '$value->name', filterLabel: '$value->title',excluded_operators: ['in', 'not_in']},";
			}//outros tipos de filtro aqui			
		}
		if ($data!= ''){
			return "$('#$this->idfilter').jui_filter_rules({bootstrap_version:'3',filters:[".substr($data,0,-1)."]});";
		}else{
			return "";
		}
	}
	private function get_jsconfirmfilter(){
		if ($this->buttonfilter == true){
			return "			
			$('#$this->idconfirmfilter').on('click', function () {		
				var a_rules = false;		
				a_rules = $('#$this->idfilter').jui_filter_rules('getRules', 0, []);		
				if(!a_rules) {alert('Erro no filtro...');return false;}else
				if(a_rules.length == 0) {alert('Filtro não definido...');return false;
				}else{		
					$.ajax({
						type: 'POST',
						url: 'filter/ajax_create_sql.dist.php',
						data: {a_rules: a_rules},
						dataType: 'JSON',
						success: function(data) {if(data.hasOwnProperty('error')) {alert(data['error']);}else{table.ajax.url('$this->ajax&where='+data['sql']).load();}}
					});}
			});";
		}else{
			return "";
		}
	}
	private function get_jsbuttons(){
		$countrow = 0; 
		if($this->select == true){
			$countrow = count($this->data);
		}else{
			$countrow = count($this->data)-1;
		}	
		$data = '';
		foreach ($this->buttonsrecord as $key => $value) {
			$data .= " if(col == ".++$countrow."){urluser = '$value&close=".($this->close?"false":"true")."&cod='+iduser;} else ";
		} 
		if ($data != ''){
			return 	" 			
			$('#$this->idtable tbody').on('click','td',function(){			    
				var col = $(this).index();var iduser = table.row($(this).parent()).id();var urluser = '';				
				".$data."{return;} 
				".($this->close?"$('#content-modal').load(urluser); $('#myModal').modal('show');":"$('#main').load(urluser);")."});	".
				($this->close?"$('#myModal').on('hidden.bs.modal',function(){table.ajax.reload();});":"");	
		}else{
			return '';
		}
	}
	private function get_table(){
		$data = '';
		$data = "<thead><tr>";
		if($this->select == true){
			$data .= "<th></th>";
		}
		foreach ($this->data as $key => $value) {
			$data .= "<th>$value</th>";
		} 		
		foreach ($this->buttonsrecord as $key => $value) {
			$data .= "<th></th>";
		} 
		$data .= "</tr></thead>";
		return table($this->titletable, $this->idtable, $this->width, $data);
	}
	private function listindex(){
		$itens = array();
		
		if($this->select == true){
			$itens = range(1,count($this->data));
		}else{
			$itens = range(0,count($this->data)-1);
		}		
		return implode(",", $itens);
	}	
	private function get_jstable(){
	return " 
		var table = $('#$this->idtable').DataTable({
			ajax:'$this->ajax',dom:'Bfrtip',rowId:'$this->rowid',stateSave:".
			($this->statesave?"true":"false").",fixedColumns: {leftColumns: $this->fixedleft,rightColumns: $this->fixedright},".
			($this->select?"select:{style:'os".($this->multiselect?",multi'":"'").",selector:'td:first-child'},":" ").			
			($this->select?"order:[[ 1,'asc']],":" ").
			"buttons:[".
			($this->multiselect?"{extend:'selectAll',text:'<span class=\"glyphicon glyphicon-check\" aria-hidden=\"true\"></span>'},{extend:'selectNone',text:'<span class=\"glyphicon glyphicon-unchecked\" aria-hidden=\"true\"></span>'},":"").
			(($this->newrecord!='')?"{text:'<span class=\"glyphicon glyphicon-plus\" aria-hidden=\"true\"></span>',
			titleAttr:'Novo',
			action:function ( e, dt, node, config ) {
				".($this->close?"$('#content-modal').load('$this->newrecord&close=".($this->close?"false":"true")."'); 
				$('#myModal').modal('show');":"$('#main').load('$this->newrecord&close=".($this->close?"false":"true")."');").
				($this->close?"$('#myModal').on('hidden.bs.modal',function(){table.ajax.reload();});":"")."	
			}},":"").			
			($this->buttoncolvisible?"
			{extend:'colvis',
			text:'<span class=\"glyphicon glyphicon-tasks\" aria-hidden=\"true\"></span>',
			columns:'".$this->listindex()."'},":"").
			($this->buttonfilter ? "{text: '<span class=\"glyphicon glyphicon-filter\" aria-hidden=\"true\"></span>',action: function(e,dt,node,config){
			$('#$this->idmodal').modal('show');}},":" ").
			($this->buttonexcel?"
			{extend:'excelHtml5',
			text:'<span class=\"glyphicon glyphicon-th\" aria-hidden=\"true\"></span>',
			titleAttr:'Excel',
			exportOptions:{columns:'".$this->listindex()."'}},":"").
			($this->buttonpdf?"
			{extend:'pdfHtml5',
			text:'<span class=\"glyphicon glyphicon-file\" aria-hidden=\"true\"></span>',
			titleAttr:'PDF',
			exportOptions:{columns:'".$this->listindex()."'}},":"").
			($this->buttonprint?"
			{extend:'print',
			text:'<span class=\"glyphicon glyphicon-print\" aria-hidden=\"true\"></span>',
			titleAttr:'Imprimir',
			exportOptions:{columns:'".$this->listindex()."'}}":"").
			"],columns:[".
			($this->select?"{className:'select-checkbox',orderable:false,data:null,width: '5%',defaultContent: ''},	":"").$this->get_data().$this->get_buttonsrecord()."],".
			($this->paging?" ":"scrollY:'200px,'")."
			scrollCollapse:true,
			paging:".($this->paging?"true":"false").",
			ordering:".($this->ordering?"true":"false").",
			info:".($this->info?"true":"false").",
			retrieve:false,".
			($this->paging?"pageLength:$this->pageLength,":" ")."
			lengthChange:false,
			searching:".($this->searching?"true":"false").",
			language: {processing:'Processando...',search:'Buscar&nbsp;:',lengthMenu:'Mostrar _MENU_ registros por página',info:'Página _PAGE_ de _PAGES_',infoEmpty:'Sem registros',infoFiltered:'(Filtrados de _MAX_ registros)',infoPostFix:'',loadingRecords:'Carregando...',zeroRecords:'Nenhum Registro Encontrado',emptyTable:'Tabela Vazia',paginate: {first:'Primeiro',previous:'Anterior',next:'Próximo',last:'Ultimo'},select: {rows:{_: '%d linhas selecionadas', 0: 'Clique na linha para selecionar', 1: 'Somente 1 linha selecionada'}}}
		});";	
	}
}

class Filter{
	public $name, $title, $type, $numbertype;
	function __construct($name, $title, $type, $numbertype){
		$this->name = $name;
		$this->title = $title;
		$this->type = $type;
		$this->numbertype = $numbertype;
	}	
}

function jsready($js){
	return "<script type='text/javascript'>$(document).ready(function(){ $js });</script>";
}

function table($title, $idtable, $width, $content){
	return
	"<div class='panel panel-primary'>
		<div class='panel-heading'><h4>$title</h4></div>
		<div class='panel-body'>	
		<table id='$idtable' class='table table-hover table-striped table-bordered' cellspacing='0' width='$width'>
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

$consultateste = new Grid('gdbTeste', 'core/pessoa/db.php?action=list&table=teste', 'Consulta Teste');
$consultateste->setrowid('codigo');
$consultateste->add_data('codigo', 'Código');
$consultateste->add_data('descricao', 'Descrição');
$consultateste->add_data('sexo', 'Sexo');
$consultateste->add_data('estado', 'Estado');
$consultateste->add_data('concorda', 'Concorda');
$consultateste->add_data('data', 'Data');
$consultateste->newrecord('core/pessoa/layout.php?type=insert');
//$consultateste->setoptions($select, $multi, $colvis, $save, $pdf, $excel, $print, $paging, $order, $info, $search);
$consultateste->setoptions(true, true, true, false, true, true, true, true, true, true, true);
$consultateste->createfilter('mdlteste', 'Filtrar Registros', 'fltTeste', 'btnokfilter');
$consultateste->add_filter('codigo', 'Código', 'number', 'integer');
$consultateste->add_filter('descricao', 'Descrição', 'text');
$consultateste->add_recordbtn('search','core/pessoa/layout.php?type=show');
$consultateste->add_recordbtn('edit','core/pessoa/layout.php?type=edit');
$consultateste->add_recordbtn('trash','core/pessoa/layout.php?type=delete');
echo $consultateste->show();
	
?>
