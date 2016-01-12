<?php
//header('Content-Type: text/html; charset=utf-8');

include 'constants.php';

function linkbase(){
	return mysqli_connect(SERVER,USER,PASSWORD,DATABASE);

	if (mysqli_connect_errno()){
		echo "Não foi possível conectar a base de dados: " . mysqli_connect_error();		
	}
}	

?>