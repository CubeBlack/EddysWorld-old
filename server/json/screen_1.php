<!--meta http-equiv="refresh" content="1; url='#'"-->
<style>
  body{
    margin: 0;
  }
  svg{
    width: 100%;
    height: 100%;
    border: solid 3px red;
  }
  #grade{
    stroke:rgb(255,0,0);
    stroke-width:1;
  }
  #inert{
    fill:white;
    stroke-width:1;
    stroke:rgb(0,0,0);
  }
  #path{
    stroke:grey;
    fill:grey;
    stroke-width:1;
    font-size: 12;
  }
  #player{
    fill:blue;
  }
</style>
<?php
$viewX = 100;
$viewY = 50;
$viewZ = 3;
$gizmo = 10;
//header('Content-Type: application/json');

if(file_exists("engine/sala.php")){
  require_once "engine/sala.php";
}
else if(file_exists("../engine/sala.php")){
  require_once "../engine/sala.php";
}
else {
  echo "Não foi posivel encontrar sala.php";
  die();
}

$lista = $sala->assetList();
$path = $sala->pathList();
//var_dump($path);
?>
<svg>
?>
<?php

//exibir os inertes
foreach ($lista as $key => $value) {
  if ($value["tipo"] == "inert") {
    $newX = ($value["pos_x"] + $viewX) * $viewZ;
    $newY = ($value["pos_y"] + $viewY) * $viewZ;
    $newWidth = $value["dim_x"] * $viewZ;
    $newHeight = $value["dim_y"] * $viewZ;
    echo "<rect id = \"inert\" x= \"$newX\" y= \"$newY\" width=\"$newWidth\" height=\"$newHeight\" />";

    $tX = $newX  + ($newWidth) ;
    $tY = $newY + ( $newY - $newY ) / 2 ;
    echo "<text id = \"path\" x=\"$tX\" y=\"$tY\">$key</text>";
  }
}

//exibir PathLine
foreach ($path as $key => $value) {
  $newX1 = ($value["x1"] + $viewX) * $viewZ;
  $newY1 = ($value["y1"] + $viewY) * $viewZ;
  $newX2 = ($value["x2"] + $viewX) * $viewZ;
  $newY2 = ($value["y2"] + $viewY) * $viewZ;
  $newR = 3 * $viewZ;

  echo "<circle id = \"path\" cx=\"$newX1\" cy=\"$newY1\" r=\"3\" />";
  echo "<circle id = \"path\" cx=\"$newX2\" cy=\"$newY2\" r=\"3\" />";
  echo "<line id = \"path\" x1=\"$newX1\" y1=\"$newY1\" x2=\"$newX2\" y2=\"$newY2\" />";
  if ($newX1 < $newX2)
    $tX = $newX1 + ( $newX2 - $newX1) / 2 ;
  else
    $tX = $newX2 + ( $newX1 - $newX2 ) / 2;

  if ($newY1 < $newY2)
      $tY = $newY1 + ( $newY2 - $newY1 ) / 2 ;
  else
      $tY = $newY1 + ( $newY2 - $newY1 ) / 2 ;
  echo "<text id = \"path\" x=\"$tX\" y=\"$tY\">$key</text>";
}
//players
foreach ($lista as $key => $value) {
  if ($value["tipo"] == "player") {
    $newX = ($value["pos_x"] + $viewX) * $viewZ;
    $newY = ($value["pos_y"] + $viewY) * $viewZ;
    $newR = $value["dim_x"] * $viewZ;
    echo "<circle id = \"player\" cx=\"$newX\" cy=\"$newY\" r=\"5\" />";
  }
}
//--------------------------display
//grade
for ($linha=30; $linha < 2000; $linha+=30) {
  //echo "<line id = \"grade\" x1=\"{$linha}\" y1=\"0\" x2=\"{$linha}\" y2=\"2000\" />";
//  echo "<line id = \"grade\" line x1=\"0\" y1=\"{$linha}\" x2=\"2000\" y2=\"{$linha}\" />";
}
//gizmo
echo "<text x=\"5\" y=\"15\">Z = $viewZ, X = $viewX, Y = $viewY</text>";
$newX1 = $viewX + $gizmo;
$newY1 = $viewY + $gizmo;
$newX2 = $viewX - $gizmo;
$newY2 = $viewY - $gizmo;

echo "<line id = \"grade\" x1=\"$newX1\" y1=\"$newY1\" x2=\"$newX2\" y2=\"$newY2\" />";
$newX1 = $viewX - $gizmo;
$newY1 = $viewY + $gizmo;
$newX2 = $viewX + $gizmo;
$newY2 = $viewY - $gizmo;
echo "<line id = \"grade\" x1=\"$newX1\" y1=\"$newY1\" x2=\"$newX2\" y2=\"$newY2\" />";

$newR = $gizmo/2;
echo "<circle id = \"grade\" cx=\"$viewX\" cy=\"$viewY\" r=\"$newR\" />";
?>

</svg>
