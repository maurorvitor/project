<?php
	function gerapermissao($iduser){
		$result = table_select('permissao','tabela,descricao,inserir,alterar,apagar,visualizar',array('iduser'=>1));
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$row['inserir'] = 0;
			$row['alterar'] = 0;
			$row['apagar'] = 0;
			$row['visualizar'] = 0;
			$row['iduser'] = $iduser;
			table_replace('permissao', $row);
		}
	}
	
	include '../data/dblib.php';
	$table = 'user';
	
	$action = '';
	if (isset($_GET['action'])){
	  $action = $_GET['action']; 
	}
	
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
	
	$response = array();
	
	if ($action == 'updperm'){
		table_update('permissao', array('inserir'=>0, 'alterar'=>0, 'apagar'=>0, 'visualizar'=>0), array('iduser'=>$id));

		foreach ($_POST as $key => $value) {
		    $idperm = substr($key, 0, strpos($key, '-')); 
			$campo = substr($key, strpos($key, '-')+1);			
			table_update('permissao', array($campo=>$value), array('idpermissao'=>$idperm));			
		}
		$response['sucess'] = true;
		echo json_encode($response); 
	}
	
	if ($action == 'perm'){		
		$result = table_select('permissao','idpermissao,descricao,inserir,alterar,apagar,visualizar',array('iduser'=>$id));		
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		    $row['inserir']    = '<input style="cursor:pointer" value="1" type="checkbox" '.(($row['inserir'] == 1)?'checked':'').' id="'.$row['idpermissao'].'-inserir" name="'.$row['idpermissao'].'-inserir">';
		    $row['alterar']    = '<input style="cursor:pointer" value="1" type="checkbox" '.(($row['alterar'] == 1)?'checked':'').' id="'.$row['idpermissao'].'-alterar" name="'.$row['idpermissao'].'-alterar">';
		    $row['apagar']     = '<input style="cursor:pointer" value="1" type="checkbox" '.(($row['apagar'] == 1)?'checked':'').'   id="'.$row['idpermissao'].'-apagar"  name="'.$row['idpermissao'].'-apagar">';
		    $row['visualizar'] = '<input style="cursor:pointer" value="1" type="checkbox" '.(($row['visualizar'] == 1)?'checked':'').' id="'.$row['idpermissao'].'-visualizar" name="'.$row['idpermissao'].'-visualizar">';		
			//$row['idpermissao'] = '<input id="'.$row['idpermissao'].'-id" name"'.$row['idpermissao'].'-id" type="hidden" value="'.$row['idpermissao'].'">';
			$linhas[] = $row;
		}
		$data = array();
		$data['data'] = $linhas;				
	    echo json_encode($data);
	}	
	
	if ($action == 'list'){	
		$result = table_select($table,'iduser,nome,email,login,dtcriacao');		
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
			$row['dtcriacao'] = date("d/m/Y H:i:s", strtotime($row['dtcriacao']));
			$linhas[] = $row;
		}
		$data = array();
		$data['data'] = $linhas;				
	    echo json_encode($data);
	}
	
	if ($action == 'sel'){
		$result = table_select($table,'nome,email,login',array('iduser'=>$id));
        $row = mysqli_fetch_object($result);
	    echo json_encode($row);
	}	
	
	if ($action == 'insert'){	
		if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
			$values['image'] = $image;
		}		
		$values['dtcriacao'] = date("Y-m-d H:i:s", time());
		$values['senha'] = md5($values['senha']);		
		//$date = "'".date('Y-m-d H:i:s', strtotime(str_replace('-', '/', $_POST['date'])))."'";
		
	    if (table_insert($table, $values, $gn_id, $response) == true){
			gerapermissao($gn_id);
		}
		echo json_encode($response);  
	}	
	
	if ($action == 'edt'){	
		if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
			$image = addslashes(file_get_contents($_FILES['image']['tmp_name'])); 
			$values['image'] = $image;
		}		
		if (isset($values['senha'])){
			$values['senha'] = md5($values['senha']);
		}
		table_update($table, $values, array('iduser'=>$id), $response);
	    echo json_encode($response);
	}	
	
	if ($action == 'del'){
		table_delete($table, array('iduser'=>$id), $response);
	    echo json_encode($response);
	}	
?>