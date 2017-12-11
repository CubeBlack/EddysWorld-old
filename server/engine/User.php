<?php
/**
 *
 */
 require_once "configDBS.php";
 //--------------- DBL -----------------
 $dbl->valueCreat("userId");
 $dbl->valueCreat("userNick");
 $dbl->valueCreat("userFacebookId");
 $dbl->valueCreat("userMessageId");
 //--------------- DBL -----------------
class User
{

  function __construct()
  {
    # code...
  }
  static function newUser($nick = "",$email = "",$pass = "")
  {
    global $dbs;
    return $dbs->TableInsert("eddys_user", array(
      "Null", $nick, $email, $pass
    ));
  }
  static function logued()
  {
    global $dbl;
    if ($dbl->valueSelect("userId")) {
      return true;
    }
  }
  static function getId()
  {
    global $dbl;
    return $dbl->valueSelect("userId");
  }
  static function getNick($value='')
  {
    global $dbl;
    return $dbl->valueSelect("userNick");
  }
  static function logon($email = "",$pass = "")
  {
    global $dbs, $dbl;
    if($tabela = $dbs->tableSelect("eddys_user","WHERE nick = '$email' and senha = '$pass'")){
        global $dl;
        $dbl->valueIncert("userId",$tabela[0]["id"]);
        $dbl->valueIncert("userNick",$tabela[0]["nick"]);
        return true;
    }
    echo $email."|".$pass;
  }
  static function forceLogon($id, $tipo, $nick = ""){
    if($tipo = "face"){
        global $dbs, $dbl;
        $thisUsser = $dbs->tableSelect("eddys_user","WHERE id_facebook = '$id';");
        if($thisUsser){
            $dbl->valueIncert("userId",$thisUsser[0]["id"]);
        }
        else{
            echo "usario não existe";
            $newUserId = $dbs->TableInsert("eddys_user", array(
                //id
                null,
                //nick
                null,
                //email
                null,
                //senha
                null,
                //grimorio
                null,
                //id_facebook
                $id,
                //id_message
                null,
                //id_skype
                null,
                //id_whatsapp
                null
            ));
            $dbl->valueIncert("userId",$newUserId);
        }
    }
}
static function perfil($id = ""){
    global $dbs, $dbl;
    if($id==""){
        $id = User::getId();
        return $dbs->tableSelect("eddys_user","WHERE id = '$id';")[0];
    }
    return $dbs->tableSelect("eddys_user","WHERE id = '$id';")[0];
}

static function sair()
  {
    global $dbl;
    $dbl->destroy();
  }
  static public function isNick($value='')
  {
    # code...
  }
  static function isEmail(){

  }
  static function isNew(){
      
  }
  static function newCheck(){
      global $dbs;
      $characters = '123456789qwertyuiopasdfghjklzxcvbnm';
      $key = "";
      for($i = 0; $i < 5; $i++){
          $rand = mt_rand(0, strlen($characters)-1);
          $key .= $characters[$rand];
      }
      //UPDATE `web_jogos`.`eddys_user` SET `check`='adsf' WHERE `id`='1';
      $id = User::getId();
      $dbs->tableUpdateOne("eddys_user", "check",$key,"WHERE `id`='$id'");
      return $key;
  }

}
