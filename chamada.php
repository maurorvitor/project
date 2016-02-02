<meta charset="utf-8">  <!--remover-->
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="css/main.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/buttons/1.1.0/css/buttons.bootstrap.min.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>	
<script src="bootstrap/js/validator.js"></script>	
<script src="datatables/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.1.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="js/buttons.html5.min.js"></script>             
<script src="https://cdn.datatables.net/buttons/1.1.0/js/buttons.print.min.js"></script>
<script src="core/data/jslib.js"></script>
<script src="mask/jquery.mask.min.js"></script>
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
	//include 'core/user/user_perm.php';
// //code.jquery.com/jquery-1.11.3.min.js
// https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js
// https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js

  //<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js" charset="utf-8"></script>	
?>

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