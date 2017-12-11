<?php
function __autoload($className){
  $url = "engine2/$className.class.php";
  require_once $url;
}
// variaveis globais
$config = new Config();
$dbl = new DataLocal();
$db = new Database ();
$user = new User();
$gameObject = new GameObject();
$world = new World();

//$grimorio = new Grimorio();
$term = New Terminal();