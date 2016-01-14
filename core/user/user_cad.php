<script type="text/javascript">
 $(document).ready(function(){
	$('#caduser').validator().on('submit', function (e) {		
		e.preventDefault(); 
	    $('#caduser').validator('validate');		
		if ($('.has-error').length == 0){
			var formData = new FormData($('#caduser')[0]);
			$.ajax({
				type: 'POST',
				dataType: 'json', 
				async: false,
				url: 'core/user/user_db.php?action=insert',
				data: formData,
				processData: false,  
				contentType: false,				
				success: function (response) {			
					mensagem(response);
					$('#caduser').trigger("reset");
				}
			});		
		}
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

	<div class="panel panel-default">
		<div class="panel-heading">Cadastro de Usuário</h4></div>
		<div class="panel-body">
			
			<form class="form-horizontal" role="form" id="caduser" data-toggle="validator" method="post" enctype="multipart/form-data">
			  <div class="form-group">
				<label class="control-label col-sm-2" for="image"></label>
				<div class="col-xs-5">					
					<span class="btn btn-primary btn-file">
						Imagem 	<input type="file" name="image" >					
					</span>				
				</div> 				
			  </div>
			  
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
			  </div>		
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
				</div>						  
							  
			  <div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-primary">Salvar</button>
				    <button type="reset" class="btn btn-default">Cancelar</button>
				</div>
			  </div>
			  
			</form>	
		
	  </div>
	</div>	
	
	