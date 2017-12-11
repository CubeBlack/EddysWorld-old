<?php
/**
 *
 */
 require_once "Player.php";

class Word
{
  public $asset;
  public $position;
  public $viwArea;
  function __construct()
  {
    $this->asset[0] = new Player;
  }
  public function Frame()
  {
    # code...
  }
  public function mePlayer()
  {
    return $this->asset[0];
  }
  public function assetList($value='')
  {
    global $dbs;
    return $dbs->tableSelect("eddys_asset","");
  }
  public function assetLoad(){

  }
  public function pathList(){
    global $dbs;
    $variable = $dbs->tableSelect("eddys_pathpoint","");
    foreach ($variable as $key => $value) {
      $pointList[$value["id"]]["x"] = $value["x"];
      $pointList[$value["id"]]["y"] = $value["y"];
      $pointList[$value["id"]]["link"] = $value["link"];
    }

    foreach ($pointList as $key => $value) {
      if($value["link"]){
        $otherId = $value["link"];
        $newKey = "{$key}|{$otherId}";
        $pathList[$newKey]["x1"] = $value["x"];
        $pathList[$newKey]["y1"] = $value["y"];
        $pathList[$newKey]["x2"] = $pointList[$otherId]["x"];
        $pathList[$newKey]["y2"] = $pointList[$otherId]["y"];
      }
    }
    //$pathList = $pointList;
    return $pathList;
  }
  

}
