<?php
header('Content-Type: application/json');

if(file_exists("engine/sala.php")){
  require_once "engine/sala.php";
}
else if(file_exists("../engine/sala.php")){
  require_once "../engine/sala.php";
}
else {
  echo "Não foi posivel encontrar sala.php";
  die();
}
$retorno["asset"] = $sala->assetList();
$retorno["path"] = $sala->pathList();
$retorno["log"] = array("");

$strJson = json_encode($retorno,JSON_PARTIAL_OUTPUT_ON_ERROR);
echo $strJson;
//var_dump($retorno);