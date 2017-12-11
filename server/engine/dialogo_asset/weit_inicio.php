<?php
$dbl->tableInsert(
  "eddysChat",
  array(0,"Grimorio","Ei, quem é você? já nos conhecemos?")
);
$dbl->tableInsert(
  "eddysChat",
  array(0,"System","Digite n (sim/yes/y) caso ja tenha usuario e n para caso querra fazer novo usuario agora.")
);
$this->setWeit("userLogonOrNew");
