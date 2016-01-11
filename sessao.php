<?php
	function logado(){
		if(!isset($_SESSION)){
			session_start();
		}
		return isset($_SESSION['iduser']);	
	}
	
	function iduser(){
		if(!isset($_SESSION)){
			session_start();
		}
		if (isset($_SESSION['iduser'])){
			return $_SESSION['iduser'];
		}else{
			return 0;	
		}	
	}
	
	function nomeuser(){
		if(!isset($_SESSION)){
			session_start();
		}
		if (isset($_SESSION['nome'])){
			return $_SESSION['nome'];
		}else{
			return 0;	
		}	
	}	

?>