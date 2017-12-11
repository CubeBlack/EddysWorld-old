<?php
	class User{
		const 
			tUser_excluido = -1,
			tUser_banido = 0,
			tUser_anonymus = 1,
			tUser_player = 2,
			tUser_gm = 3,
			tUser_developer = 4
		;
		
		public $id;
		public $acesso;
		public $nick;
		public $email;
		public $tUser;
		
		function __construct(){
			global $dbl;
			if(isset($dbl->data->user)){
				$dUser = $dbl->data->user;
				
				$this->id = $dUser->id;
				$this->nick = $dUser->nick;
				$this->email = $dUser->email;
				$this->tUser = $dUser->tUser;
			}
			else{
				$this->id = 0;
				$this->nick = "Anonymus" . rand(0,9999);
				$this->email = "none";
				$this->tUser = $this::tUser_anonymus;
			}
			$this->acesso = time();
			$dbl->insert("user",$this);
			
		}
		function logued(){
			return $this->id > 0;
		}
		function login($user, $password){
			global $dbl, $db;
			//seguranca do banco de dados
			$user = urlencode($user);
			$password = urldecode($password);
			
			$retorno = $db->tableSelect(Database::userTb,"where nick = '$user' or email = '$user'");
			if(empty($retorno)) return false;
			if($retorno[0]["password"] == urldecode($password)){
				$this->id = $retorno[0]["id"];
				$this->nick = $retorno[0]["nick"];
				$this->email = $retorno[0]["email"];
				$this->tUser = $retorno[0]["tipo"];
				$this->acesso = time();
				
				$dbl->insert("user",$this);
				return true;
			}
			return $retorno;
		}
		function novo(){
			
		}
		function sair(){
			global $dbl;
			return $dbl->clear();
			
		}
	}
	
