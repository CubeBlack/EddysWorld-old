<?php
header('Content-Type: application/json');
$view["Titulo"] = "SysLog";
$view["Time"] = time();
echo json_encode($view);
