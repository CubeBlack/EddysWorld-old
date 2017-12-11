<?php
if($value == "s"){
  $dbl->tableInsert(
    "eddysChat",
    array(0,"Grimorio","Nesse caso, me diga quem é você.")
  );
  $dbl->tableInsert(
    "eddysChat",
    array(0,"System","Digite seu usuario")
  );
  $this->setWeit("userLogonNick");
}
elseif($value == "n") {
  $dbl->tableInsert(
    "eddysChat",
    array(0,"Grimorio","Quem é você, ou como devo lhe chamar?")
  );
  $dbl->tableInsert(
    "eddysChat",
    array(0,"System","Digit seu Nick, um nome para a seu personagem, deve ser unico, e não será posivel alera-lo.")
  );
  $this->setWeit("userNewNick");
}
else {
  $dbl->tableInsert(
    "eddysChat",
    array(0,"Grimorio","Não entendi, poderia repetir?")
  );
  $dbl->tableInsert(
    "eddysChat",
    array(0,"System","Digite n (sim/yes/y) caso ja tenha usuario e n para caso querra fazer novo usuario agora.")
  );
}
