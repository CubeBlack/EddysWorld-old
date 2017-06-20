<?php
require_once '../engine/sala.php';
$lista = $sala->assetList();
echo "<table border = \"1\" width = \"100%\"> ";
echo "<tr>";
echo "<td>kay";
echo "<td>id";
echo "<td>pos_x";
echo "<td>pos_y";
echo "<td>dim_x";
echo "<td>dim_y";
echo "<td>rot_x";
echo "<td>rot_y";
foreach ($lista as $key => $value) {
  echo "<tr>";
  echo "<td>$key";
  echo "<td>{$value["id"]}";
  echo "<td>{$value["pos_x"]}";
  echo "<td>{$value["pos_y"]}";
  echo "<td>{$value["dim_x"]}";
  echo "<td>{$value["dim_y"]}";
  echo "<td>{$value["rot_x"]}";
  echo "<td>{$value["rot_y"]}";

}
echo "</table>";

