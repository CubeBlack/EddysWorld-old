<meta http-equiv="refresh" content="1; url='#'">
<svg
    width = "100%"
    height = "100%"
    xmlns="http://www.w3.org/2000/svg">
<?php
include_once "../engine/sala.php";
$list = Asset::aList();
foreach ($list as $key) {
  echo "<rect x=\"{$key->transform->posicao->x}\" y=\"{$key->transform->posicao->y}\" width=\"{$key->transform->dimencao->x}\" height=\"{$key->transform->dimencao->y}\" fill=\"blue\" />\n";
}
foreach ($list as $key) {
  $y = $key->transform->posicao->y + 14;
  echo "<text x=\"{$key->transform->posicao->x}\" y=\"$y\" font-size=\"14\" fill=\"red\">A:{$key->id}</text>\n";
}
?>
</svg>
