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

function createinputtext($id, $name, $required,  $autofocus, $disabled, $placeholder, $mask, $value = 'teste'){
	$data = "<input type='text' class='form-control' id='$id' value='$value' name='$name' placeholder='$placeholder' ".($required ? "required":"")." ".($autofocus ? "autofocus":" ")." ".($disabled ? "disabled":" ").">";
	if ($mask != ''){
		$data.= "<script type='text/javascript'>$('#$id').mask('$mask');</script>";
	}
	return $data;
}
function createhidden($id, $name){
	return 
	"<input type='hidden' class='form-control' id='$id' name='$name'>";
}
function createimg($id, $name, $src, $show = true){
  if ($show == true){
	$data = "<img src='$src' alt='imagem' class='img-thumbnail' width='96' height='96' id='$id' name='$name'>";
  }else{
	$data = "";
  }
  return $data;	
}
function createinputemail($id, $name, $required,  $autofocus, $disabled, $placeholder){
	return 
	"<input type='email' class='form-control' id='$id' name='$name' placeholder='$placeholder' ".($required ? "required":"")." ".($autofocus ? "autofocus":" ")." ".($disabled ? "disabled":" ").">";
}
function createtextarea($id, $name, $required,  $autofocus, $disabled, $placeholder){
	return 
	"<textarea class='form-control' id='$id' rows='5' name='$name' placeholder='$placeholder' ".($required ? "required":"")." ".($autofocus ? "autofocus":" ")." ".($disabled ? "disabled":" ")."></textarea>";
}
function createradiobox($id, $name, $values, $required,  $disabled, $inline = true){
	$data = '';	
	foreach($values as $key => $value){		
		$radio = "<input type='radio' value='$key' id='$id' name='$name'  ".($required ? "required":"")."  ".($disabled ? "disabled":" ").">$value";
		if ($inline == true){
			$data .="<label class='radio-inline'>$radio</label>";
		}else{
			$data .="<div class='radio'><label>$radio</label></div>";
		}		 
	}
	return $data;
}
// function createcheckbox($id, $name, $label, $required,  $disabled){
	// return 
	// "<label class='checkbox-inline'>
	// <input type='checkbox' value='1' id='$id' name='$name'  ".($required ? "required":"")."  ".($disabled ? "disabled":" ").">$label
	// <input id='".$id."_hid' type='hidden' value='0' name='$name'>
	// <script type='text/javascript'>
	   // $('#$id').change(function(){
			// if($(this).checked){
				// $(this).prop('disabled', false);
				// $('#".$id."_hid').prop('disabled', true);
			// }else{
				// $(this).prop('disabled', true);
				// $('#".$id."_hid').prop('disabled', false);
			// }
		// });		
	// </script>	
	// </label>";
