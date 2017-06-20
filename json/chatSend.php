<?php
header('Content-Type: application/json');
require_once "../engine/sala.php";
if (isset($_GET["query"])) {
  $resposta = $sala->mePlayer()->chatSend("face","456445",$_GET["query"]);
}
else {
  $resposta = array(
    "log"=>"Não existe query",
    "weit"=>""
  );
}
echo json_encode($resposta);

