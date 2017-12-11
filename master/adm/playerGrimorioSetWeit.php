<h1>
<?php
include_once '../engine/sala.php';
$meGrimorio =  $sala->mePlayer()->grimorio;
if (isset($_GET["value"])) {
  $meGrimorio->setWeit($_GET["value"]);
}
echo "Grimorio Weit: '" . $meGrimorio->getWeit() . "'";
?>
</h1>
<form class="" action="" method="GET">
  <input type="text" name="value" value="">
  <input type="submit" name="" value="Enviar">
</form>
<?php
