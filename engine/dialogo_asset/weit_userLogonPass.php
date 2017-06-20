<?php
$dbl->valueIncert("userLogon_pass",$value);
$pass = $dbl->valueSelect("userLogon_pass");
$nick = $dbl->valueSelect("userLogon_nick");
//$dbl->destroy();
if (User::logon($nick, $pass)) {
  $dbl->tableInsert(
    "eddysChat",
    array(0,"System","logado")
  );
}
else {
  $dbl->tableInsert(
    "eddysChat",
    array(0,"System","Senha invalida")
  );
  $dbl->tableInsert(
    "eddysChat",
    array(0,"Grimorio","Algo está errado, vamos tentar de novo.")
  );
  include "weit_inicio.php";
}
