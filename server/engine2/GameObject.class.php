<?php
	class GameObject{
		function __construct(){
			$this->id = 0;
			$this->position = new Vector2();
			$this->tamanho = new vector2();
		}
		static function add(){
		
		}
		static function findByName(){
			
		}
		static function findByLocation($location){
			global $db;
			$retorno = array();
			$table = $db->tableSelect(Database::objcTb,"");
			foreach($table as $key => $row){
				$retorno[$key] = GameObject::ofDatabase($row);
			}
			return $retorno;
		}
		static function ofDatabase($objArr){
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
			
			return $nGo;
		}
	}