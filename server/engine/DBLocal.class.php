<?php
/**
 *
 */
 //
class DBLocal
{
	public $data;
  function __construct()
  {
    global $config;
    if(!isset($_SESSION))
      session_start();

	if(!isset($_SESSION["k-slayer"]))
		$this->clear();
	
	$this->data = $_SESSION["k-slayer"];
  }
	public function set($index,$valor){
		$_SESSION["k-slayer"][$index] = $valor;
		return "ok";
	}
	public function get($index=""){
		if($index == ""){
			return $_SESSION["k-slayer"];
		}
		if(isset($_SESSION["k-slayer"][$index]))
			return $_SESSION["k-slayer"][$index];
		return false;
	}
  public function clear(){
	$_SESSION["k-slayer"] = array();
	return "ok";
  }
	//---------- help ---------------//
	public function help(){
		return <<<'EOT'
>> DBLocal(dbl)
.data	- dados salvos no banco de dados
.set([index],[valor]) - Adiciona ou atualiza iinformações no banco de dados
.help()
.get() - Retorna todo banco de dados
.get([index]) - Retorna dado especifico do banco de dados
.clear() - Apaga is dados salvos

EOT;
	}
}
