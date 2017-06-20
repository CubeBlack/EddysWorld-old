<?php
header('Content-Type: application/json');
require_once '../engine/sala.php';

$chatList = $sala->mePlayer()->chatList();
echo json_encode($chatList);
