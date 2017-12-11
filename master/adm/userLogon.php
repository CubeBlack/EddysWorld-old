<pre>
<?php
  if (isset($_GET["nick"])) {
    require_once '../engine/sala.php';
    $nick = $_GET["nick"];
    $pass = $_GET["pass"];
    if(User::logon($nick, $pass)){
      echo "logued";
    }else {
      echo "Senha ou user invalido";
    }

  }
  else {
    echo "enpty";
  }
?>
<hr>
<form class="" action="" method="get">
  <p><label>Nick: </label><input type="text" name="nick" value=""></p>
  <p><label>Pass: </label><input type="text" name="pass" value=""></p>
  <p><input type="submit" name="" value="Cadastrar"></p>
</form>
