<script type="text/javascript" src="core/user/user.js" charset="utf-8" ></script>
<div class="panel panel-default">
	<div class="panel-heading"><h4>Consulta de Usuários</h4></div>
	<div class="panel-body">	
	<table id="dbguser" class="table table-hover table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
			    <th></th>
				<th></th>
				<th></th>
				<th>Nome</th>
				<th>Email</th>
				<th>Login</th>
				<th>Data Cadastro</th>
			</tr>
		</thead>
	</table>				
	</div>
</div>
<input id="iduser" type="hidden">
<div id="myModal" class="modal fade " role="dialog" aria-labelledby="myLargeModalLabel">
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