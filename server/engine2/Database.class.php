<?php
	class Database{
		const
			userTb = "eddysWorld_user",
			persTb = "eddysWorld_pers",
			inerTb = "eddysWorld_inerts",
			objcTb = "eddysWorld_object"
		;
		function __construct(){
			global $config;
			try {
				$db = new PDO(
					"mysql:host={$config->db->host};dbname={$config->db->name}",
					$config->db->user,
					$config->db->password
				);
				$txtQuery = "select now()";
			} catch (PDOException $e) {
				print "<pre>Error(DBServer::construct)!".$e->getMessage();
				die();
			}
			$this->mePDO = $db;
		}
		public function tableSelect ($table,$parametro){
		  global $config;
		  $query = "
			  SELECT * FROM `$table`
			  $parametro
			  ORDER BY id DESC
			  LIMIT 10
		  ";
		  $results = $this->mePDO->query($query);
		  if($config->show_error){
			$error = $this->mePDO->errorInfo(); 
			echo $error[2];
		  }
			/*
		  if($this->mePDO->errorInfo()[1] != NULL) {
			  if($error_show) echo "Error (DateBase::tableGet)" . $this->mePDO->errorInfo()[1] . ": " . $this->mePDO->errorInfo()[2];
			  return false;
		  }
		  */
		  if(!$results) return false;
		  return $results->fetchAll();
		}
		function autoConfig(){
			$query = "
				
			";
			$this->mePDO->Query();
		}
	}
	
