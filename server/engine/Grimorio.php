<?php
require_once 'Oracao.php';
require_once 'DBLocal.php';
require_once 'configDBL.php';
require_once 'User.php';
//---------- DBL
$dbl->valueCreat("GrimorioWeit");
//---------- DBL

class Grimorio{
    public function interacao($plataforma="face", $id="",$value=""){
        $resposta["resposta"] = "Null";
        $resposta["log"] = array("none" => "none");
        $resposta["func"] = array("none" => "none");
        
        //$resposta = Oracao::resposta($this->sitiation());
        $situacao = $this->sitiation();
        $send = true;
        while($send){
            $resposta = Oracao::resposta($this->sitiation());
            if($resposta["func"]!=""){
                Func::exec($resposta["func"],"");
            }
            if($resposta["func"]!=""){
                //
            }
            if($resposta["send"]!="") $send = false;
            $send = false;
        }
        return $resposta;
    }
    public function weitGet(){
        global $dbl;
        return $dbl->valueSelect("GrimorioWeit");
    }
    public function weitSet($newWeit){
        global $dbl;
        return $dbl->valueIsert("GrimorioWeit",$newWeit);
    }
    public function sitiation(){
      $resposta = array(
          "weit"=>$this->weitGet(),
      );
      $perfil = User::perfil();
        $resposta["plataforma"] = "";
        $resposta["value"] = "";
        $resposta["weit"] = "{$this->weitGet()}";
      if($perfil["id_message"]==""){
          $resposta["id_message"] = "";
      }
      return $resposta;
    }
}
$grim = new Grimorio();
$resposta = $grim->interacao();
var_dump($resposta);