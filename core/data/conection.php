<?php
//header('Content-Type: text/html; charset=utf-8');

include 'constants.php';

function linkbase(){
	try {
		return  new PDO("mysql:host=".SERVER.";dbname=".DATABASE.";charset=utf8", USER, PASSWORD);	
	//mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
	} catch (PDOException $e) {
		echo "Não foi possível conectar a base de dados: " . $e->getMessage();		
	}
}	

?>