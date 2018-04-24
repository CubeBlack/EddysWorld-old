<?php
class User{
	public function __construct(){
		global $dbl;
		$this->id = 0;
		$this->nick = "Anonymus";
		$this->email = "nome@hoster.com";
		
		if(!$dbl->get("user"))
			$dbl->set("user",$this);
				
	}
	public function login($login,$senha){
		
	}
	public function logued(){
		
	}
	public function novo($nick,$email,$pass){
		
	}
	public function setPower($id,$valor){
		
	}
	//---------- help ---------------//
	public function help(){
		return <<<'EOT'
>> User(user) - Dados e funções de usuario
.id
.nick
.email

.login([user/email],[password])
.logued()
.novo([nick],[email],[senha])
.setPower([id],[valor])

EOT;
	}
}