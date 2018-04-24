<?php
class Dado{
	function novo($dado="", $tag=""){
		global $db;
		$dado = urlencode($dado);
		$tag = Tag::strToStr($tag);
		$tag = urlencode($tag);
		if($dado==""){
			return false;
		}
		//$dado=urlencode($dado);
		$sql = "INSERT INTO `ks_dados` (`dado`, `tag`) VALUES ('{$dado}', '{$tag}');";
		$db->query($sql);
		return "Ok";
	}
	function drop($id){
		//DELETE FROM `ks_dados` WHERE `ks_dados`.`id` = 4
		global $db;
		$sql = "DELETE FROM `ks_dados` WHERE `ks_dados`.`id` = $id";
		$db->query($sql);
		return "ok";
		
	}
	function get($id,$tRetorno=""){
		global $db;
		$id = urlencode($id);
		$sql = "SELECT * FROM `ks_dados` WHERE `id`='$id'";
		
		$retorno = $db->query($sql);
		if(!$retorno){
			return "Erro ao acessar banco de dados";
		}
		$retorno = $retorno->fetchAll();
		$retorno2 = array();
		if(isset($retorno[0])){
			$retorno2["id"] = urldecode($retorno[0]["id"]);
			$retorno2["dado"] = urldecode($retorno[0]["dado"]);
			$retorno2["tag"] = Tag::stringToTags(urldecode($retorno[0]["tag"]));
		}


		if($tRetorno == "json"){
			//$retorno["time"] = time();
			$retorno2 = json_encode($retorno2);
			return $retorno2;
		}
		return $retorno2;

	}
	function update($id,$dado,$tag){
		global $db;
		$id = urlencode($id);
		$dado = urlencode($dado);
		$tag = Tag::strToStr($tag);
		$tag = urlencode($tag);
		//UPDATE `ks_dados` SET `dado` = '* Criar o Repositorio para dominação.\r\n* Atulalizar repositorios.', `tag` = 'GitHub;Projetos;' WHERE `ks_dados`.`id` = 106;
		$sql = "UPDATE `ks_dados` SET `dado` = '$dado', `tag` = '$tag' WHERE `ks_dados`.`id` = $id;";
		//$retorno = null;
		$retorno = $db->query($sql);
		return "ok";
	}
	function search($criterio="",$tRetorno=""){
		global $db;
		$sql = "SELECT * FROM `ks_dados`";
		if($criterio != ""){
			$qTags = Tag::stringToTags($criterio);
			$sql .=" WHERE tag like ";
			for($i = 0; $i < sizeof($qTags); $i++){
				$sql .="'%{$qTags[$i]}%'";
				if(sizeof($qTags)-1 != $i){
					$sql .=" and ";
				}
				
			}
		}
		$sql .=" ORDER by id DESC;";
		//echo $sql;
		
		$retorno = $db->query($sql);
		if(!$retorno){
			return "Erro ao acessar banco de dados";
		}
		$retorno = $retorno->fetchAll();
		if($tRetorno==""||$tRetorno=="array"){
			return $retorno;
		}
		$retorno2 = array();
		
		foreach($retorno as $linha){
			$nLinha["id"] = urldecode($linha["id"]);
			$nLinha["dado"] = urldecode($linha["dado"]);
			$nLinha["tag"] = Tag::stringToTags(urldecode($linha["tag"]));
			$retorno2[] = $nLinha;
		}
		//var_dump($retorno2);;
		if($tRetorno == "json"){
			//$retorno["time"] = time();
			
			$retorno2 = json_encode($retorno2);
			return $retorno2;
		}
		//echo "aqui";
		//return $tRetorno;
		return "Enpty!";
	}
	public function help(){
		return <<<'EOT'
>> class Dado(dado)
.novo([string:dado],[string:tag]="")
.get(id)
.update(id,dado,tag)
.drop([int/string:id])
.search(criterios,tipo de retorno) - tipo de retornon = ''/'aray','json',
EOT;
	}
}