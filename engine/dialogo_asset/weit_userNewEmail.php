<?php
if (strripos($value, "@")&&strripos($value, ".")) {
  $caracteres = "QWERTYUIOPASDFGHJKLÇZXCVBNMqwertyuiopasdfghjklçzxcvbnm7894561230";
  $email = strtolower($value);
  $dbl->tableInsert(
    "eddysChat",
    array(0,"Grimorio","Agora você prescisa responder uma charada, paz parte do ritual, já sabe a resposta?")
  );
  $dbl->tableInsert(
    "eddysChat",
    array(0,"System","verifique na sua caixa de e-mail, e digite o codigo de verificação, [Resolver sistema de envio de e-mail]<br>Digite 123")
  );
  /*//enviar email de confirmação
  $to      = 'danie_nerd@example.com';
  $subject = 'the subject';
  $message = 'hello';
  $headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
  //mail($to, $subject, $message, $headers);
  */
  $dbl->valueIncert("userNew_email",$value);
  $this->setWeit("userNewEmailC");
}else {
  $dbl->tableInsert(
    "eddysChat",
    array(0,"Grimorio","Ammm? Isso é um endereço, verifica pra min se isso está correto. ")
  );
  $dbl->tableInsert(
    "eddysChat",
    array(0,"System","Escreva um e-mail valido.")
  );
}
