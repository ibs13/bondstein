<?php
	
	define("DB_HOST" , "localhost");
	define("DB_USER" , "root");
	define("DB_PASS" , ""); 
	define("DB_NAME" , "bondstein");
	
	
	class DatabaseConnection{
		public function __construct() {
			global $pdo;
			try{
				$pdo = new PDO('mysql:host=localhost;dbname=bondstein;charset=UTF8' , "root" , "");
				
			} catch(PDOException $e){ 
				exit('Database error');
			}
		}
	}

	
?>