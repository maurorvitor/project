<?php
	include '../data/dblib.php';	
	include '../data/form.php';
	
	class Dataquery{		
		private $action;
		private $pkname = '';
		private $pkvalue = '';  
		public $table = '';				
		public $where = '';				
		public $values = array();
		public $result = array();
		public $dates = array();
		public $success = false;
		public $log = false;
		public $json = null;
		public $id = 0;
		public $cancelupdates = false;
		public $beforeinsert = '';
		public $afterinsert = '';
		public $beforeupdate = '';
		public $afterupdate = '';
		public $beforedelete = '';
		public $afterdelete = '';
		public $onlist = '';
		public $linhas = array();
		
		function Dataquery($get, $post, $files){  
			$this->decodevars($get, $post, $files);	
		}
		
		public function execute(){
			//ação inserir
			if ($this->action == 'insert'){	
				//ação before insert
				if (is_callable($this->beforeinsert)){
					$this->result = call_user_func($this->beforeinsert);					 
					if (($this->cancelupdates == true)&&($this->result['success'] == false)){
						$this->json = json_encode($this->result);
						return;
					}
				}				
				//inserindo
				$this->encodedates();
				$this->success = table_insert($this->table, $this->values, $this->id, $this->result, $this->log);
				//ação before insert
				if (($this->success == true)&&(is_callable($this->afterinsert))){
					call_user_func($this->afterinsert);					 
				}
			}			
			//ação update
			if ($this->action == 'update'){
				//ação before update
				if (is_callable($this->beforeupdate)){
					$this->result = call_user_func($this->beforeupdate);					 
					if (($this->cancelupdates == true)&&($this->result['success'] == false)){
						$this->json = json_encode($this->result);
						return;
					}
				}
				//atualizando
				$this->encodedates();
				//print_r($this->values);
				$this->success = table_update($this->table, $this->values, array("$this->pkname"=>$this->pkvalue), $this->result, $this->log);
				//ação before update
				if (($this->success == true)&&(is_callable($this->afterupdate))){
					call_user_func($this->afterupdate);					 
				}				
			}	
			//ação delete
			if ($this->action == 'delete'){
				//ação before delete
				if (is_callable($this->beforedelete)){
					$this->result = call_user_func($this->beforedelete);					 
					if (($this->cancelupdates == true)&&($this->result['success'] == false)){
						$this->json = json_encode($this->result);
						return;
					}
				}
				//deletando
				$this->success = table_delete($this->table, array("$this->pkname"=>$this->pkvalue), $this->result, $this->log);
				//ação before delete
				if (($this->success == true)&&(is_callable($this->afterdelete))){
					call_user_func($this->afterdelete);					 
				}					
			}
			if ($this->action == 'select'){			
				$result = table_select($this->table,'*',array("$this->pkname"=>$this->pkvalue));				
				$this->result = $result->fetch(PDO::FETCH_ASSOC);
				//trata imagens
				foreach($this->result as $key => $value) {
					if (!(strpos($key,'img_') === false)){
						$this->result[$key] = base64_encode($this->result[$key]);
					}
				}
				//trata datas
				$this->decodedates($this->result);
			}
			if ($this->action == 'list'){	
				$result = table_select($this->table,'*', array(), $this->where);		
				
				while ($row = $result->fetch(PDO::FETCH_ASSOC)){
					$this->linhas[] = $row;
				}				
				//mysqli_free_result($result);
				if (is_callable($this->onlist)){
					call_user_func($this->onlist);
				}
				//trata datas
				foreach($this->linhas as $rec => $row){			
					foreach($row as $key => $value){
						foreach($this->dates as $k => $v){
							if(($v == $key)&&(! is_null($this->linhas[$rec][$key]))){
								//print_r($this->linhas[$rec][$key]);
								$this->linhas[$rec][$key] = date("d/m/Y H:i:s", strtotime($this->linhas[$rec][$key]));
								//print_r($this->linhas[$rec][$key]);
							}														
						}						
					}					
				}				
				$data = array();
				$data['data'] = $this->linhas;				
				$this->result = $data;
			}			
			
			$this->json = json_encode($this->result);
		}
		private function decodevars($get, $post, $files){
			if (isset($get['table'])){
				$this->table = $get['table']; 
			}	
			if (isset($get['action'])){
				$this->action = $get['action']; 
			}
			if (isset($get['where'])){
				$this->where = $get['where']; 
			}
			if (isset($get['key'])){
				$this->pkname = $get['key']; 
			}
			if (isset($get['id'])){
				$this->pkvalue = $get['id']; 
			}		
			foreach ($post as $key => $value) {
				if(strpos($key,'ign_')===false){
					$this->values[$key] = $value;
				}
			} 
			foreach ($files as $key => $value) {
				$image = null;
				if(strpos($key,'ign_')===false){
					if ($files[$key]['size'] > 0) {
						$this->values[$key] = addslashes(file_get_contents($files[$key]['tmp_name'])); 						
					}				
				}
			}			
		}
		public function formatvalue($field, $map){
			foreach($this->linhas as $rec => $row){			
				foreach($row as $key => $value){
					if($key == $field){
						$this->linhas[$rec][$key] = $map[$value];
					}					
				}					
			}	
		}
		public function formatinput($field, $type){
			foreach($this->linhas as $rec => $row){			
				foreach($row as $key => $value){
					if($key == $field->name){
						$this->linhas[$rec][$key] = createinputtext($field->id, $field->name, $field->required,  $field->autofocus, $field->disabled, $field->placeholder, $field->mask, $value);	
					}					
				}					
			}	
		}		
		private function encodedates(){
			foreach($this->dates as $key => $value){
				$this->encodedate($value);
			}
		}
		private function decodedates(&$values){
			foreach($this->dates as $key => $value){
				$this->decodedate($value, $values);
			}
		}		
		private function encodedate($field){
			foreach($this->values as $key => $value){			
				if($key == $field){
					$this->values[$key] = date("Y-m-d H:i:s", strtotime(str_replace('/', '-', $this->values[$key])));
				}													
			}	
		}
		private function decodedate($field, &$values){
			foreach($values as $key => $value){	
				if($key == $field){
					$values[$key] = date("d/m/Y H:i:s", strtotime($values[$key]));;
				}													
			}	
		}		
	}
?>