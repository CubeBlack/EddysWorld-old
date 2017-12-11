<?php
/**
 *
 */
  require_once "Asset.php";
  require_once 'Grimorio.php';
  require_once "User.php";
class Player extends Asset
{
  public $grimorio;
  public $quest;
          function __construct()
  {
    $this->grimorio = new Grimorio;
  }
  public function chatList()
  {
    return $this->grimorio->historico();
  }
  public function chatSend($plataforma,$id,$msg,$situacao="")
  {
    $retorno = $this->grimorio->interacao($plataforma,$id,$msg)[0];
    if($retorno==null)return;
    /*
    if ($retorno["func"]=="none") {
      array_push($retorno["log"],"func=none");
    }
    else {
      try {
        include "player_asset/func_getPosition.php";
      } catch (Exception $e) {
        array_push($retorno["log"],"Função não encontrada");
      }
    }
     * 
     */
     return $retorno;
    
  }
  public function sitiation(){
      $resposta = array(
         "logon"=> User::logued(),
         "quest" => $this->quest,
      );
      //var_dump($resposta);
      return $resposta;
  }
  public function sitiationAll(){
      $resposta = $this->grimorio->sitiation() + $this->sitiation();
      return $resposta;
  }

}

//$player = new Player();
//$resposta = $player->chatSend("face", "1", "adsfasdfasdf");
//var_dump($resposta);

