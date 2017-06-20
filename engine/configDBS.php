<?php
require_once 'DBServer.php';
require_once "config.php";
$dbs = new DBServer($db_host, $db_user, $db_password, $db_name);
