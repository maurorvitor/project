<?php

include 'conection.php';

function tem_permissao($table, $tipo){	
	
}


function table_replace($table, $fields){
	$link = linkbase();
	mysqli_set_charset($link, "utf8");
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
	return  mysqli_query($link, $sql);    	
}

function table_insert($table, $fields, &$id = 0, &$response = array()){
	$link = linkbase();
	mysqli_set_charset($link, "utf8");
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
	$flag =  mysqli_query($link, $sql);   	
	$id = mysqli_insert_id($link);	
	if ($flag == true){
		$response['success'] = true;	
		$response['mensage'] = 'Registro Inserido com Sucesso!';
	}else{
		$response['success'] = false;
		$response['mensage'] = 'Erro ao inserir registro!-'.mysqli_error($link);		
	}	
	return $flag;
}

function table_update($table, $fields, $pk, &$response = array()){
	$link = linkbase();
	mysqli_set_charset($link, "utf8");
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
	$flag = mysqli_query($link, $sql);    
	if ($flag == true){
		$response['success'] = true;	
		$response['mensage'] = 'Registro Alterado com Sucesso!';
	}else{
		$response['success'] = false;
		$response['mensage'] = 'Erro ao Alterar registro!-'.mysqli_error($link);		
	}	
	return  $flag;
}

function table_delete($table, $pk, &$response = array()){
	$link = linkbase();
	mysqli_set_charset($link, "utf8");
	$keys = '';
	foreach($pk as $key => $value){
		if($keys != ''){
			$keys = $keys." and $key = '$value' ";
		}else{
			$keys = $keys." $key = '$value' ";
		}	
	}	
	$sql = " delete from $table where($keys) ";     
	$flag = mysqli_query($link, $sql);    
	if ($flag == true){
		$response['success'] = true;	
		$response['mensage'] = 'Registro Apagado com Sucesso!';
	}else{
		$response['success'] = false;
		$response['mensage'] = 'Erro ao Apagar registro!-'.mysqli_error($link);		
	}	
	return  $flag;
}

function table_select($table, $fields = '*', $pk = array(), $order = ''){
	$link = linkbase();
	mysqli_set_charset($link, "utf8");
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
	$sql = " select $fields from $table $keys $order";     
	return  mysqli_query($link, $sql);    
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
