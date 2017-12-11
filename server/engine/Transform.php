<?php
/**
 *
 */
class Transform
{
  public $position;
  public $rotation;
  public $dimension;
  function __construct()
  {
    $position = new Vector2();
    $rotation = new Vector2();
    $dimension = new Vector2();
  }
}
