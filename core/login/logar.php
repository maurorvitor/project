<?php
	include '../data/dblib.php';
	$table = 'user';
	
	$values = array();	
	foreach ($_POST as $key => $value) {
		if(strpos($key,'ig_')===false){
			$values[$key] = $value;
		}		
	}

	$result = table_select($table,'iduser,nome,email,login,senha',array('login'=>$values['login']));
	
	if!($result){
		$response['success'] = false;
		$response['mensage'] = 'Login não encontrado!'.mysqli_error($linkbase);			
	}else{
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		if (md5($values['senha']) != $row['senha']){]
			$response['success'] = false;
			$response['mensage'] = 'Senha incorreta!';			
		}else{
			$response['success'] = true;
			$response['mensage'] = 'Login Realizado!';	
			
			session_start();
			$_SESSION['iduser'] = $values['iduser'];
			$_SESSION['nome']   = $values['nome'];
			$_SESSION['email']  = $values['email'];			
		}
	}	
	echo json_encode($row);		
?>