<script type="text/javascript" src="core/login/login.js" charset="utf-8" ></script>

<div class="alert alert-success" style="display: none" id="alertsucess">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Sucesso!</strong> 
  <span> </span>
</div>	

<div class="alert alert-danger" style="display: none" id="alerterror">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Erro!</strong> 
  <span> </span>  
</div>

<div class="container-login">
<div class="panel panel-default">
	<div class="panel-heading"><h4>Acesso ao Sistema</h4></div>
	<div class="panel-body">	
	
<form class="form-horizontal" role="form" id="frmlogin" data-toggle="validator" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="login">Login</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="login" name="login" placeholder="Login" required autofocus>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="senha">Senha</label>
    <div class="col-sm-8"> 
      <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required >
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-2">
      <button type="submit" class="btn btn-primary" id="btnLogin">Acessar</button>
    </div>
  </div>
</form>

</div>
</div>
</div>