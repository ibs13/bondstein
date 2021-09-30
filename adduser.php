<?php ob_start(); ?>
<?php
	
	session_start();
	if(!isset($_SESSION['user']))
	{	
		//if a user logged in then this page will redirect to his profile page
		header("Location:login.php");
	}

	if($_SESSION['category']!='Admin'){
		header("Location:index.php");
	}
	
	require_once("function/function.php");

	$add = new AddUser();

?>


<?php include 'include/header.php'; ?>
	
	<section>
	
		<div class="row" style="margin: 0;">
			
			<div class="col-sm-1"></div>
			
			<div class="col-sm-10 poster">
				
				<div class="signin">
				
					<div class="mgs">
					
						<?php
						
							//define variables and set empty value
							
							$user=$loginId=$pass=$category= "";
							
							if($_SERVER['REQUEST_METHOD']=='POST'){
								
								$user = test_input($_POST['user']);
								$loginId = test_input($_POST['loginId']);
								$pass = test_input($_POST['pass']);
								$category = test_input($_POST['category']);
								
								if(empty($_POST['user']) or empty($_POST['pass']) or empty($_POST['loginId']) or empty($_POST['category'])){
									echo  "<p style='color:red'>* All field must be filled up...</p>";
								}
								else{
								
									$var = $add->addUser($user,$loginId,$pass,$category);
									
									
									echo $var;
										
								}
							}
							
							
							function test_input($data){
									$data = trim($data);
									$data = stripslashes($data);
									$data = htmlspecialchars($data);
									
									return $data;
								}
								
						?>
					
					</div> 
				
					<form class="form2" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

						<h2>Login Here</h2>
						
						<label for="user">Username : </label>
						<input type="user" placeholder="Enter your Username" name="user" id="loginId" /><label for="user">Login Id : </label>
						<input type="loginId" placeholder="Enter your login id" name="loginId" id="loginId" />
						<label for="pass">Password : </label>
						<input type="password" placeholder="Enter your password" name="pass" id="pass" />
						<select name="category" id="category">
							<option value="">Select Category</option>
							<option value="Admin">Admin</option>
							<option value="Customer">Customer</option>
						</select>
						<input type="submit" value="Add User" />
						
						
					</form>
				
				</div>
			
				
			
			</div>
			
			<div class="col-sm-1"></div>
				
		</div>
	
	</section>
	
<?php include 'include/footer.php'; ?>