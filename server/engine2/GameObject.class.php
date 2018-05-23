<?php
	class GameObject{
		function __construct(){
			$this->id = 0;
			$this->position = new Vector2();
			$this->tamanho = new vector2();
		}
		static function add($x,$y,$heigth,$width,$tipo="null"){
			global $db;
			$dados=array(null,$x,$y,$heigth,$width,$tipo);
			$id = $db->tableInsert(Database::objcTb,$dados);
			return $id;
		}
		public function setPosition(){
			
		}
		public function update($id,$x,$y,$w,$h,$tipo){
			global $db;
			$query = "UPDATE `ew_object` SET `x` = '$x', `y` = '$y', `w` = '$w', `h` = '$h', `tipo` = '$tipo' WHERE `id` = $id;";
			$db->mePDO->query($query);
			return "Ok!";
		}
		public function get($id,$rTipo="json"){
			global $db;
			$retorno = array();
			$obj = $db->tableSelect(Database::objcTb,"WHERE `id`='$id'")[0];
			$retorno = GameObject::ofDatabase($obj);
			if($rTipo=="json") $retorno = json_encode($retorno);
			return $retorno;
		}
		public function drop($id=""){
			global $db;
			$db->rowDrop(Database::objcTb,$id);
			return "Ok!";
		}
		static function findByName(){
			
		}
		static function findByLocation($location){
			global $db;
			$retorno = array();
			$table = $db->tableSelect(Database::objcTb,"");
			foreach($table as $key => $row){
				$retorno[] = GameObject::ofDatabase($row) ;
			}
			return $retorno;
		}
		static function ofDatabase($objArr){
			global $db;
			$nGo = new GameObject();
			
			$nGo->id = $objArr["id"];
				$np = new Vector2();
				$np->x = $objArr["x"];
				$np->y = $objArr["y"];
			$nGo->position = $np;
				$nt = new Vector2();
				$nt->x = $objArr["w"];
				$nt->y = $objArr["h"];
			$nGo->tamanho = $nt;
			$nGo->tipo = $objArr["tipo"];
			if($nGo->tipo=="inert"){
				$nGo = Inert::byDatabase($nGo->id,$nGo);
			}
			return $nGo;
		}
		function help(){
return "--- GameObjct ---
Funcoes:
	* add
	* get
	* findByName
	* findByLocation
	* ofDatabase
";
	}
}