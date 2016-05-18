<?php
function createform($title, $formid, $content){
	return 
	"<div class='alert alert-success' style='display: none' id='alertsucess'>
	  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	  <strong>Sucesso!</strong> 
	  <span></span>
	</div>	

	<div class='alert alert-danger' style='display: none' id='alerterror'>
	  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
	  <strong>Erro!</strong> 
	  <span></span>
	</div>	
	<div class='panel panel-primary'>
	<div class='panel-heading'><h4>$title</h4></div>
		<div class='panel-body'>
			<form class='form-horizontal' role='form' id='$formid' data-toggle='validator' method='post' enctype='multipart/form-data'>
			$content			
			</form>	
		</div>
	</div>";
}

function createlabel($label,$field,$content){
	return
	"<div class='form-group'>
	<label class='control-label col-sm-2' for='$field'>$label</label>
		<div class='col-xs-5'>
		$content
		</div>
	</div>";
}

function createinputtext($id, $name, $required = false,  $autofocus = false, $disabled = false, $placeholder = ''){
	return 
	"<input type='text' class='form-control' id='$id' name='$name' placeholder='$placeholder' ".($required ? "required":"")." ".($autofocus ? "autofocus":" ")." ".($disabled ? "disabled":" ").">";
}

function createinputemail($id, $name, $required = false,  $autofocus = false, $disabled = false, $placeholder = ''){
	return 
	"<input type='email' class='form-control' id='$id' name='$name' placeholder='$placeholder' ".($required ? "required":"")." ".($autofocus ? "autofocus":" ")." ".($disabled ? "disabled":" ").">";
}
function createtextarea($id, $name, $required = false,  $autofocus = false, $disabled = false, $placeholder = ''){
	return 
	"<textarea class='form-control' id='$id' rows='5' name='$name' placeholder='$placeholder' ".($required ? "required":"")." ".($autofocus ? "autofocus":" ")." ".($disabled ? "disabled":" ")."></textarea>";
}
function createradiobox($id, $name, $values, $required = false,  $disabled = false){
	$data = '';
	foreach($values as $key => $value){
		$data .= "<label class='radio-inline'><input type='radio' value='$key' id='$id' name='$name'  ".($required ? "required":"")."  ".($disabled ? "disabled":" ").">$value</label>";
	}
	return $data;
}
function createcheckbox($id, $name, $value, $required = false,  $disabled = false){
	return 
	"<input type='checkbox' value='$value' id='$id' name='$name'  ".($required ? "required":"")."  ".($disabled ? "disabled":" ").">";
}

function createdate($id, $name, $required = false,  $disabled = false, $current = false, $hour = false){
	return 
	"<div class='input-group date' id='".$id."_div'>
		<input type='text' class='form-control' id='$id' name='$name' ".($required ? "required":"")."  ".($disabled ? "disabled":" ")." />
		<span class='input-group-addon'>
			<span class='glyphicon glyphicon-calendar'></span>
		</span>
	</div>
	<script type='text/javascript'>
            $(function () {
                $('#".$id."_div').datetimepicker({
					locale: 'pt-br'
					".($hour ? ",format: 'DD/MM/YYYY HH:mm:ss'":",format: 'DD/MM/YYYY'")."
					".($current ? ",defaultDate: new Date()":"")."
				});
            });
    </script>";
}

function createhour($id, $name, $required = false,  $disabled = false, $current = false){
	return 
	"<div class='input-group date' id='".$id."_div'>
		<input type='text' class='form-control' id='$id' name='$name' ".($required ? "required":"")."  ".($disabled ? "disabled":" ")." />
		<span class='input-group-addon'>
			<span class='glyphicon glyphicon-time'></span>
		</span>
	</div>
	<script type='text/javascript'>
            $(function () {
                $('#".$id."_div').datetimepicker({
					locale: 'pt-br',
					format: 'HH:mm:ss'
					".($current ? ",defaultDate: new Date()":"")."
				});
            });
    </script>";
}
function createselect($id, $name, $values, $required,  $disabled, $placeholder){
	$data = "<select class='form-control' id='$id' name='$name' placeholder='$placeholder' ".($required ? "required":"")."  ".($disabled ? "disabled":" ").">";
	foreach($values as $key => $value){
		$data .= "<option value='$key'>$value</option>";
	}
	$data .= "</select>";
	return $data;	
}
function createbuttons($insert = false, $edit = false, $delete = false, $modal = false){
	return 
	"<div class='form-group'> 
		<div class='col-sm-offset-2 col-sm-10'>
		    ".($insert ? "<button type='submit' class='btn btn-primary'>Salvar</button>":"")."			
			".($edit ? "<button id='btnEdit' type='button' class='btn btn-primary'>Salvar</button>":"")."
			".($delete ? "<button id='btnDelete' type='button' class='btn btn-danger'>Confirmar</button>":"")."
			".($modal ? "<button id='btnfechar' type='button' class='btn btn-default' >Fechar</button>":"")."
		</div>
	</div>";
}	

