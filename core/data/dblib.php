<?php

include 'conection.php';

function processmsg($status, $msg, $id = 0){
	$return = array(); 
	$return['success'] = $status;	
	$return['mensage'] = $msg;	
	if ($id > 0){
		$return['id'] = $id;	
	}
	return $return;
}

function tem_permissao($table, $tipo, &$response = array(), $verifica){	
	$permissao = true;
	if ($verifica == true){
		switch ($tipo) {
			case "inserir":
				$result = table_select('permissao','inserir',array('tabela'=>$table,'iduser'=>$id));
				$row = $result->fetch(PDO::FETCH_ASSOC);
				$permissao =  (($row['inserir']==1)?true:false);
				break;
			case "alterar":
				$result = table_select('permissao','alterar',array('tabela'=>$table,'iduser'=>$id));
				$row = $result->fetch(PDO::FETCH_ASSOC);
				$permissao = (($row['alterar']==1)?true:false);
				break;
			case "apagar":
				$result = table_select('permissao','apagar',array('tabela'=>$table,'iduser'=>$id));
				$row = $result->fetch(PDO::FETCH_ASSOC);
				$permissao = (($row['inserir']==1)?true:false);
				break;					
		}
		if ($permissao == false){
			$response['success'] = false;
			$response['mensage'] = 'Usuário sem premissão de realizar ação!';		
		}
		return $permissao;
	}else{
		return $permissao;
	}
}


function table_replace($table, $fields){
	$link = linkbase();
	$keys = '';
	$values = '';
	foreach($fields as $key => $value){
		if($keys != ''){
			$keys = $keys.','.$key;
		}else{
			$keys = $keys.$key;
		}
		if($values != ''){
			$values = $values.",'$value'";
		}else{
			$values = $values."'$value'";
		}		
	}
	$sql = " replace into $table($keys)values($values)";     
	return $link->query($sql);    	
}

function table_insert($table, $fields, &$id = 0, &$response = array(), $verifica_permissao = true){
	$link = linkbase();
	$keys = '';
	$values = '';
	foreach($fields as $key => $value){
		if($keys != ''){
			$keys = $keys.','.$key;
		}else{
			$keys = $keys.$key;
		}
		if($values != ''){
			$values = $values.",'$value'";
		}else{
			$values = $values."'$value'";
		}		
	}
	$sql = " insert into $table($keys)values($values)";     
 	if (tem_permissao($table, 'inserir', $response, $verifica_permissao) == true){
		$flag = $link->query($sql);
		$id = $link->lastInsertId();
		if ($flag == true){
			$response['success'] = true;	
			$response['mensage'] = 'Registro Inserido com Sucesso!';
		}else{
			$response['success'] = false;
			$response['mensage'] = 'Erro ao inserir registro!-'.$link->errorInfo();		
		}	
		return $flag;
	}else{
		return false;
	}
}

function table_update($table, $fields, $pk, &$response = array(), $verifica_permissao = true){
	$link = linkbase();
	$keys = '';
	$values = '';
	foreach($fields as $key => $value){
		if($values != ''){
			$values = $values.", $key = '$value' ";
		}else{
			$values = $values." $key = '$value' ";
		}	
	}
	foreach($pk as $key => $value){
		if($keys != ''){
			$keys = $keys." and $key = '$value' ";
		}else{
			$keys = $keys." $key = '$value' ";
		}	
	}	
	$sql = " update $table set $values where($keys) "; 
	
 	if (tem_permissao($table, 'alterar', $response, $verifica_permissao) == true){
		$flag = $link->query($sql);
		if ($flag == true){
			$response['success'] = true;	
			$response['mensage'] = 'Registro Alterado com Sucesso!';
		}else{
			$response['success'] = false;
			$response['mensage'] = 'Erro ao Alterar registro!-'.$link->errorInfo();		
		}
		return $flag;
	}else{
		return false;
	}
}

function table_delete($table, $pk, &$response = array(), $verifica_permissao = true){
	$link = linkbase();
	$keys = '';
	foreach($pk as $key => $value){
		if($keys != ''){
			$keys = $keys." and $key = '$value' ";
		}else{
			$keys = $keys." $key = '$value' ";
		}	
	}	
	$sql = " delete from $table where($keys) ";     
	if (tem_permissao($table, 'apagar', $response, $verifica_permissao) == true){
		$flag = $link->query($sql);   
		if ($flag == true){
			$response['success'] = true;	
			$response['mensage'] = 'Registro Apagado com Sucesso!';
		}else{
			$response['success'] = false;
			$response['mensage'] = 'Erro ao Apagar registro!-'.$link->errorInfo();		
		}	
		return  $flag;
	}else{
		return false;
	}
}

function table_select($table, $fields = '*', $pk = array(), $where = '', $order = ''){
	$link = linkbase();
	$keys = '';
	foreach($pk as $key => $value){
		if($keys != ''){
			$keys = $keys." and $key = '$value' ";
		}else{
			$keys = $keys." $key = '$value' ";
		}	
	}
	if($keys != ''){
		$keys = " where($keys)";
	}	
	if($order != ''){
		$order = " order by $order";
	}	
	$sql = " select $fields from $table $keys $where $order";     
	
	$sth = $link->prepare($sql);
	$sth->execute(); 
	return $sth;  
}

function format_date($linhas, $coluna){	
	foreach($linhas as $key => $value){
		if($key === $coluna){
			$linhas[$key] = date("d/m/Y H:i:s", $linhas[$key]);
		}
	}
	return $linhas;
}

?>
