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
$go = $gameObject = new GameObject();
$inert = new Inert();
$world = new World();
$grimorio = new Grimorio();
$me = new Personagem();

// Help
$help = " --- Ajuda ---
Variaveis Globais(Objetos):
	* config
	* user
	* gameObject/go
	* inert
	* db
	* world

obs.: Para obter ajuda de uma determinada variavel basta utilizar a funcao `help`
	Exemplo: `user.help()`
";
//$grimorio = new Grimorio();
$vars = array(
	"help",
	"config",
	"user",
	"gameObject", "go",
	"inert",
	"db",
	"world",
	"grimorio",
	"me",
	"term"
);
$term = New Terminal($vars);