// }

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
function createfile($id, $name, $button, $accept, $required,  $disabled, $show = true){
  if ($show == true){
	$data = "<div class='botaoArquivo'>Selecionar arquivo...</div><span class='btn btn-primary btn-file'> $button <input type='file' id='$id' name='$name' accept='$accept' ".($required ? "required":"")."  ".($disabled ? "disabled":" ")."></span>
	<script type='text/javascript'>	
	var div = document.getElementsByClassName('botaoArquivo')[0];
	var input = document.getElementById('$id');
    div.addEventListener('click', function(){input.click();});
    input.addEventListener('change', function(){
	var nome = 'Não há arquivo selecionado. Selecionar arquivo...';
    if(input.files.length > 0) nome = input.files[0].name;
    div.innerHTML = nome;});
	</script>";	
  }else{
	$data = "";
  }
  return $data;
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
	private $insert = false;
	private $edit = false;
	private $delete = false;
	private $titletabs = '';
	private $srcquery = '';
	
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
						//console.log($(idform+' #src_'+i));
						if ($(idform+' #'+i).is(':radio')) {
							$(idform+' #'+i+'[value=\"'+field+'\"]').prop('checked',true);	
						}else
						// if ($(idform+' #'+i).is(':checkbox')) {
							// $(idform+' #'+i+'[value=\"'+field+'\"]').prop('checked',true);	
						// }else
						if ($(idform+' #'+i).is('select')) {
							$(idform+' #'+i).val(field);
							$(idform+' #'+i).selectpicker('render');
						}else						
						if($(idform+' #src_'+i).is('img')){
							if (field != ''){
								$(idform+' #src_'+i).attr('src', 'data:image/png;base64,'+field);							
							}
						}else{
							//alert(field);
							$(idform+' #'+i).val(field).change();
						}
					});
				});							
		
		</script> ";	
	}	
	
	function Form($title, $table, $get, $srcquery, $redirect = ''){
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
		$this->srcquery = $srcquery;
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
		$this->action = "$this->srcquery?action=insert&table=$this->table";
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
		$this->action = "$this->srcquery?action=update&table=$this->table&id=$cod&key=$this->key";
		$this->id = 'frmedt'.$this->table;				
		$content .= $this->create($this->id); 	
		$content .= $this->getfields("$this->srcquery?action=select&table=$this->table&id=$cod&key=$this->key");
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
		$this->action = "$this->srcquery?action=delete&table=$this->table&id=$cod&key=$this->key";
		$this->id = 'frmedt'.$this->table;				
		$content .= $this->create($this->id); 	
		$content .= $this->getfields("$this->srcquery?action=select&table=$this->table&id=$cod&key=$this->key");
		$content .= $this->getjsdel($this->action);			
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
		$content .= $this->getfields("$this->srcquery?action=select&table=$this->table&id=$cod&key=$this->key");
		$content .= $this->getjsclose($this->baseurl.$this->redirect);			
		return $content;
	}		
	
	private function create($id){
		$this->id = $id;
		$this->content .= $this->get_tab($this->titletabs);
		$this->content .= $this->createfields();
		$this->content .= $this->createbuttons();
		return createform($this->title, $this->id, $this->content);
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
	public function createfield($field){
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
			// case 'checkbox'	:
				// return  createcheckbox($field->id, $field->name, $field->button, $field->required,  $field->disabled);
			// break; 
			case 'radiobox'	:
				return  createradiobox($field->id, $field->name, $field->values, $field->required,  $field->disabled);
			break; 	
			case 'select'	:
				return  createselect($field->id, $field->name, $field->values, $field->required,  $field->disabled, $field->placeholder);
			break; 	
			case 'date'	:
				return  createdate($field->id, $field->name, $field->required,  $field->disabled, (($field->current&&$this->insert)?true:false), $field->hour);
			break; 				
			case 'hour'	:
				return  createhour($field->id, $field->name, $field->required,  $field->disabled, (($field->current&&$this->insert)?true:false));
			break; 			
			case 'lookup':
				return  createlookup($field->id, $field->name, $field->table, $field->fields, $field->required,  $field->disabled);
			break;
			case 'file':
				return  createfile($field->id, $field->name, $field->button, $field->accept, $field->required,  $field->disabled ,(($this->insert||$this->edit)?true:false));
			break;			
			case 'img':
				return  createimg($field->id, $field->name, $field->src, (($this->insert)?false:true));
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
	public function newImg($name, $label, $src = 'img/error.jpg'){
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
	// public function newCheckbox($name, $button, $required = false, $disabled = false){
		// $field = new Field;		
		// $field->tipo = 'checkbox';
		// $field->id = $name;
		// $field->name = $name;
		// $field->button = $button;
		// $field->required = $required; 
		// $field->autofocus = false;
		// $field->placeholder = '';
		// $field->disabled = $disabled;
		// array_push($this->fields, $field);
	// }
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
	public function newImgFile($name, $label, $required = false){
		$field = new Field;		
		$field->tipo = 'img';
		$field->id = 'src_'.$name;
		$field->name = 'src_'.$name;
		$field->label = $label;
		$field->src = 'img/img_not_found.gif';
		array_push($this->fields, $field);		
		$field = new Field;		
		$field->tipo = 'file';
		$field->id = $name;
		$field->name = $name;
		$field->required = $required;
		$field->button = 'Selecionar';
		$field->accept = '.gif,.jpg,.png';
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
	public $inline = true;
	public $table = '';
	public $fields = '';
	public $mask = '';
	public $button = '';
	public $action = '';
	public $accept = '';
	public $src = '';
}
?>