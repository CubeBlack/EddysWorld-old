<?php
//require_once"engine2/Termianl.class.php";
class Grimorio{
	function __construct(){
		$vars = array(
			"user",
			"gameObject", "go",
			"inert",
			"world",
			"grimorio",
			"me"
		);
		$this->term = new Terminal($vars,array(),true);
	}
	function ouvir($texto=""){
		//localizar fraze no bd
		$texto = Grimorio::simplificar($texto);
		$com = $this->entrada($texto);
		//executar comados do retorno do da pesquisa
		if($com==null) return "n'ai foi posivel entender";
		//$this->term->chamada($com);
		return $com;
	}
	function dizer($texto=""){
		return $texto;
	}
	function entrada($str){
		global $db;
		 //array_rand()
		$retorno = $db->tableSelect(Database::dialogoTb,"WHERE entrada='$str'");
		if(empty($retorno)){
			$com = "N'ao foi posivel entender";
			$neID = $this->dialogoNovo($str);
			$com .= " ($neID)";
			return $com;
		}
		$this->addUso();
		shuffle($retorno);
		$saidaStr = $retorno[0]["saida"];
		$saidaArr = json_decode($saidaStr);
		$retorno = "";
		foreach($saidaArr as $com){
			if($com == "") continue;
			$retorno .= $this->term->chamada($com);
			//var_dump($this->term);
			//var_dump($this->term->chamada($com));
			//echo $com;
		}
		if($retorno == ""){
			return "N'ao entendi, o que voc;e quis dizer?";
		}
		return $retorno;
	}
	function dialogos($criterio="",$rTipo=""){
		global $db;
		$retorno = $db->tableSelect(Database::dialogoTb,"");
		if($rTipo = "json"){
			$retorno = json_encode($retorno);
		}
		return $retorno;
	}
	function dialogoNovo($entrada, $saida = '{"0":"","1":"","2":"","3":""}', $personagem = 0){
		global $db;
		$dados=array(null,Grimorio::simplificar($entrada),$saida,$personagem);
		$id = $db->tableInsert(Database::dialogoTb,$dados);
		return $id;
	}
	//eModo, he o tipo de entrada: json/array
	static function DialogoReplace($id,$entrada,$retorno,$personagem, $eModo = "json"){
		global $db;
		$entrada = Grimorio::simplificar($entrada);
		$table = Database::dialogoTb;
		echo $query = "REPLACE INTO `$table` VALUES($id,'$entrada','$retorno',$personagem)";

		$db->mePDO->query($query);
	}
	function entradaEdit(){
		
	}
	function entradaApagar(){
		//desnecesario
	}
	static function simplificar($str){
		$str = mb_strtoupper($str,'UTF-8');
		$map = array(
			'Á' => 'A',
			'À' => 'A',
			'Ã' => 'A',
			'Â' => 'A',
			'É' => 'E',
			'Ê' => 'E',
			'Í' => 'I',
			'Ó' => 'O',
			'Ô' => 'O',
			'Õ' => 'O',
			'Ú' => 'U',
			'Ü' => 'U',
			'Ç' => 'C',
		);
		 
		$str = strtr($str, $map); // funciona corretamente
		return $str;
	}
	function addUso(){
		//
	}
}

