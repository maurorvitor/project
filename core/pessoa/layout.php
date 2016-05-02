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
	<div class='panel panel-default'>
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

function createbuttons($insert = false, $edit = false, $delete = false){
	return 
	"<div class='form-group'> 
		<div class='col-sm-offset-2 col-sm-10'>
		    ".($insert ? "<button type='submit' class='btn btn-primary'>Salvar</button>":"")."			
			".($edit ? "<button id='btnEdit' type='button' class='btn btn-primary'>Salvar</button>":"")."
			".($delete ? "<button id='btnDelete' type='button' class='btn btn-danger'>Confirmar</button>":"")."
			<button id='btnfechar' type='button' class='btn btn-default' >Fechar</button>
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
				window.location.href = '$url';
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
	private $cod = 0;
	private $baseurl = 'http://localhost/Portal/';
	private $redirect = 'index.php';
	private $fields = array();
	private $firstfields = '';
	private $afterfields = '';
	private $insert = false;
	private $edit = false;
	private $delete = false;
	
	function Form($title, $table, $get){
		$this->title = $title;
		$this->table = $table;
		
		if (isset($get['cod'])){
			$this->cod = $get['cod']; 
		}	
		if (isset($get['type'])){
			$this->type = $get['type']; 
		}	
	}
	public show(){
		if($this->type == 'insert'){
			$this->title = 'Inserir '.$this->title;
			return showinsert();
		}
		if($this->type == 'edit'){
			$this->title = 'Alterar '.$this->title;
			return showedit($this->cod);
		}
		if($this->type == 'delete'){
			$this->title = 'Apagar '.$this->title;
			return showdelete($this->cod);
		}
		if($this->type == 'show'){
			return showRecord($this->cod);
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
		}		
	}	
	private function createfields(){		
		$fields = '';
		ksort($this->fields);
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
		return createbuttons($this->insert, $this->edit, $this->delete);
	}
	public function newText($ord, $name, $label, $required = false, $autofocus = false, $placeholder = '', $disabled = false){
		$field = new Field;		
		$field->tipo = 'text';
		$field->id = $name;
		$field->name = $name;
		$field->label = $label;
		$field->required = $required; 
		$field->autofocus = $autofocus;
		$field->placeholder = $placeholder;
		$field->disabled = $disabled;
		$this->fields[$ord] = $field;
	}
	public function newKey($ord, $name, $label){
		$field = new Field;		
		$field->tipo = 'text';
		$field->id = $name;
		$this->key = $name;
		$field->name = 'key_'.$name;
		$field->key = true;
		$field->label = $label;	
		$field->disabled = true;
		$this->fields[$ord] = $field;
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
}	


$form = new Form('Teste','teste',$_GET);	
$form->newKey(1, 'codigo', 'Código');
$form->newText(2, 'descricao', 'Descrição', true, false, 'Digite a descrição');
echo $form->show();

?>