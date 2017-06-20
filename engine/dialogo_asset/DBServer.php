<?php
class DBServer
  {
    public $mePDO;
    public $table;

    public function __construct($db_host, $db_user, $db_password, $db_name){
      try {
        $db = new PDO("mysql:host={$db_host};dbname={$db_name}", $db_user, $db_password);
        $txtQuery = "select now()";
      } catch (PDOException $e) {
          print "<pre>Error(DateBase::construct)!".$e->getMessage();
          die();
      }
      $this->mePDO = $db;
    }
    public function addTable(){
      //
    }
    public function tableInsert($table,$values){
      global $error_show;
      $query = "";
      $query .= "INSERT INTO `$table` VALUES(";
      for ($i = 0; $i < count($values) - 1; $i++) {
        $query .= "'{$values[$i]}',";
      }
      $query .= "'{$values[$i]}'";
      $query .= ");";
      $results = $this->mePDO->query($query);
      if($this->mePDO->errorInfo()[1] != NULL) {
          if($error_show){
            echo "Error (Date::tableInsert)" .
              $this->mePDO->errorInfo()[1] .
              ": " .
              $this->mePDO->errorInfo()[2]
            ;
          }
          return false;
      }
      return $this->mePDO->lastInsertid();
    }
    public function tableGet ($table,$parametro){
      global $error_show;
      $query = "
          SELECT * FROM `$table`
          $parametro
          ORDER BY id DESC
          LIMIT 10
      ";
      $results = $this->mePDO->query($query);

      if($this->mePDO->errorInfo()[1] != NULL) {
          if($error_show) echo "Error (DateBase::tableGet)" . $this->mePDO->errorInfo()[1] . ": " . $this->mePDO->errorInfo()[2];
          return false;
      }
      if(!$results) return false;
      return $results->fetchAll();
    }
    public function tableUpdate($table,$values){

    }
    public function lineGet ($table,$id){

    }

    public function lineCelula ($table,$id,$coluna){

    }

    public function setDBConfig(){

    }
  }
