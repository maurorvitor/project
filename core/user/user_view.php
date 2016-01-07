<script type="text/javascript" src="core/user/user.js" charset="utf-8" ></script>

	<div class="alert alert-success" style="display: none" id="alertsucess">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  <strong>Sucesso!</strong> 
	</div>	

	<div class="alert alert-danger" style="display: none" id="alerterror">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  <strong>Erro!</strong> 
	</div>

	<div class="panel panel-default">
		<div class="panel-heading"><h4>Cadastro de Usuário</h4></div>
		<div class="panel-body">	
		
			<form class="form-horizontal" role="form" id="frmuser" data-toggle="validator" method="post">
			  
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email"></label>
				<div class="col-xs-5">						
					<input id="MAX_FILE_SIZE" value="102400" type="hidden">
					<span class="btn btn-primary btn-file">
						Arquivo <input type="file" id="image" accept="image/jpeg" >
						<img src="img/error.jpg" class="img-circle" alt="Usuário" width="64" height="64" >
					</span>				
				</div>  
			  </div>
			  
			  <div class="form-group">
				<label class="control-label col-sm-2" for="nome">Nome:*</label>
				<div class="col-xs-5">
				  <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o Nome Completo" required autofocus >
				</div>
			  </div>				
			
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Email:*</label>
				<div class="col-xs-5">
				  <input type="email" class="form-control" id="email" name="email" placeholder="Digite o email" required >
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class="control-label col-sm-2" for="login">Login:*</label>
				<div class="col-xs-5"> 
				  <input type="text" class="form-control" id="login" name="login" placeholder="Digite o login" required >
				</div>
			  </div>				  
			  
			  <div class="form-group">
				<label for="senha" class="control-label col-sm-2">Senha:*</label>
				<div class="col-xs-5">
				  <input type="password" data-minlength="6" class="form-control" id="senha" name="senha" placeholder="Digite a Senha" required>
				  <span class="help-block">Minimo 6 characteres</span>
				</div>
			  </div>
			  
			  <div class="form-group">
			  <label for="ig_confirma" class="control-label col-sm-2">Confirmação:*</label>
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
	
	