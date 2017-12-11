<?php
$nick = $value;
$dbl->valueIncert("userNew_nick",$nick);
$dbl->tableInsert(
  "eddysChat",
  array(0,"Grimorio","Bom $nick, agora me diga seu endereço, Você sabe, do outro mundo.")
);
$dbl->tableInsert(
  "eddysChat",
  array(0,"System","Digite seu e-mail,um valido, ok? sem ele não poderemos recuperar sua senha.")
);
$dbl->valueIncert("userNew_nick",$nick);
$this->setWeit("userNewEmail");
