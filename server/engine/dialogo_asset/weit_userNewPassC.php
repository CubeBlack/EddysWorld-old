<?php
include_once "weit_userNewNick.php";
$dbl->tableInsert(
  "eddysChat",
  array(0,"Grimorio","Pra ter certeza, repita pra min")
);
$dbl->tableInsert(
  "eddysChat",
  array(0,"System","digite novamente a senha.")
);
$id = User::newUser(
  $dbl->valueSelect("userNew_nick"),
  $dbl->valueSelect("userNew_email"),
  $dbl->valueSelect("userNew_pass")
);
//$dbl->destroy();
$this->setWeit("");
User::logon(
  $dbl->valueSelect("userNew_email"),
  $dbl->valueSelect("userNew_pass")
);