function getjscad($idform, $action){
	return 
	"<script type='text/javascript'>
		$(document).ready(function(){
			var idform = '#$idform';
			$(idform).validator().on('submit', function (e) {		
				e.preventDefault(); 
				$(idform).validator('validate');		
				if ($('.has-error').length == 0){
					var formData = new FormData($(idform)[0]);
					$.ajax({
						type: 'POST',
						dataType: 'json', 
						async: false,
						url: '$action',
						data: formData,
						processData: false,  
						contentType: false,				
						success: function (response) {			
							mensagem(response);
							$(idform).trigger('reset');
						}
					});		
				}
			}); 
		});
	</script> ";	
}

function getjsedt($idform, $action){
	return 
	"<script type='text/javascript'>
		$(document).ready(function(){			
			var idform = '#$idform';
			$('#btnEdit').on('click', function () {	
				$(idform).validator('validate');
				if ($('.has-error').length == 0){
					var formData = new FormData($(idform)[0]);
					$.ajax({
						type: 'POST',
						dataType: 'json', 
						async: false,
						url: '$action',
						data: formData,
						processData: false,  
						contentType: false,				
						success: function (response) {			
							mensagem(response);					
						}
					});				
				}	
			}); 
		});	
	</script> ";	
}

function getjsdel($idform, $action){
	return 
	"<script type='text/javascript'>
		$(document).ready(function(){			
			var idform = '#$idform';
			$('#btnDelete').on('click', function () {	
				$.ajax({
					type: 'POST',
					dataType: 'json', 
					async: false,
					url: '$action',
					success: function (response) {
						mensagem(response);
					}			
				});	
			});	
		});	
	</script> ";	
}

function getjsclose($url){
	return 
	"<script type='text/javascript'>
		$(document).ready(function(){			
			$('#btnfechar').on('click', function () {	
				$('#main').load('$url');
			});	
		});	
	</script> ";	
}

function getfields($idform, $action){
	return 
	"<script type='text/javascript'>
		$(document).ready(function(){
			var idform = '#$idform';	
			$.getJSON('$action', function(result){
				$.each(result, function(i, field){				
					$(idform+' #'+i).val(field);
				});
			});							
		});
	</script> ";	
}

class Form{
	private $title = '';
	private $id = '';
	private $content = '';
	private $action = '';
	private $table = '';
	private $key = '';
	private $type = '';
	private $modal = true;
	private $cod = 0;
	private $baseurl = 'http://localhost/Portal/';
	private $redirect = 'index.php';
	private $fields = array();
	private $firstfields = '';
	private $afterfields = '';
	private $insert = false;
	private $edit = false;
	private $delete = false;
	
	function Form($title, $table, $get, $redirect = ''){
		$this->title = $title;
		$this->table = $table;
		
		if (isset($get['cod'])){
			$this->cod = $get['cod']; 
		}	
		if (isset($get['type'])){
			$this->type = $get['type']; 
		}	
		if (isset($get['modal'])){
			$this->modal = (($get['modal'] == 'true')? true: false); 
		}			
		$this->redirect = $redirect; 
	}
	public function show(){
		if($this->type == 'insert'){
			$this->title = 'Inserir '.$this->title;
			return $this->showinsert();
		}
		if($this->type == 'edit'){
			$this->title = 'Alterar '.$this->title;
			return $this->showedit($this->cod);
		}
		if($this->type == 'delete'){
			$this->title = 'Apagar '.$this->title;
			return $this->showdelete($this->cod);
		}
		if($this->type == 'show'){
			return $this->showRecord($this->cod);
		}	
	}
	
