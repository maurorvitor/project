<meta charset="utf-8">  <!--remover-->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">

<link href="datatables/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="datatables/buttons.bootstrap.min.css" rel="stylesheet">
<link href="datatables/select.bootstrap.min.css" rel="stylesheet">
<link href="css/query-builder.default.min.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>	
<script src="bootstrap/js/validator.js"></script>	
<script src="bootstrap/js/collapse.js"></script>	
<script src="bootstrap/js/transition.js"></script>	
<script src="filter/moment.min.js"></script>             
<script src="filter/pt-br.js"></script>             
<script src="filter/bootstrap-datetimepicker.min.js"></script>   

<script src="datatables/jquery.dataTables.min.js"></script>
<script src="datatables/buttons.colVis.min.js"></script>
<script src="datatables/dataTables.bootstrap.min.js"></script>
<script src="datatables/dataTables.buttons.min.js"></script>
<script src="datatables/buttons.bootstrap.min.js"></script>
<script src="datatables/dataTables.select.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="datatables/buttons.html5.min.js"></script>             
<script src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.print.min.js"></script>
<script src="core/data/jslib.js"></script>
<script src="mask/jquery.mask.min.js"></script>

<link href="filter/jquery.jui_filter_rules.bs.min.css" rel="stylesheet">
<link href="filter/bootstrap-datetimepicker.min.css" rel="stylesheet">
<script src="filter/jquery.jui_filter_rules.min.js"></script>             
<script src="filter/en.min.js"></script>                       

<link href="select/bootstrap-select.min.css" rel="stylesheet">
<script src="select/bootstrap-select.min.js"></script>  
<script src="select/defaults-pt_BR.js"></script>  
<script src="editor/bootstrap-wysiwyg.js"></script>  
<script src="editor/jquery.hotkeys.js"></script>  

<div id="main">
<?php
	$page = '';
	//echo md5('123456');
	if (isset($_GET['page'])){
		$page = $_GET['page']; 
	
		if (logado()){
			switch ($page) {
				case "userc":
					include 'core/user/user_cad.php';
					break;
				case "userl":
					include 'core/user/user_list.php';
					break;
				case "uni":
					include 'core/unidade/unidade_cad.php';
					break;					
				case "teste":
					include 'core/pessoa/consulta.php';
					break;					
			}	
		}else{
			switch ($page) {
				case "login":
					include 'core/login/login.php';
					break;
				default :
					include 'naopermitido.php';
			}
		}	
	}else{	
		if (logado()){
			include 'permitido.php';
		}else{
			include 'naopermitido.php';
		}
	}	
	//include 'testebld.php';
// //code.jquery.com/jquery-1.11.3.min.js
// https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js
// https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js

  //<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js" charset="utf-8"></script>	
?>
</div>
<div id="myModal" class="modal fade" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog">
	<!-- Modal content-->
	<div class="modal-content">			
	  <div class="modal-header"> 
	
		<button type="button" class="close" data-dismiss="modal">&times;</button>						
	  </div>
	  
	  <div class="modal-body" id="content-modal">		
	  </div>
	  
	  <div class="modal-footer">
		<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
	  </div>			  
	</div>
  </div>
</div>	