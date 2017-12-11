<?php
	class config_db{
		public
			$host = "localhost:3307",
			$user = "root",
			$password = "usbw",
			$name = "eddysworld",
			$show_error = false
		;
		
	}
	class config{
		
		function __construct(){
			$this->show_error = true;
			$this->db = new config_db();
		}
	}