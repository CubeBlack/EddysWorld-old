<?php
	class config_db{
		public
			$host = "localhost",
			$user = "root",
			$password = "",
			$name = "eddysworld",
			$show_error = true
		;
	}
	class config{
		function __construct(){
			$this->show_error = true;
			$this->db = new config_db();
		}
		function help(){
return " configuracoes

";
		}
	}
	
	