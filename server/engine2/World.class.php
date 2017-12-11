<?php
	class World{
		function __construct(){
			$this->gameObject = array();
		}
		function show($tRetorno="obj"){
			$retorno = GameObject::findByLocation("");
			switch($tRetorno){
				case "obj":
					return $retorno;
					break;
				case "json":
					return json_encode($retorno);
					break;
				default:
					return "erro 001(Wolrd.show):tipo de retorno '$tRetorno'nao reconhecido";
					break;
			}
			
						
		}
	}
