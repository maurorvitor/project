<?php
include 'dblib.php';		

$table = '';	
if (isset($_GET['table'])){
	$table = $_GET['table']; 
}
$fields = '';
if (isset($_GET['fields'])){
	$fields = $_GET['fields']; 
}	
$result = table_select($table,$fields,array());	
$data = array();
while ($row = $result->fetch(PDO::FETCH_NUM)){
	$data[] = ['id'=>$row[0],'value'=>$row[1],'list'=>implode(' , ',$row)];
}		
echo json_encode($data);	
?>