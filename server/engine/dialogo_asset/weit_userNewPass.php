<?php
include_once "weit_userNewNick.php";
$pass = $value;
$dbl->valueIncert("userNew_pass",$pass);
$dbl->tableInsert(
  "eddysChat",
  array(0,"Grimorio","Pra ter certeza, repita pra min")
);
$dbl->tableInsert(
  "eddysChat",
  array(0,"System","digite novamente a senha.")
);
$this->setWeit("userNewPassC");
