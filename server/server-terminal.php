<?php
	require_once("server.php");

	if(!isset($_REQUEST["comander"])){
		echo "_REQUEST[comander] not fainded";
		goto fim;
	}
	$comStr = $_REQUEST["comander"];
	if($comStr == ""){
		echo "-------------  Cloto Server  ------------- \n";
		echo "Bem vindo {$user->nick}!\n";
		echo "help, Para obter ajuda";
		goto fim;
	}
	$term->chamada($comStr);
	fim:
