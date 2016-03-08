<?php
	if(!isset($_SESSION)){
		session_start();
	}
	if (isset($_GET['page'])){
		switch ($_GET['page']) {				
			case "out":
			include 'core/login/logout.php';
			break;						
		}	
	}	
	include 'sessao.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap 101 Template</title>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<script src="js/main.js"></script>          
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <img class="media-object" src="img/logo.png" alt="Home" width="36" height="36" style="margin-top:6px;"> 
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administração<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="index.php?page=userl">Usuários</a></li>
                <li><a href="index.php?page=uni">Unidade</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
		    <?php echo ((logado()) ? '<li><a href="javascript:viewuser('.iduser().');" >'.nomeuser().'</a></li>':'');?>
			<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login<span class="caret"></span></a>
              <ul class="dropdown-menu">
                 <?php echo ((logado()) ? '<li><a href="javascript:edtsenha('.iduser().');"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Alterar Senha </a></li>':'');?>
                 <?php echo ((logado()) ? '<li><a href="index.php?page=out"><span class="glyphicon glyphicon-off" aria-hidden="true"></span> Sair </a></li>':'');?>
				 <?php echo ((logado()) ? '':'<li><a href="index.php?page=login"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Entrar </a></li>');?>
              </ul>
            </li>          
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
		<?php 
		$page = '';			
		if (isset($_GET['page'])){
			$page = '?page='.$_GET['page'];
		}				
		include 'chamada.php';//.$page;		
		?>      
      </div>
    </div> <!-- /container -->  
	
    <footer class="footer">
      <div class="container">
        <p class="text-muted">Place sticky footer content here.</p>
      </div>
    </footer>	
  </body>
</html>