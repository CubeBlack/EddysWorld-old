<?php

if(file_exists("../engine/sala.php")){
  include_once "../engine/sala.php";
}
else {
  echo "Araquivo não encontrado";
  die();
}
require_once 'configFace.php';
//pegar valores
$recebimento = file_get_contents('php://input');
$dbs->tableInsert("werook",array(
  NULL,
  $recebimento
));

$input = json_decode(file_get_contents('php://input'), true);
$sender = $input['entry'][0]['messaging'][0]['sender']['id'];
$message = $input['entry'][0]['messaging'][0]['message']['text'];

//enviar para o grimorio
$resp = $sala->mePlayer()->chatSend("face",$sender,$message);
$respMSG = "";
$respMSG .= $sender . " - ";
//foreach ($resp["log"] as $log) $respMSG .= $log . ", ";
$respMSG .= $resp["weit"]." - ";
$respMSG .= $resp["resposta"];

if(preg_match('[time|current time|now]', strtolower($message))) {
    // Make request to Time API
    ini_set('user_agent','Mozilla/4.0 (compatible; MSIE 6.0)');
    $result = file_get_contents("http://www.timeapi.org/utc/now?format=%25a%20%25b%20%25d%20%25I:%25M:%25S%20%25Y");
    if($result != '') {
        $message_to_reply = $result;
    }
} else {
    $message_to_reply = $respMSG;
}
//API Url
$url = 'https://graph.facebook.com/v2.6/me/messages?access_token='.$access_token;
//Initiate cURL.
$ch = curl_init($url);
//The JSON data.
$jsonData = '{
    "recipient":{
        "id":"'.$sender.'"
    },
    "message":{
        "text":"'.$message_to_reply.'"
    }
}';
//Encode the array into JSON.
$jsonDataEncoded = $jsonData;
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);
//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
//Set the content type to application/json
//curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
//Execute the request
if(!empty($input['entry'][0]['messaging'][0]['message'])){
    $result = curl_exec($ch);
}
