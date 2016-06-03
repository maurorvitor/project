<?php
	include '../data/query.php';	

	$qryTeste = new Dataquery($_GET, $_POST, $_FILES);
	$qryTeste->dates = array('data');
	//closure
	// $qryTeste->beforeinsert = function(){
		// global $qryTeste; 
		// $qryTeste->formatdate('data');
		//$qryTeste->values['data'] = date("Y-m-d H:i:s", strtotime(str_replace('/', '-', $qryTeste->values['data'])));
		//$date =  new DateTime(str_replace('/', '-',$qryTeste->values['data']));
		//$qryTeste->values['data'] = $date->date_timestamp_get();
		//print_r($qryTeste->values);
		//return processmsg(true, 'Registro inserido com sucesso!');
	//};	
	$qryTeste->onlist = function(){
		global $qryTeste;
		$field = new Field;		
		$field->id = 'codigo';
		$field->name = 'codigo';
		//$qryTeste->formatvalue('sexo', array(''=>'','M'=>'Masculino','F'=>'Feminino'));
		//$qryTeste->formatvalue('estado', array(''=>'','S'=>'Solteiro','C'=>'Casado','V'=>'Viúvo'));
		//$qryTeste->formatvalue('concorda', array(''=>'','S'=>'Sim','N'=>'Não'));
		
	};	
	$qryTeste->execute();	
	echo $qryTeste->json;
?>