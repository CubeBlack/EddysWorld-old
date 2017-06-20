<?php
//https://dannkestudios.websiteseguro.com/Eddysword/facebook/webhook.php
require_once 'configFace.php';
require_once "send.php";
require_once '../engine/sala.php';

$hub_verify_token = NULL;
if(isset($_REQUEST["hub_challenge"])) {
 $challenge = $_REQUEST["hub_challenge"];
 $hub_verify_token = $_REQUEST["hub_verify_token"];
}
if ($hub_verify_token === $verify_token) {
    echo $challenge;
}

$webHook = json_decode(file_get_contents('php://input'), true);

//---------teste
$test = false;
$test = true;
//--------

faceSend("1725959500754390","WebHook");
if(!empty($webHook['entry'][0]['messaging'][0]['message'])||$test){
        
    $sender = $webHook['entry'][0]['messaging'][0]['sender']['id'];
    $message = $webHook['entry'][0]['messaging'][0]['message']['text'];
    

    //------------- teste
    $sender = "1725959500754390";
    $message = "Apenas testando a mensagem(webrook.php)";
    //---------
    
    $resp = $sala->mePlayer()->chatSend("face",$sender,$message);
    var_dump($resp);
    faceSend($sender,$resp["resp"]->msg);
}

if(file_exists("../engine/sala.php")){
  include_once "../engine/sala.php";
}
else {
  echo "Araquivo não encontrado";
  die();
}
$dbs->tableInsert("werook",array(
  NULL,
  file_get_contents('php://input')
));
