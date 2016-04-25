<?php
	include '../data/dblib.php';	
	
	class Dataquery{		
		private $action;
		private $pkname = '';
		private $pkvalue = '';  
		public $table = '';				
		public $values = array();
		public $result = array();
		public $success = false;
		public $log = false;
		public $json = null;
		public $id = 0;
		public $cancelupdates = true;
		public $beforeinsert = '';
		public $afterinsert = '';
		public $beforeupdate = '';
		public $afterupdate = '';
		public $beforedelete = '';
		public $afterdelete = '';
		
		function Dataquery($get, $post){  
			$this->decodevars($get, $post);	
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
				$this->result = mysqli_fetch_object($result);
			}		
			$this->json = json_encode($this->result);
		}
		private function decodevars($get, $post){
			if (isset($get['table'])){
				$this->table = $get['table']; 
			}	
			if (isset($get['action'])){
				$this->action = $get['action']; 
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
		}
	}

	$qryTeste = new Dataquery($_GET, $_POST);		
	//closure
	$qryTeste->beforeinsert = function(){
		global $qryTeste; 
		$qryTeste->values['descricao'] = 'viu so';
		return processmsg(true, 'Não inseriu');
	};	
	$qryTeste->execute();	
	echo $qryTeste->json;
?>