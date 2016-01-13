<?php
	include '../core/data/dblib.php';
	$iduser = 0;
	if (isset($_GET['iduser'])){
		$iduser = $_GET['iduser']; 
		
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
?>