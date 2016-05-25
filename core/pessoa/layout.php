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
function createaction($id, $name, $required,  $autofocus, $disabled, $placeholder, $mask, $button, $action){
	$data = "<div class='input-group'><input type='text' class='form-control' id='$id' name='$name' placeholder='$placeholder' ".($required ? "required":"")." ".($autofocus ? "autofocus":" ")." ".($disabled ? "disabled":" ").">";
	$data.= "<span class='input-group-btn'><button class='btn btn-default' type='button' id='btn_".$id."'>$button</button></span></div>";
	if ($mask != ''){
		$data.= "<script type='text/javascript'>$('#$id').mask('$mask'); $action </script>";
	}
	return $data;
}

function createinputtext($id, $name, $required,  $autofocus, $disabled, $placeholder, $mask){
	$data = "<input type='text' class='form-control' id='$id' name='$name' placeholder='$placeholder' ".($required ? "required":"")." ".($autofocus ? "autofocus":" ")." ".($disabled ? "disabled":" ").">";
	if ($mask != ''){
		$data.= "<script type='text/javascript'>$('#$id').mask('$mask');</script>";
	}
	return $data;
}
function createhidden($id, $name){
	return 
	"<input type='hidden' class='form-control' id='$id' name='$name'>";
}
function createimg($id, $name, $src){
	return 
	"<img src='$src' alt='imagem' class='img-thumbnail' width='96' height='96' id='$id' name='$name'>";
}
function createinputemail($id, $name, $required,  $autofocus, $disabled, $placeholder){
	return 
	"<input type='email' class='form-control' id='$id' name='$name' placeholder='$placeholder' ".($required ? "required":"")." ".($autofocus ? "autofocus":" ")." ".($disabled ? "disabled":" ").">";
}
function createtextarea($id, $name, $required,  $autofocus, $disabled, $placeholder){
	return 
	"<textarea class='form-control' id='$id' rows='5' name='$name' placeholder='$placeholder' ".($required ? "required":"")." ".($autofocus ? "autofocus":" ")." ".($disabled ? "disabled":" ")."></textarea>";
}
function createradiobox($id, $name, $values, $required,  $disabled){
	$data = '';
	foreach($values as $key => $value){
		$data .= "<label class='radio-inline'><input type='radio' value='$key' id='$id' name='$name'  ".($required ? "required":"")."  ".($disabled ? "disabled":" ").">$value</label>";
	}
	return $data;
}
function createcheckbox($id, $name, $value, $required,  $disabled){
	return 
	"<input type='checkbox' value='$value' id='$id' name='$name'  ".($required ? "required":"")."  ".($disabled ? "disabled":" ").">";
}

