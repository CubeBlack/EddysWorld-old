<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dialogo
 *
 * @author Danie
 */
class Oracao {
    static function resposta($parameter){
        $resposta[0]["resp"]["msg"] = "Erro ao procurar resposta";
        global $dbs;
        $dialog = $dbs->tableSelect("eddys_dialogo","");
        if (!$dialog) return $resposta;
        //$resp = json_decode($dialog[0]["resp"]);
        foreach ($dialog as $key => $value) {
            $strResp = $value["resp"];
            $respObj = json_decode($strResp);
            $resposta[$key]["resp"] = $respObj;
            
            $strAnchor = $value["anchor"];
            $objAnchor = json_decode($strAnchor);
            $resposta[$key]["anchor"] = $objAnchor;
            
            $resposta[$key]["id"] = $value["id"];
        }
        //$resposta["resposta"] = $resp->msg;
        return $resposta;
    }
    static function add($sitJson,$msgJson){
        global $dbs;
        $dialogoId = $dbs->tableInsert("eddys_dialogo",array(
            "null",
            $sitJson,
            $msgJson
        ));
        return $dialogoId;
    }
    static function Drop($id){
        global $dbs;
        //DELETE FROM `web_jogos`.`eddys_dialogo` WHERE `id`='8';
        $droped = $dbs->tableDrop("eddys_dialogo",$id);
        return $droped;
    }
    public function seach(){
        
    }
    public function makeLike($parameter=""){
        
    }
    //public set
}
