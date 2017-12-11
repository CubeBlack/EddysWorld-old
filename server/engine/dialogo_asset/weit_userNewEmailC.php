<?php
if ($value == "123"||$value == "\n123") {
  $dbl->tableInsert(
    "eddysChat",
    array(0,"Grimorio","Resposta correta!")
  );
  $dbl->tableInsert(
    "eddysChat",
    array(0,"Grimorio","Para evitar interferencia na nossa comunicação, prescisso vamos criar uma palavra chave, que so nos sabemos.")
  );
  $dbl->tableInsert(
    "eddysChat",
    array(0,"System","Digite uma senha, de 8 a 20 caracteres, para senhas mais \"fortes\" recomendamos aleatoriedade utilizando maiusculas, menusculas e caracteres especiais.")
  );
  $this->setWeit("userNewPass");
}else {
  $dbl->tableInsert(
    "eddysChat",
    array(0,"Grimorio","Não, você errou, vamos tentar de novo, me diga seu endereço")
  );
  $dbl->tableInsert(
    "eddysChat",
    array(0,"System","Abra sua caixa de e-mail, e digite o codigo de verificação.")
  );
}
