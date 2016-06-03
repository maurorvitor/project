<?php
	include '../data/dblib.php';
	$table = 'unidade';	
	$id = 1;
	$values = array();
	
	$action = '';
	if (isset($_GET['action'])){
	  $action = $_GET['action']; 
	}	
	
	foreach ($_POST as $key => $value) {
		if(strpos($key,'ig_')===false){
			$values[$key] = $value;
		}		
	}	
	
	$response = array();
	
	if ($action == 'sel'){
		$result = table_select($table,'nome,email,cnpj,fone,cep,estado,cidade,bairro,endereco,numero',array('idunidade'=>$id));
        $row = $result->fetch(PDO::FETCH_ASSOC);
	    echo json_encode($row);
	}	
	if ($action == 'edt'){	
		if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
			$values['image'] = $image;
		}		

		if(table_update($table, $values, array('idunidade'=>$id)) == true){
			$response['success'] = true;
			$response['mensage'] = 'Registro alterado com Sucesso!';				
		}else{
			$response['success'] = false;
			$response['mensage'] = 'Erro ao alterar registro!';				
		}
		echo json_encode($response);
	}

?>