	private function showinsert(){
		$content = '';
		$this->refresh();
		$this->insert = true;
		$this->action = "core/pessoa/db.php?action=insert&table=$this->table";
		$this->id = 'frmins'.$this->table;		
		$content .= getjscad($this->id, $this->action);
		$content .= $this->create($this->id); 
		$content .= getjsclose($this->baseurl.$this->redirect);			
		return $content;
	}
	private function showedit($cod){
		$content = '';
		$this->refresh(); 
		$this->edit = true;
		$this->action = "core/pessoa/db.php?action=update&table=$this->table&id=$cod&key=$this->key";
		$this->id = 'frmedt'.$this->table;				
		$content .= $this->create($this->id); 	
		$content .= getfields($this->id, "core/pessoa/db.php?action=select&table=$this->table&id=$cod&key=$this->key");
		$content .= getjsedt($this->id, $this->action);		
		$content .= getjsclose($this->baseurl.$this->redirect);			
		return $content;
	}	
	private function showdelete($cod){
		$content = '';
		$this->refresh();
		$this->delete = true;
		$this->disabledall();
		$this->clearall();
		$this->action = "core/pessoa/db.php?action=delete&table=$this->table&id=$cod&key=$this->key";
		$this->id = 'frmedt'.$this->table;				
		$content .= $this->create($this->id); 	
		$content .= getfields($this->id, "core/pessoa/db.php?action=select&table=$this->table&id=$cod&key=$this->key");
		$content .= getjsdel($this->id, $this->action);			
		$content .= getjsclose($this->baseurl.$this->redirect);			
		return $content;
	}	
	
	private function showRecord($cod){
		$content = '';
		$this->refresh();
		$this->disabledall();
		$this->clearall();
		$this->action = "";
		$this->id = 'frmsel'.$this->table;				
		$content .= $this->create($this->id); 	
		$content .= getfields($this->id, "core/pessoa/db.php?action=select&table=$this->table&id=$cod&key=$this->key");
		$content .= getjsclose($this->baseurl.$this->redirect);			
		return $content;
	}		
	
	private function create($id){
		$this->id = $id;
		$this->content .= $this->firstfields;
		$this->content .= $this->createfields();
		$this->content .= $this->afterfields;
		$this->content .= $this->createbuttons();
		return createform($this->title, $this->id, $this->content);
	}

	public function setfirstfields($firstfields){
		$this->firstfields = $firstfields;
	}
	public function setafterfields($afterfields){
		$this->afterfields = $afterfields;
	}	
	public function setredirect($url){
		$this->redirect = $url;
	}	
	public function addfield($ord, $field){
		$this->fields[$ord] = $field;
	}
	private function refresh(){
		$this->content = '';
		$this->insert = false;
		$this->edit = false;
		$this->delete = false;		
	}	
	private function disabledall(){
		foreach($this->fields as $key => $value){
			$value->disabled = true;
		}
	}		
	
