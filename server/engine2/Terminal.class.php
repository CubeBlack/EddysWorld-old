<?php
	Class TerminalComander{
		public $tipo;
		public $str;
		public $nodes;
		public $params;
		//public $rIntegral;
	}
	Class Terminal{
		//no log, vvalores ue n'ao devem ser salvos no log
		//como comando apenas para visulizrar dados
		//mas acho melhor especificar apenas os que v'ao para o log
		//tipo um inLog
		//rIntegral, para o caso de querer a resposta no retorno, e n'ao no echo
		function __construct($vars,$noLog=array(),$rIntegral=false){
			$this->vars = $vars;
			$this->noLog = $noLog;
			$this->rIntegral = $rIntegral;
		}
		function chamada($comStr){
			$this->com = new TerminalComander();
			$this->com->str = $comStr;
			$this->pearce();
			return $this->call();
		}
		function setLog(){
			$filename = 'terminal.log';
			if (!$handle = fopen($filename, 'a')) {
				 echo "Não foi possível abrir o arquivo ($filename)";
				 exit;
			}
			if (fwrite($handle, $this->com->str."\n") === FALSE) {
				echo "Não foi possível escrever no arquivo ($filename)";
			}
			fclose($handle);
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
				if($tipoGet == "nodes"){
					if($comStr[$i] == '.'){
						$nodeN++;
						$nodes[$nodeN] = "";
						continue;
					}
					if($comStr[$i] == "("){
						$tipoGet = "param";
						$params[$paramN] = "";
						$this->com->tipo = "function";
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
					if(strlen($comStr)>9){
						if(
							$comStr[$i-8] == "s"&
							$comStr[$i-7] == "t"&
							$comStr[$i-6] == "r"&
							$comStr[$i-5] == "B"&
							$comStr[$i-4] == "e"&
							$comStr[$i-3] == "g"&
							$comStr[$i-2] == "i"&
							$comStr[$i-1] == "n"&
							$comStr[$i-0] == "\""){
							$tipoGet = "paramStr";
							$params[$paramN] = "";
							continue;
							
							//echo "+++";
						}
					}
					if(isset($params[$paramN])){
						$params[$paramN] .= $comStr[$i];
					}
					else{
						array_push($params,$comStr[$i]);
					}
					
				}
				if($tipoGet == "paramStr"){
					if(strlen($comStr)>7){
						if(
							$comStr[$i-6] == "\""&
							$comStr[$i-5] == "s"&
							$comStr[$i-4] == "t"&
							$comStr[$i-3] == "r"&
							$comStr[$i-2] == "E"&
							$comStr[$i-1] == "n"&
							$comStr[$i-0] == "d"){
							$tipoGet = "param";
							$params[$paramN] = substr($params[$paramN],0,-6);
							continue;
						}
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
			//var_dump($this);
			//echo $this->com->params[0];
		}
		function call(){
			$this->setLog($this->com->str);
			//---------------------
			foreach($this->vars as $ar){
				global ${$ar};
			}
			//---------------------
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
			else if(sizeof($this->com->params)==3)
				$retorno = $retorno->{$tNode}($this->com->params[0],$this->com->params[1],$this->com->params[2]);
			else if(sizeof($this->com->params)==4)
				$retorno = $retorno->{$tNode}($this->com->params[0],$this->com->params[1],$this->com->params[2],$this->com->params[3]);
			else if(sizeof($this->com->params)==5)
				$retorno = $retorno->{$tNode}($this->com->params[0],$this->com->params[1],$this->com->params[2],$this->com->params[3],$this->com->params[4]);
			
			else{
				echo "Erro 014(Terminal.class): Quantidade de parametros nao suportada";
			}

			goto fim;

			fim:
			if($this->rIntegral){
				return $retorno;
			}
			if(is_string($retorno)){
				echo $retorno;
			}
			else{
				var_dump($retorno);
			}
			
		}
		
	}