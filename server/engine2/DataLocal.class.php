<?php
	class DataLocal{
		public $data;
		function __construct(){
			if(!isset($_SESSION))
				session_start();
			if(isset($_SESSION["DataLocal"])){
				$this->get();
			}
			else{
				$this->data = (Object)array();
				$this->save();
			}
		}
		function insert($valueName, $value){	
			$this->data->{$valueName} = $value;
			return $this->save();
		}
		function save(){
			$dblJson = json_encode($this->data);
			return $_SESSION["DataLocal"] = $dblJson;
			
		}
		function get(){
			$dblStr = "";
			$dblStr = $_SESSION["DataLocal"];
			$this->data = json_decode($dblStr);
			
		}
		function clear(){
			return session_destroy();
			
		}
	}
	