function createdate($id, $name, $required, $disabled, $current, $hour){
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

function createhour($id, $name, $required, $disabled, $current){
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
	$data = "<select class='selectpicker form-control' id='$id' name='$name' ".($required ? "required":"")."  ".($disabled ? "disabled":" ").">";
	foreach($values as $key => $value){
		$data .= "<option value='$key'>$value</option>";
	}
	$data .= "</select><script type='text/javascript'> $('#$id').selectpicker('refresh'); </script>	";
	return $data;	
}
function createtab($name, $label, $active, $content){
	return "<div id='$name' class='tab-pane fade in ".($active?"active":"")."'><br>$content<br></div>";	
}
function createlookup($id, $name, $table, $fields, $required,  $disabled){
	$data = "<select class='selectpicker form-control' data-live-search='true' id='$id' name='$name' ".($required ? "required":"")."  ".($disabled ? "disabled":" ").">";
    $data .= "<option value=''></option>";	
	$data .= "</select>
	<script type='text/javascript'>			
			$.getJSON('core/data/lookup.php?table=$table&fields=$fields', function(result){
				$.each(result, function(i, val){		
					 $('#$id').append('<option value=\''+val.id+'\' title=\''+val.value+'\' data-tokens=\''+val.list+'\'>'+val.list+'</option>');
					 $('#$id').selectpicker('refresh');
				});
			});			
	</script>";
	return $data;	
}
function createfile($id, $name, $button, $accept, $required,  $disabled){
  return "<span class='btn btn-primary btn-file'> $button <input type='file' id='$id' name='$name' accept='$accept' ".($required ? "required":"")."  ".($disabled ? "disabled":" ")."></span>";	
}
function createbuttons($insert = false, $edit = false, $delete = false, $close = false){
	return 
	"<div class='form-group'> 
		<div class='col-sm-offset-2 col-sm-10'>
		    ".($insert ? "<button type='submit' class='btn btn-primary'>Salvar</button>":"")."			
			".($edit ? "<button id='btnEdit' type='button' class='btn btn-primary'>Salvar</button>":"")."
			".($delete ? "<button id='btnDelete' type='button' class='btn btn-danger'>Confirmar</button>":"")."
			".($close ? "<button id='btnfechar' type='button' class='btn btn-default' >Fechar</button>":"")."
		</div>
	</div>";
}	

class Form{
	private $title = '';
	private $id = '';
	private $content = '';
	private $action = '';
	private $table = '';
	private $key = '';
	private $type = '';
	private $close = true;
	private $cod = 0;
	private $baseurl = 'http://localhost/Portal/';
	private $redirect = 'index.php';
	private $fields = array();
	private $firstfields = '';
	private $afterfields = '';
	private $insert = false;
	private $edit = false;
	private $delete = false;
	private $titletabs = '';
	
	private function getjscad($action){
		return 
		"<script type='text/javascript'>

				var idform = '#$this->id';
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

		</script> ";	
	}

	private function getjsedt($action){
		return 
		"<script type='text/javascript'>
		
				var idform = '#$this->id';
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

		</script> ";	
	}

	private function getjsdel($action){
		return 
		"<script type='text/javascript'>
		
				var idform = '#$this->id';
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

		</script> ";	
	}

	private function getjsclose($url){ 
		$data = '';
		if ($this->close == true){
			$data = "<script type='text/javascript'>
		
					$('#btnfechar').on('click', function () {	
						window.open('$url','_self');
					});	

			</script> ";
		}
		return $data;
	}

	private function getfields($action){
		return 
		"<script type='text/javascript'>

				var idform = '#$this->id';	
				$.getJSON('$action', function(result){
					$.each(result, function(i, field){	
						if ($(idform+' #'+i).is(':radio')) {
							$(idform+' #'+i+'[value=\"'+field+'\"]').prop('checked',true);	
						}else
						if ($(idform+' #'+i).is(':checkbox')) {
							$(idform+' #'+i+'[value=\"'+field+'\"]').prop('checked',true);	
						}else
						if ($(idform+' #'+i).is('select')) {
							$(idform+' #'+i).val(field);
							$(idform+' #'+i).selectpicker('render');
						}else{
							$(idform+' #'+i).val(field).change();
						}
					});
				});							
		
		</script> ";	
	}	
	
	function Form($title, $table, $get, $redirect = ''){
		$this->title = $title;
		$this->table = $table;
		
		if (isset($get['cod'])){
			$this->cod = $get['cod']; 
		}	
		if (isset($get['type'])){
			$this->type = $get['type']; 
		}	
		if (isset($get['close'])){
			$this->close = (($get['close'] == 'true')? true: false); 
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
		$content .= $this->getjscad($this->action);
		$content .= $this->create($this->id); 
		$content .= $this->getjsclose($this->baseurl.$this->redirect);			
		return $content;
	}
	private function showedit($cod){
		$content = '';
		$this->refresh(); 
		$this->edit = true;
		$this->action = "core/pessoa/db.php?action=update&table=$this->table&id=$cod&key=$this->key";
		$this->id = 'frmedt'.$this->table;				
		$content .= $this->create($this->id); 	
		$content .= $this->getfields("core/pessoa/db.php?action=select&table=$this->table&id=$cod&key=$this->key");
		$content .= $this->getjsedt($this->action);		
		$content .= $this->getjsclose($this->baseurl.$this->redirect);			
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
		$content .= $this->getfields("core/pessoa/db.php?action=select&table=$this->table&id=$cod&key=$this->key");
		$content .= $this->getjsdel($this->id, $this->action);			
		$content .= $this->getjsclose($this->baseurl.$this->redirect);			
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
		$content .= $this->getfields("core/pessoa/db.php?action=select&table=$this->table&id=$cod&key=$this->key");
		$content .= $this->getjsclose($this->baseurl.$this->redirect);			
		return $content;
	}		
	
	private function create($id){
		$this->id = $id;
		$this->content .= $this->firstfields;
		$this->content .= $this->get_tab($this->titletabs);
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
				return createinputtext($field->id, $field->name, $field->required,  $field->autofocus, $field->disabled, $field->placeholder, $field->mask);
			break; 
			case 'action':
				return createaction($field->id, $field->name, $field->required,  $field->autofocus, $field->disabled, $field->placeholder, $field->mask, $field->button, $field->action);
			break;			
			case 'hidden':
				return createhidden($field->id, $field->name);
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
			case 'lookup':
				return  createlookup($field->id, $field->name, $field->table, $field->fields, $field->required,  $field->disabled);
			break;
			case 'file':
				return  createfile($field->id, $field->name, $field->button, $field->accept, $field->required,  $field->disabled);
			break;			
			case 'img':
				return  createimg($field->id, $field->name, $field->src);
			break;			
		}		
	}	
	private function createfields(){		
		$tab = '';
		$fields = '';
		foreach($this->fields as $key => $value){
			if (!(($this->insert == true)&&($value->key == true))){
				$input = '';
				if ($value->tipo == 'tab'){
					$tab .= createtab($value->name, $value->label, $value->active, $fields);
					$fields = '';
				}else{				
					$input = $this->createfield($value);
					$fields .= createlabel($value->label,$value->name, $input);
				}
			}
		}
		$tab =(($tab!='')?"<div class='tab-content'>$tab</div>":"");
		return $tab.$fields;
	}
	private function createbuttons(){
		return createbuttons($this->insert, $this->edit, $this->delete, $this->close);
	}
	public function newText($name, $label, $required = false, $autofocus = false, $placeholder = '', $disabled = false, $mask = ''){
		$field = new Field;		
		$field->tipo = 'text';
		$field->id = $name;
		$field->name = $name;
		$field->label = $label;
		$field->required = $required; 
		$field->autofocus = $autofocus;
		$field->placeholder = $placeholder;
		$field->disabled = $disabled;
		$field->mask = $mask;
		array_push($this->fields, $field);
	}
	public function newImg($name, $label, $src){
		$field = new Field;		
		$field->tipo = 'img';
		$field->id = $name;
		$field->name = $name;
		$field->label = $label;
		$field->src = $src;
		array_push($this->fields, $field);
	}	
	public function newAction($name, $label, $required = false, $autofocus = false, $placeholder = '', $disabled = false, $mask = '', $button = '', $action = ''){
		$field = new Field;		
		$field->tipo = 'action';
		$field->id = $name;
		$field->name = $name;
		$field->label = $label;
		$field->required = $required; 
		$field->autofocus = $autofocus;
		$field->placeholder = $placeholder;
		$field->disabled = $disabled;
		$field->mask = $mask;
		$field->button = $button;
		$field->action = $action;
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
	public function newSelect($name, $label, $values, $required = false, $disabled = false){
		$field = new Field;		
		$field->tipo = 'select';
		$field->id = $name;
		$field->name = $name;
		$field->label = $label;
		$field->required = $required; 
		$field->autofocus = false;
		$field->disabled = $disabled;
		$field->values = $values;
		array_push($this->fields, $field);
	}
	public function newLookup($name, $label, $table, $fields, $required = false, $disabled = false){
		$field = new Field;		
		$field->tipo = 'lookup';
		$field->id = $name;
		$field->name = $name;
		$field->label = $label;
		$field->required = $required; 
		$field->disabled = $disabled;
		$field->table = $table;
		$field->fields = implode(',',$fields);
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
	public function newHidden($name){
		$field = new Field;		
		$field->tipo = 'hidden';
		$field->id = $name;
		$this->key = $name;
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
	public function newFile($name, $label, $button, $accept, $required = false, $disabled = false){
		$field = new Field;		
		$field->tipo = 'file';
		$field->id = $name;
		$field->name = $name;
		$field->label = $label;	
		$field->disabled = $disabled;
		$field->required = $required;
		$field->button = $button;
		$field->accept = $accept;
		array_push($this->fields, $field);
	}	
	public function newTab($name, $label, $active = false){
		$field = new Field;		
		$field->tipo = 'tab';
		$field->id = $name;
		$field->name = $name;
		$field->label = $label;	
		$field->active = $active;
		array_push($this->fields, $field);
		$this->titletabs .= "<li ".($active?"class='active'":"")."><a data-toggle='tab' href='#$name'>$label</a></li>";		
	}
	public function get_tab($content){
		return (($content != '')? "<ul class='nav nav-tabs'>$content</ul>":"");
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
	public $active = false;
	public $table = '';
	public $fields = '';
	public $mask = '';
	public $button = '';
	public $action = '';
	public $accept = '';
	public $src = '';
}	


$form = new Form('Teste','teste',$_GET,'index.php?page=teste');	
//$form->newHidden('codigo');
$form->newKey('codigo', 'Código');
$form->newText('descricao', 'Descrição', true, false, 'Digite a descrição');
$form->newTextArea('observacao', 'Observacao');
$form->newCheckbox('concorda', 'Concorda', '1');
$form->newRadiobox('sexo', 'Sexo', array('M'=>'Masculino','F'=>'Feminino'));
//$form->newTab('home','Principal', true);
$form->newSelect('estado', 'Estado Civil', array(''=>'','S'=>'Solteiro','C'=>'Casado','V'=>'Viúvo'));
$form->newLookup('userid', 'Usuário','user', array('iduser','nome'));
$form->newDate('data', 'Data', false, false, true, false);
$form->newHour('hora', 'Hora', false, false, true);
//$form->newAction('acao', 'Ação', true, false, 'Digite a descrição', false, '','Buscar','acao');
$form->newFile('file_arquivo', 'Imagem', 'Abrir', '.gif,.jpg,.png');
//$form->newImg('arquivo','Imagem', '');
//$form->newTab('add','Adicionais');
echo $form->show();

?>