	private function clearall(){
		foreach($this->fields as $key => $value){
			$value->required = false;
			$value->placeholder = '';
		}
	}	
	private function createfield($field){
		switch ($field->tipo) {
			case 'text':
				return createinputtext($field->id, $field->name, $field->required,  $field->autofocus, $field->disabled, $field->placeholder);
			break; 
			case 'email':
				return createinputemail($field->id, $field->name, $field->required,  $field->autofocus, $field->disabled, $field->placeholder);
			break;
			case 'textarea'	:
				return createtextarea($field->id, $field->name, $field->required,  $field->autofocus, $field->disabled, $field->placeholder);
			break; 
			case 'checkbox'	:
				return  createcheckbox($field->id, $field->name, $field->value, $field->required,  $field->disabled);
			break; 
			case 'radiobox'	:
				return  createradiobox($field->id, $field->name, $field->values, $field->required,  $field->disabled);
			break; 	
			case 'select'	:
				return  createselect($field->id, $field->name, $field->values, $field->required,  $field->disabled, $field->placeholder);
			break; 	
			case 'date'	:
				return  createdate($field->id, $field->name, $field->required,  $field->disabled, $field->current, $field->hour);
			break; 				
			case 'hour'	:
				return  createhour($field->id, $field->name, $field->required,  $field->disabled, $field->current);
			break; 			
		}		
	}	
	private function createfields(){		
		$fields = '';
		foreach($this->fields as $key => $value){
			if (!(($this->insert == true)&&($value->key == true))){
				$input = '';
				$input = $this->createfield($value);
				$fields = $fields.createlabel($value->label,$value->name, $input);
			}
		}
		return $fields;
	}
	private function createbuttons(){
		return createbuttons($this->insert, $this->edit, $this->delete, $this->modal);
	}
	public function newText($name, $label, $required = false, $autofocus = false, $placeholder = '', $disabled = false){
		$field = new Field;		
		$field->tipo = 'text';
		$field->id = $name;
		$field->name = $name;
		$field->label = $label;
		$field->required = $required; 
		$field->autofocus = $autofocus;
		$field->placeholder = $placeholder;
		$field->disabled = $disabled;
		array_push($this->fields, $field);
	}
	public function newTextArea($name, $label, $required = false, $autofocus = false, $placeholder = '', $disabled = false){
		$field = new Field;		
		$field->tipo = 'textarea';
		$field->id = $name;
		$field->name = $name;
		$field->label = $label;
		$field->required = $required; 
		$field->autofocus = $autofocus;
		$field->placeholder = $placeholder;
		$field->disabled = $disabled;
		array_push($this->fields, $field);
	}	
	public function newCheckbox($name, $label, $value, $required = false, $disabled = false){
		$field = new Field;		
		$field->tipo = 'checkbox';
		$field->id = $name;
		$field->name = $name;
		$field->label = $label;
		$field->required = $required; 
		$field->autofocus = false;
		$field->placeholder = '';
		$field->disabled = $disabled;
		$field->value = $value;
		array_push($this->fields, $field);
	}
	public function newRadiobox($name, $label, $values, $required = false, $disabled = false){
		$field = new Field;		
		$field->tipo = 'radiobox';
		$field->id = $name;
		$field->name = $name;
		$field->label = $label;
		$field->required = $required; 
		$field->autofocus = false;
		$field->placeholder = '';
		$field->disabled = $disabled;
		$field->values = $values;
		array_push($this->fields, $field);
	}	
	public function newSelect($name, $label, $values, $required = false, $disabled = false, $placeholder = ''){
		$field = new Field;		
		$field->tipo = 'select';
		$field->id = $name;
		$field->name = $name;
		$field->label = $label;
		$field->required = $required; 
		$field->autofocus = false;
		$field->placeholder = $placeholder;
		$field->disabled = $disabled;
		$field->values = $values;
		array_push($this->fields, $field);
	}	
	public function newDate($name, $label, $required = false, $disabled = false, $current = false, $hour = false){
		$field = new Field;		
		$field->tipo = 'date';
		$field->id = $name;
		$field->name = $name;
		$field->label = $label;
		$field->required = $required; 
		$field->autofocus = false;
		$field->disabled = $disabled;
		$field->current = $current;
		$field->hour = $hour;		
		array_push($this->fields, $field);
	}	
	public function newHour($name, $label, $required = false, $disabled = false, $current = false){
		$field = new Field;		
		$field->tipo = 'hour';
		$field->id = $name;
		$field->name = $name;
		$field->label = $label;
		$field->required = $required; 
		$field->autofocus = false;
		$field->disabled = $disabled;
		$field->current = $current;	
		array_push($this->fields, $field);
	}	
	public function newKey($name, $label){
		$field = new Field;		
		$field->tipo = 'text';
		$field->id = $name;
		$this->key = $name;
		$field->name = 'key_'.$name;
		$field->key = true;
		$field->label = $label;	
		$field->disabled = true;
		array_push($this->fields, $field);
	}	
}	

class Field{
	public $tipo; 
	public $id; 
	public $name = '';
	public $label = '';
	public $key = false;
	public $required = false;
	public $autofocus = false;
	public $placeholder = '';	
	public $disabled = false;
	public $value = null;
	public $values = array();
	public $current = false;
	public $hour = false;
}	


$form = new Form('Teste','teste',$_GET);	
$form->newKey('codigo', 'Código');
$form->newText('descricao', 'Descrição', true, false, 'Digite a descrição');
$form->newTextArea('observacao', 'Observacao');
$form->newCheckbox('concorda', 'Concorda', '1');
$form->newRadiobox('sexo', 'Sexo', array('M'=>'Masculino','F'=>'Feminino'));
$form->newSelect('estado', 'Estado Civil', array(''=>'','S'=>'Solteiro','C'=>'Casado','V'=>'Viúvo'), true, false, 'Digite aqui');
$form->newDate('data', 'Data', false, true, true, true);
$form->newHour('hora', 'Hora', false, true, true);
echo $form->show();

?>