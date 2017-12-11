<?php
/**
 *
 */
class Asset
{
  public $id;
  public $nome;
  public $tipo;
  function __construct($id="")
  {
    //$this->transfom = new Transform();
  }
  public function transform(){
     $resposta = new Transform(); 
     return $resposta;
  }
}
