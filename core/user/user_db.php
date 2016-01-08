<?php
	include '../data/dblib.php';
	$table = 'user';
	
	$action = '';
	if (isset($_GET['action'])){
	  $action = $_GET['action']; 
	}
	if ($action == 'insert'){
		$values = array();
		
		foreach ($_POST as $key => $value) {
			if(strpos($key,'ig_')===false){
				$values[$key] = $value;
			}		
		}
		$values['dtcriacao'] = date ("Y-m-d H:i:s", time());
		$values['senha'] = md5($values['senha']);
		
		//$date = "'".date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $_POST['date'])))."'";
		
		if (table_insert($table, $values) == true){
			$response = array("success" => true);	
		}else{
			$response = array("success" => false);	
		}	

		echo json_encode($response);  
	}
	if ($action == 'list'){	
		$result = table_select($table);		
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$row['dtcriacao'] = date("d/m/Y H:i:s", strtotime($row['dtcriacao']));
			$linhas[] = $row;
		}
		//print_r($linhas);
		$data = array();
		$data['data'] = $linhas;				
	    echo json_encode($data);
	}
	if ($action == 'sel'){
	    $id = 0;
		if (isset($_GET['id'])){
		  $id = $_GET['id']; 
		}	
		$result = table_select($table,'nome,email,login',array('iduser'=>$id));
        $row = mysqli_fetch_object($result);
	    echo json_encode($row);
	}	
	
	if ($action == 'edt'){
	    $id = 0;
		if (isset($_GET['id'])){
		  $id = $_GET['id']; 
		}
		$values = array();
		
		foreach ($_POST as $key => $value) {
			if(strpos($key,'ig_')===false){
				$values[$key] = $value;
			}		
		}		
		//echo table_update($table, $values, array('iduser'=>$id));
		if(table_update($table, $values, array('iduser'=>$id)) == true){
        	$response = array("success" => true);	
		}else{
			$response = array("success" => false);	
		}
	    echo json_encode($response);
	}	
?>