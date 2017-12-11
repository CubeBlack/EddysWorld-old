<?php
header('Content-Type: application/json');
require_once '../engine/sala.php';
$resposta = array(
  "check"=>User::newCheck()
);

echo json_encode($resposta);