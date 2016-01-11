<?php
	include '../data/dblib.php';
	$table = 'user';
	
	$values = array();	
	$response = array();
	foreach ($_POST as $key => $value) {
		if(strpos($key,'ig_')===false){
			$values[$key] = $value;
		}		
	}

	$result = table_select($table,'iduser,nome,email,login,senha', array('login'=>$values['login']));
	
	if (mysqli_num_rows($result) == 0){
		$response['success'] = false;
		$response['mensage'] = 'Login não encontrado!'.mysqli_error($linkbase);			
	}else{
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		if (md5($values['senha']) != $row['senha']){
			$response['success'] = false;
			$response['mensage'] = 'Senha incorreta!';			
		}else{
			$response['success'] = true;
			$response['mensage'] = 'Login Realizado!';	
			
			session_start();
			$_SESSION['iduser'] = $row['iduser'];
			$_SESSION['nome']   = $row['nome'];
			$_SESSION['email']  = $row['email'];			
		}
	}	
	echo json_encode($response);		
?>