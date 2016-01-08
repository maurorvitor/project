<script type="text/javascript" src="core/user/user.js" charset="utf-8" ></script>

	<div class="alert alert-success" style="display: none" id="alertsucess">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  <strong>Sucesso!</strong> 
	</div>	

	<div class="alert alert-danger" style="display: none" id="alerterror">
	  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
	  <strong>Erro!</strong> 
	</div>

	<?php	
		$page = '';
		if (isset($_GET['page'])){
		  $page = $_GET['page']; 
		}
		$view = ($page == 'view' ? true : false);
		$del =  ($page == 'del' ? true : false);
		$edt =  ($page == 'edt' ? true : false);
		$ins =  ($page == 'ins' ? true : false);		
		
		if (($view or $del or $ins or $edt) == false) {
			$ins = true;
		}
		
	?>	
	
	<div class="panel panel-default">
		<div class="panel-heading"><h4><?php echo ($view ? 'Visualizar' : '').($del ? 'Apagar' : '').($edt ? 'Alterar' : '').($ins ? 'Inserir' : '');?> Usuário</h4></div>
		<div class="panel-body">	
		    <?php echo (($view or $del) ? 
			'<img src="img/error.jpg" class="img-circle" alt="Usuário" width="64" height="64" >':''); ?> 
			
			<form class="form-horizontal" role="form" id="frmuser" data-toggle="validator" method="post">
			  <?php echo (($ins or $edt) ?
			  '<div class="form-group">
				<label class="control-label col-sm-2" for="image"></label>
				<div class="col-xs-5">						
					<input id="MAX_FILE_SIZE" value="102400" type="hidden">
					<span class="btn btn-primary btn-file">
						Imagem <input type="file" id="image" name="image" accept="image/jpeg" >						
					</span>				
				</div> 				
			  </div>' : '');
			  ?>
			  
			  <div class="form-group">
				<label class="control-label col-sm-2" for="nome">Nome</label>
				<div class="col-xs-5">
				  <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o Nome Completo" required autofocus  <?php echo (($view or $del) ? 'disabled':'');?>>
				</div>
			  </div>				
			
			  <div class="form-group">
				<label class="control-label col-sm-2" for="email">Email</label>
				<div class="col-xs-5">
				  <input type="email" class="form-control" id="email" name="email" placeholder="Digite o email" required <?php echo (($view or $del) ? 'disabled':'');?> >
				</div>
			  </div>
			  
			  <div class="form-group">
				<label class="control-label col-sm-2" for="login">Login</label>
				<div class="col-xs-5"> 
				  <input type="text" class="form-control" id="login" name="login" placeholder="Digite o login" required <?php echo (($view or $del) ? 'disabled':'');?> >
				</div>
			  </div>
			  
			  <?php echo ($ins ? '
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
					<?php echo ($ins ? '<button type="submit" class="btn btn-primary">Salvar</button>': '');?>
					<?php echo ($del ? '<button id="btnDelete" type="button" class="btn btn-danger">Confirmar</button>':'');?>
				    <?php echo ($edt ? '<button id="btnEdit" type="button" class="btn btn-primary">Salvar</button>':'');?>
				    <?php echo ($ins ? '<button type="reset" class="btn btn-default">Cancelar</button>':'');?>
				</div>
			  </div>
			  
			</form>				
	  </div>
	</div>	
	
	