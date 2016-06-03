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

	$result = table_select($table,'iduser,nome,email,login,senha', array('login'=>'adm'));
	
	if ($result->rowCount() == 0){
		$response['success'] = false;
		$response['mensage'] = 'Login não encontrado!';			
	}else{
		$row = $result->fetch(PDO::FETCH_ASSOC);

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
			
			table_update($table, array('tdultacesso'=>date("Y-m-d H:i:s", time())), array('iduser'=>$row['iduser']));
		}
	}
	
    echo json_encode($response);		
?>