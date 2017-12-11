<?php
	Class TerminalComander{
		public $tipo;
		public $str;
		public $nodes;
		public $params;
	}
	Class Terminal{
		function __construct(){
			 
		}
		function chamada($comStr){
			$this->com = new TerminalComander();
			$this->com->str = $comStr;
			$this->pearce();
			$this->call();
		}
		function pearce(){
			$comStr = $this->com->str;
			$tipoGet = "nodes";
			$this->com->tipo = "variable";
			
			$nodes[0] = "";
			$nodeN = 0;
			
			$params = array();
			$paramN = 0;
			
			for($i = 0; $i < strlen($comStr);$i++){
				if($comStr[$i] == "("){
					$tipoGet = "param";
					$this->com->tipo = "function";
					continue;
				}
				if($tipoGet == "nodes"){
					if($comStr[$i] == '.'){
						$nodeN++;
						$nodes[$nodeN] = "";
						continue;
					}
					$nodes[$nodeN] .= $comStr[$i];
					continue;
				}
				if($tipoGet == "param"){
					if($comStr[$i] == ")"){
						continue;
					}
					if($comStr[$i] == ","){
						++$paramN;
						continue;
					}
					if(isset($params[$paramN])){
						$params[$paramN] .= $comStr[$i];
					}
					else{
						array_push($params,$comStr[$i]);
					}
					
				}
			}
			$this->com->params = $params;
			$this->com->nodes = $nodes;
			//var_dump($this->com);
		}
		function call(){
			//------------variaveis acesiveis pelo terminal
			//todos
			global $user,$world;
			//apenas desenvolvedor
			//if($user->tUser == User::tUser_developer){
				global $dbl, $db, $config,$gameObject;
			//}
			//-------------
			
			//------------------------
			if(isset(${$this->com->nodes[0]})){
				$retorno = ${$this->com->nodes[0]};
			}
			else{
				echo "Erro 011 (Terminal.class): Primeiro termo '{$this->com->nodes[0]}', nao reconhecido.";
				return;
			}
			//---------------------------------
			if(sizeof($this->com->nodes)< 2) goto fim;
			for($i = 1; $i < sizeof($this->com->nodes) - 1;$i++){
				if(isset(${$this->com->nodes[$i]})){
					$retorno = ${$this->com->nodes[$i]};
				}
				else{
					echo "Erro 012 (Terminal.class): Termo '{$this->com->nodes[$i]}' nao reconhecido.";
					return;
				}
			}
			//----------------------------------------
			if($this->com->tipo == "function") goto callFunction;
			$tNode = $this->com->nodes[sizeof($this->com->nodes) - 1];
			if(isset($retorno->{$tNode})){
				$retorno = $retorno->{$tNode};
			}
			else{
				echo "Erro 013 (Terminal.class): Ultimo termo '{$tNode}', nao reconhecido.";
				return;
			}
			goto fim;
			//----------------------------------
			callFunction:
			$tNode = $this->com->nodes[sizeof($this->com->nodes) - 1];
			if(sizeof($this->com->params)==0)
				$retorno = $retorno->{$tNode}();
			else if(sizeof($this->com->params)==1)
				$retorno = $retorno->{$tNode}($this->com->params[0]);
			else if(sizeof($this->com->params)==2)
				$retorno = $retorno->{$tNode}($this->com->params[0],$this->com->params[1]);
			else{
				echo "Erro 014(Terminal.class): Quantidade de parametros nao suportada";
			}
			
			
			/*
			if(isset($retorno->{$tNode})){
				$retorno = $retorno->{$tNode};
			}
			else{
				echo "Erro 013 (Terminal.class): Ultimo termo '{$tNode}', nao reconhecido.";
				return;
			}
			*/
			goto fim;
			/*
			foreach($this->com->nodes as $key => $node){
				if($key == sizeof($this->com->nodes) - 1){

					
				}
				else{
					$retorno .= $node . "->";
					retorno2 = retorno2->{$node};
					this>testVar(retorno2);
				}
				
			}

			if($this->com->tipo == "variable"){
				$retorno .= $node;
			}
			else if($this->com->tipo == "function"){
				$retorno .= $node . "(";
				foreach($this->com->params as $key => $param){
					if($key == sizeof($this->com->params) - 1){
						$retorno .= $param;
					}else{
						$retorno .= $param . ",";
					}
					
				}
				$retorno .= $node . ")";
			} 
			else{
				echo "Erro(1): Tipo indefinido";
				return;
			}
			*/
			//var_dump(${"user"});
			fim:
			if(is_string($retorno)){
				echo $retorno;
			}
			else{
				var_dump($retorno);
			}
			
		}
		
	}