<?php
$dbl->tableInsert(
  "eddysChat",
  array(0,"Grimorio","Sim... Agora me conte algo que so você sabe.")
);
$this->setWeit("userPass");
$dbl->tableInsert(
  "eddysChat",
  array(0,"System","Digite sua senha")
);
$dbl->valueIncert("userLogon_nick",$value);
$this->setWeit("userLogonPass");
