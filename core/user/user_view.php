<script type="text/javascript" src="core/user/user.js" charset="utf-8" ></script>

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
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			//print_r($row);
			$image = base64_encode($row['image']);				
			mysqli_free_result($result);
		}
		$view = ($page == 'view' ? true : false);
		$del =  ($page == 'del' ? true : false);
		$edt =  ($page == 'edt' ? true : false);
		$ins =  ($page == 'ins' ? true : false);		
		$sen =  ($page == 'sen' ? true : false);		
		
		if (($view or $del or $ins or $edt or $sen) == false) {
			$ins = true;
		}
		
		$image = (($image == '')?'img/error.jpg':'data:image/png;base64,'.$image);

		
	?>	
	
	<div class="panel panel-default">
		<div class="panel-heading"><h4><?php echo ($view ? 'Visualizar' : '').($del ? 'Apagar' : '').($edt ? 'Alterar' : '').($sen ? 'Alterar Senha' : '').($ins ? 'Inserir' : '');?> Usuário</h4></div>
		<div class="panel-body">
			
		    <?php echo (($view or $del) ? 
			'<img src="'.$image.'" class="img-circle" id="imguser" alt="Usuário" width="64" height="64" >':''); ?> 
			
			<form class="form-horizontal" role="form" id="frmuser" data-toggle="validator" method="post" enctype="multipart/form-data">
				<?php echo (($edt or $sen or $del) ? 
				'<input id="iduser" type="hidden" value="'.$id.'">':'');?>
			  <?php echo (($ins or $edt) ?
			  '<div class="form-group">
				<label class="control-label col-sm-2" for="image"></label>
				<div class="col-xs-5">						
					<input type="file" name="image" >					
					<span class="btn btn-primary btn-file">
						Imagem 						
					</span>				
				</div> 				
			  </div>' : '');
			  ?>
			  
			  <?php echo ($sen ? '':'
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
			  
			  <?php echo (($ins or $sen) ? '
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
				    <?php echo (($edt or $sen) ? '<button id="btnEdit" type="button" class="btn btn-primary">Salvar</button>':'');?>
				    <?php echo ($ins ? '<button type="reset" class="btn btn-default">Cancelar</button>':'');?>
				</div>
			  </div>
			  
			</form>				
	  </div>
	</div>	
	
	