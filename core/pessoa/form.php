<?php
include '../data/form.php';	

$form = new Form('Teste','teste',$_GET,'core/pessoa/query.php', 'index.php?page=teste');	
//$form->newHidden('codigo');
$form->newKey('codigo', 'Código');
$form->newText('descricao', 'Descrição', true, false, 'Digite a descrição');
$form->newTextArea('observacao', 'Observacao');
//$form->newCheckbox('concorda', 'Concorda');
$form->newSelect('concorda', 'Concorda', array(''=>'','S'=>'Sim','N'=>'Não'));
$form->newRadiobox('sexo', 'Sexo', array('M'=>'Masculino','F'=>'Feminino'));
//$form->newTab('home','Principal', true);
$form->newSelect('estado', 'Estado Civil', array(''=>'','S'=>'Solteiro','C'=>'Casado','V'=>'Viúvo'));
$form->newLookup('userid', 'Usuário','user', array('iduser','nome'));
$form->newDate('data', 'Data', false, false, true, false);
$form->newHour('hora', 'Hora', false, false, true);
//$form->newAction('acao', 'Ação', true, false, 'Digite a descrição', false, '','Buscar','acao');
//$form->newImg('src_img_arquivo','Imagem');
//$form->newFile('img_arquivo', '', 'Abrir', '.gif,.jpg,.png');
$form->newImgFile('img_arquivo', 'Imagem');
//$form->newTab('add','Adicionais');
echo $form->show();

?>