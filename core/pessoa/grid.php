<?php
	
include 'core/data/grid.php';	

$consultateste = new Grid('gdbTeste', 'core/pessoa/query.php?action=list&table=teste', 'Consulta Teste');
$consultateste->setrowid('codigo');
$consultateste->add_data('codigo', 'Código');
$consultateste->add_data('descricao', 'Descrição');
$consultateste->add_data('sexo', 'Sexo');
// $consultateste->add_data('estado', 'Estado');
// $consultateste->add_data('concorda', 'Concorda');
// $consultateste->add_data('data', 'Data');
// $consultateste->add_data('hora', 'Hora');
//$consultateste->newrecord('core/pessoa/form.php?type=insert');
//$consultateste->setoptions($select, $multi, $colvis, $save, $pdf, $excel, $print, $paging, $order, $info, $search);
$consultateste->setoptions(false, false, false, false, false, false, false, false, true, false, false);
// $consultateste->createfilter('mdlteste', 'Filtrar Registros', 'fltTeste', 'btnokfilter');
// $consultateste->add_filter('codigo', 'Código', 'number', 'integer');
// $consultateste->add_filter('descricao', 'Descrição', 'text');
// $consultateste->add_filter('data', 'Data', 'date');
// $consultateste->add_recordbtn('search','core/pessoa/form.php?type=show');
// $consultateste->add_recordbtn('edit','core/pessoa/form.php?type=edit');
// $consultateste->add_recordbtn('trash','core/pessoa/form.php?type=delete');
echo $consultateste->show();
	
?>