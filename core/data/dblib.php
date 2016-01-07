<?php

function table_insert($table, $fields){
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
	include 'conection.php';
	return  mysqli_query($linkbase, $sql);    
	mysqli_close($linkbase);
	//echo $sql;
}

function table_update($table, $fields, $pk){
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
	include 'conection.php';
	return  mysqli_query($linkbase, $sql);    
	mysqli_close($linkbase);  
}

function table_delete($table, $pk){
	$keys = '';
	foreach($pk as $key => $value){
		if($keys != ''){
			$keys = $keys." and $key = '$value' ";
		}else{
			$keys = $keys." $key = '$value' ";
		}	
	}	
	$sql = " delete from $table where($keys) ";     
	include 'conection.php';
	return  mysqli_query($linkbase, $sql);    
	mysqli_close($linkbase); 
    	
}

function table_select($table, $fields = '*', $pk = array(), $order = ''){
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
	include 'conection.php';
	return  mysqli_query($linkbase, $sql);    
	mysqli_close($linkbase);  
}

function format_date($linhas, $coluna){	
	foreach($linhas as $key => $value){
		if($key === $coluna){
			$linhas[$key] = date("d/m/Y H:i:s", $linhas[$key]);
		}
		//print_r($value);
	}
	return $linhas;
}

?>
