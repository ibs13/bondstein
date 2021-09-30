<?php 

	ob_start();
	
	session_start();
	if(!isset($_SESSION['user']))
	{	
		header("Location:login.php");
	}

	$user = $_SESSION['user'];
	$category = $_SESSION['category'];
	
	require_once("function/function.php");

	$login = new Login();

?>

<?php include 'include/header.php'; ?>

<section style="margin-top: 300px">

	<h2 style="text-align: center;font-size: 32px;">Hello, <?php echo $user; ?></h2>
	<?php if($category=='Admin'){ ?>
	<a href="adduser.php" class="addUser">Add User</a>
	<?php } ?>

	<a href="logout.php" class="addUser">Log Out</a>

</section>

<?php include 'include/footer.php'; ?>