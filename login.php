<?php ob_start(); ?>
<?php
	
	session_start();
	if(isset($_SESSION['user']))
	{	
		//if a user logged in then this page will redirect to his profile page
		header("Location:index.php");
	}
	
	require_once("function/function.php");

	$login = new Login();

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
							
							$user=$pass = "";
							
							if($_SERVER['REQUEST_METHOD']=='POST'){
								
								$user = test_input($_POST['user']);
								$pass = test_input($_POST['pass']);
								
								if(empty($_POST['user']) or empty($_POST['pass'])){
									echo  "<p style='color:red'>* All field must be filled up...</p>";
								}
								else{
								
									$var = $login->login($user,$pass);
									
									if($var){
										header("location: index.php");
									}else{
										echo $var;
										echo "<p style='color:red'>Invalid login Id or password. Please try again.</p>";
									}
										
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
						
						<label for="user">Login Id : </label>
						<input type="user" placeholder="Enter your login id" name="user" id="user" />
						<label for="pass">Password : </label>
						<input type="password" placeholder="Enter your password" name="pass" id="pass" />
						<input type="submit" value="Login" />
						
						
					</form>
				
				</div>
			
				
			
			</div>
			
			<div class="col-sm-1"></div>
				
		</div>
	
	</section>
	
<?php include 'include/footer.php'; ?>