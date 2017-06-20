<?php
  if (isset($_GET["nick"])) {
    require_once '../engine/sala.php';
    $nick = $_GET["nick"];
    $email = $_GET["email"];
    $pass = $_GET["pass"];
    $id = User::newUser($nick, $email, $pass);
    echo "novo usuario, ID = $id";
  }
  else {
    echo "enpty";
  }
?>
<hr>
<form class="" action="" method="get">
  <p><label>Nick: </label><input type="text" name="nick" value=""></p>
  <p><label>E-mail: </label><input type="text" name="email" value=""></p>
  <p><label>Pass: </label><input type="text" name="pass" value=""></p>
  <p><input type="submit" name="" value="Cadastrar"></p>
</form>
