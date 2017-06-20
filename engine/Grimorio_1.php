<?php
/**
 *
 */
//----------- DBL -------------
require_once 'User.php';
require_once 'sala.php';
$dbl->tableCreat(
  "eddysChat",
  array(
    "id",
    "user",
    "msg"
  )
);
$dbl->valueCreat("GrimorioWeit");

$dbl->valueCreat("userNew_nick");
$dbl->valueCreat("userNew_pass");
$dbl->valueCreat("userNew_email");
$dbl->valueCreat("userNew_key");

$dbl->valueCreat("userLogon_nick");
$dbl->valueCreat("userLogon_pass");
//----------- DBL -------------
require_once "User.php";
class Grimorio
{
  //public $weit;
  function __construct()  {
    //$this->setWeit("alkjsdhf");
  }
  public function historico()  {
    if(!User::logued()){
      global $dbl;
      if ($resposta = $dbl->tableSelect("eddysChat")) {
        return $resposta;
      }
      else {
        include "grimorio_asset/weit_inicio.php";
      }
    }
    else {
      global $dbs;
      if ($dbs->tableSelect("eddysChat","")) {
        $dbs->tableInsert(
          "eddysChat",
          array(0,"Player","")
        );
      }
      else {
        $dbs->tableInsert(
          "eddys_Chat",
          array(0,"Player","")
        );
      }
      $table = $dbs->tableSelect("eddys_Chat","");
      if($table){
        foreach ($table as $key => $value) {
          if ($value["de"] == 0) {
            $retorno[$key]["user"] = "System";
          }
          else if($value["de"] == 1){
            $retorno[$key]["user"] = "Grimorio";
          }
          else {
            $retorno[$key]["user"] = User::getNick($value["de"]);
          }
          $retorno[$key]["msg"] = $value["msg"];
        }
      return $retorno;
      }
    }
  }
  public function interacao($plataforma="face", $id="",$value="")
  {
    $resposta = array(
      "resposta" => "Resposta do grimorio",
      "log"=>array("interacao"),
      "func"=>"none",
      "weit"=>"{$this->getWeit()}"
    );
     //msg=sended
    $user = User::Perfil();
    if($plataforma == "face"){
        if($user["id_message"] == ""){
            array_push($resposta["log"],"não registrado");
        }
        global $dbs;
        $dbs->tableInsert(
          "eddys_Chat",
          array(NULL,$id,0,$value)
        );

        $dbs->tableInsert(
          "eddys_Chat",
          array(NULL,1,$id,"Resposta")
        );
        $resposta["resposta"] = "Você Ainda não esta registrado, Acesse o aplicativo https://apps.facebook.com/eddysword/?fb_source=search,ou a nossa pagina https://dannkestudios.websiteseguro.com/Eddysword/facebook";
    }
    else{
        $resposta = array(
          "resposta" => "plataforma não reconhecida!",
          "log"=>array("msg=sended"),
          "func"=>"none",
          "weit"=>"{$this->getWeit()}"
        );
    }
    if($this->isFunction($value))
      array_push($resposta["log"],"é uma função");
    else
      array_push($resposta["log"],"não é gfunção");

     
    return $resposta;
  }

  public function setWeit($value){
    global $dbl;
    $this->weit = $value;
    $dbl->valueIncert("GrimorioWeit",$value);
  }
  public function getWeit(){
    global $dbl;
    return $this->weit = $dbl->valueSelect("GrimorioWeit");
  }
  public function isFunction($str='')  {
    if ($str[strlen($str)-1] == ")" && $str[strlen($str)-2] == "(") {
      return true;
    }
  }
}

//$grimorio = new Grimorio();
//$resposta = $grimorio->interacao("face", User::getId(), "sdfgsdfg");
//var_dump($resposta);