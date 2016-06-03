<script type="text/javascript">
	$(document).ready(function(){
		$('#fone').mask('(00) 0000-0000');
		$('#cnpj').mask('00.000.000/0000-00');
		
		$.getJSON('core/unidade/unidade_db.php?action=sel', function(result){
			$.each(result, function(i, field){				
				$("#frmunidade #"+i).val(field);
			});
		});	
		
		$('#btnEdit').on('click', function () {	
			$('#frmunidade').validator('validate');
			if ($('.has-error').length == 0){
				var formData = new FormData($('#frmunidade')[0]);
				$.ajax({
					type: 'POST',
					dataType: 'json', 
					async: false,
					url: 'core/unidade/unidade_db.php?action=edt',
					data: formData,
					processData: false,  
					contentType: false,				
					success: function (response) {			
						mensagem(response);					
					}
				});				
			}	
		});
		
		$('#btncep').on('click', function () {	
			var cep_code = $('#cep').val();
		    if( cep_code.length <= 0 ) return;
			$.get("http://apps.widenet.com.br/busca-cep/api/cep.json", { code: cep_code },function(result){
				if( result.status!=1 ){
				   alert(result.message || "Houve um erro desconhecido");
				   return;
				}
				$("input#cep").val( result.code );
				$("input#estado").val( result.state );
				$("input#cidade").val( result.city );
				$("input#bairro").val( result.district );
				$("input#endereco").val( result.address );
				$("input#estado").val( result.state );
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
	
	include 'core/data/dblib.php';			
	$result = table_select('unidade','image',array('idunidade'=>1));
	$row = $result->fetch(PDO::FETCH_ASSOC);
	$image = base64_encode($row['image']);				
	$image = (($image == '')?'img/error.jpg':'data:image/png;base64,'.$image);
	
?>

<div class="panel panel-default">
	<div class="panel-heading"><h4>Unidade</h4></div>
	<div class="panel-body">
		<img src="<?php echo $image?>" class="img-circle" id="imguni" alt="Imagem" width="64" height="64" >
		<img src="<?php echo $image?>" alt="imagem" class="img-thumbnail" width="96" height="96">
		<form class="form-horizontal" role="form" id="frmunidade" data-toggle="validator" method="post" enctype="multipart/form-data">
			
			
			<div class="form-group">							
				<label class="control-label col-sm-2" for="image">Imagem</label>
				<div class="col-xs-5">					
					<span class="btn btn-primary btn-file">
						Imagem 	<input type="file" id="image" name="image" accept=".gif,.jpg,.png" >					
					</span>				
				</div> 				
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-2" for="nome">Nome</label>
				<div class="col-xs-5">
					<input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o Nome Completo" required autofocus >
				</div>
			</div>	
			
			<div class="form-group">
				<label class="control-label col-sm-2" for="cnpj">CNPJ</label>
				<div class="col-xs-5"> 
					<input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="Digite o CNPJ" required >
				</div>
			</div>			
			
			<div class="form-group">
				<label class="control-label col-sm-2" for="email">Email</label>
				<div class="col-xs-5">
					<input type="email" class="form-control" id="email" name="email" placeholder="Digite o email" >
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-2" for="fone">Telefone</label>
				<div class="col-xs-5"> 
					<input type="text" class="form-control" id="fone" name="fone" >
				</div>
			</div>	
		
			<div class="form-group">
			<label class="control-label col-sm-2" for="cep">CEP</label>
			  <div class="col-xs-5">
				<div class="input-group">
				  <input type="text" class="form-control" id="cep" name="cep" placeholder="Buscar CEP...">
				  <span class="input-group-btn">
					<button class="btn btn-default" type="button" id="btncep">Buscar</button>
				  </span>
				</div><!-- /input-group -->
			  </div><!-- /.col-lg-6 -->
			</div><!-- /.row -->
			  	
			
			<div class="form-group">
				<label class="control-label col-sm-2" for="estado">Estado</label>
				<div class="col-xs-5"> 
					<input type="text" class="form-control" id="estado" name="estado" >
				</div>
			</div>				
			
			<div class="form-group">
				<label class="control-label col-sm-2" for="cidade">Cidade</label>
				<div class="col-xs-5"> 
					<input type="text" class="form-control" id="cidade" name="cidade" >
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-2" for="bairro">Bairro</label>
				<div class="col-xs-5"> 
					<input type="text" class="form-control" id="bairro" name="bairro" >
				</div>
			</div>				
			
			<div class="form-group">
				<label class="control-label col-sm-2" for="endereco">Endereço</label>
				<div class="col-xs-5"> 
					<input type="text" class="form-control" id="endereco" name="endereco" >
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-2" for="numero">Número</label>
				<div class="col-xs-5"> 
					<input type="text" class="form-control" id="numero" name="numero" >
				</div>
			</div>				
			
			<div class="form-group"> 
				<div class="col-sm-offset-2 col-sm-10">
					<button id="btnEdit" type="button" class="btn btn-primary">Salvar</button>
				</div>
			</div>
			
		</form>	
	</div>		
</div>


