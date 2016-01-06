<script src="core/user/user.js"></script>

<div class="alert alert-success" style="display: none" id="alertsucess">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Sucesso!</strong> Registro inserido com sucesso!.
</div>	

<div class="alert alert-danger" style="display: none" id="alerterror">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Erro!</strong> Ocorreu um erro ao inserir o registro!.
</div>

		<div class="panel panel-default">
			<div class="panel-heading"><h4>Cadastro de Usuário</h4></div>
			<div class="panel-body">	
			
				<form class="form-horizontal" role="form" id="frmuser">
				  
				  <div class="form-group">
				    <label class="control-label col-sm-2" for="email"></label>
					<div class="col-xs-5">						
					  	<input name="MAX_FILE_SIZE" value="102400" type="hidden">
					    <span class="btn btn-primary btn-file">
					    	Arquivo <input type="file" id="image" accept="image/jpeg" >
						    <img src="img/error.jpg" class="img-circle" alt="Usuário" width="64" height="64" >
						</span>				
					</div>  
				  </div>
				  
				  <div class="form-group">
					<label class="control-label col-sm-2" for="nome">Nome:*</label>
					<div class="col-xs-5">
					  <input type="text" class="form-control" id="nome" placeholder="Digite o Nome Completo" required autofocus >
					</div>
				  </div>				
				
				  <div class="form-group">
					<label class="control-label col-sm-2" for="email">Email:*</label>
					<div class="col-xs-5">
					  <input type="email" class="form-control" id="email" placeholder="Digite o email" required >
					</div>
				  </div>
				  
				  <div class="form-group">
					<label class="control-label col-sm-2" for="login">Login:*</label>
					<div class="col-xs-5"> 
					  <input type="text" class="form-control" id="login" placeholder="Digite o login" required >
					</div>
				  </div>				  
				  
				  <div class="form-group">
					<label class="control-label col-sm-2" for="senha">Senha:*</label>
					<div class="col-xs-5"> 
					  <input type="password" class="form-control" id="senha" placeholder="Digite a senha" required >
					</div>
				  </div>
				  
				  <div class="form-group">
					<label class="control-label col-sm-2" for="confirmar_senha">Confime a senha:*</label>
					<div class="col-xs-5"> 
					  <input type="password" class="form-control" id="confirmar_senha" name="confirmar_senha" placeholder="Confirme a senha" requerid>
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