<script type="text/javascript">
$(document).ready(function(){			
	var id = $("#iduser").val();
	
	$('#btnEdit').on('click', function () {	
		$('#frmuser').validator('validate');
		if ($('.has-error').length == 0){
			var formData = new FormData($('#frmuser')[0]);
			$.ajax({
				type: 'POST',
				dataType: 'json', 
				async: false,
				url: 'core/user/user_db.php?action=edt&id='+id,
				data: formData,
				processData: false,  
				contentType: false,				
				success: function (response) {			
					mensagem(response);					
				}
			});				
		}	
	}); 
	
	$('#btnDelete').on('click', function () {	
		$.ajax({
			type: 'POST',
			dataType: 'json', 
			async: false,
			url: 'core/user/user_db.php?action=del&id='+id,
			success: function (response) {
				mensagem(response);
			}			
		});	
	});	
});

</script>
<div class="alert alert-success" style="display: none" id="alertsucess">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Sucesso!</strong> 
	<span></span>
</div>	

<div class="alert alert-danger" style="display: none" id="alerterror">
	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	<strong>Erro!</strong> 
	<span></span>
</div>
<?php	
	$page = '';
	$id = 0;
	if (isset($_GET['page'])){
		$page = $_GET['page']; 
	}
	$image = '';
	if (isset($_GET['id'])){
		$id = $_GET['id']; 
		
		include '../data/dblib.php';			
		$result = table_select('user','image',array('iduser'=>$id));
		$row = $result->fetch(PDO::FETCH_ASSOC);
		$image = base64_encode($row['image']);				
	}
	$view = ($page == 'view' ? true : false);
	$del =  ($page == 'del' ? true : false);
	$edt =  ($page == 'edt' ? true : false);
	$sen =  ($page == 'sen' ? true : false);		
	$per =  ($page == 'per' ? true : false);		
	
	if (($view or $del or $edt or $sen or $per) == false) {
		$view = true;
	}
	
	$image = (($image == '')?'img/error.jpg':'data:image/png;base64,'.$image);
	
	
?>	

<div class="panel panel-default">
	<div class="panel-heading"><h4><?php echo ($view ? 'Visualizar' : '').($del ? 'Apagar' : '').($edt ? 'Alterar' : '').($sen ? 'Alterar Senha' : '').($per ? 'Permissões' : '');?> Usuário</h4></div>-
	<div class="panel-body">
		
		<?php echo (($view or $del) ? 
		'<img src="'.$image.'" class="img-circle" id="imguser" alt="Usuário" width="64" height="64" >':''); ?> 
	
					
					<form class="form-horizontal" role="form" id="frmuser" data-toggle="validator" method="post" enctype="multipart/form-data">
						
						<input id="iduser" type="hidden" value="<?php echo $id ?>">
						<?php echo (($edt) ?
							'<div class="form-group">
							<label class="control-label col-sm-2" for="image"></label>
							<div class="col-xs-5">						
							
							<span class="btn btn-primary btn-file">
							Imagem 	<input type="file" name="image" >					
							</span>				
							</div> 				
							</div>' : '');
						?>
						
						<?php echo (($sen or $per) ? '':'
							<div class="form-group">
							<label class="control-label col-sm-2" for="nome">Nome</label>
							<div class="col-xs-5">
							<input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o Nome Completo" required autofocus  '.(($view or $del) ? 'disabled':'').'>
							</div>
							</div>				
							
							<div class="form-group">
							<label class="control-label col-sm-2" for="email">Email</label>
							<div class="col-xs-5">
							<input type="email" class="form-control" id="email" name="email" placeholder="Digite o email" required '.(($view or $del) ? 'disabled':'').' >
							</div>
							</div>
							
							<div class="form-group">
							<label class="control-label col-sm-2" for="login">Login</label>
							<div class="col-xs-5"> 
							<input type="text" class="form-control" id="login" name="login" placeholder="Digite o login" required '.(($view or $del) ? 'disabled':'').' >
							</div>
						</div>');?>
						
						<?php echo (($sen) ? '
							<div class="form-group">
							<label for="senha" class="control-label col-sm-2">Senha</label>
							<div class="col-xs-5">
							<input type="password" data-minlength="6" class="form-control" id="senha" name="senha" placeholder="Digite a Senha" required>
							<span class="help-block">Minimo 6 characteres</span>
							</div>
							</div>
							
							<div class="form-group">
							<label for="ig_confirma" class="control-label col-sm-2">Confirmação</label>
							<div class="col-xs-5">
							<input type="password" class="form-control" id="ig_confirma" data-match="#senha" data-match-error="Não são iguais" placeholder="Confirme a Senha" required>
							<div class="help-block with-errors"></div>
							</div>				 
						</div>':'');?>
						
						
						<div class="form-group"> 
							<div class="col-sm-offset-2 col-sm-10">
								<?php echo ($del ? '<button id="btnDelete" type="button" class="btn btn-danger">Confirmar</button>':'');?>
								<?php echo (($edt or $sen) ? '<button id="btnEdit" type="button" class="btn btn-primary">Salvar</button>':'');?>
							</div>
						</div>
						
					</form>	
				<?php echo (($per) ? '					
						<table id="dbgperm" class="table" cellspacing="0" width="100%">
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
			</div>	':'');?>
			
		</div>
	</div>	
	
