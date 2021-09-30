<?php

	require "config/config.php";
	
	class AddUser{
		function __construct(){
			$database = new DatabaseConnection();
		}
			
		public function addUser($user,$loginId,$pass,$category){
				global $pdo;
				
				$query = $pdo->prepare("SELECT id FROM user_info WHERE UserLoginId = ?");
				
				$query->execute(array($loginId));
				$userData = $query->fetch();
				
				$num = $query->rowCount();

				if($num == 0){

					$pass1 = md5($pass);

					$query = $pdo->prepare("INSERT INTO user_info(Username, UserLoginId, Password, UserCategory) VALUES(?,?,?,?)");
						
					$query->execute(array($user,$loginId,$pass1,$category));
					$biodata = $query->fetch();
						
					$msg = "<p style='color:green'>User is successfully added.</p>";
					
				}else{
					$msg = "<p style='color:red'>Login Id is already exist!</p>";
				}
				
			return $msg;
					
		}
				
	}

	

	class Login{
		function __construct(){
			$database = new DatabaseConnection();
		}
			
			
			public function login($user,$pass){
			
				global $pdo;

				$pass1 = md5($pass);
				
				$query = $pdo->prepare("SELECT id , Username , UserCategory FROM user_info WHERE UserLoginId = ? AND Password = ?");
				
				$query->execute(array($user,$pass1));
				$userData = $query->fetch();
				
				$num = $query->rowCount();
				
				if($num == 1){
					
					session_start();
					
					$_SESSION['login'] = true;
					$_SESSION['id'] = $userData['Id'];
					$_SESSION['user'] = $userData['Username'];
					$_SESSION['category'] = $userData['UserCategory'];
					
					return true;
				}else{
					return false;
				}
		
			}
			
	}

	

?>