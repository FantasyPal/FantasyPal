<?php 
	session_start(); //start current session

	if (!isset($_SESSION['username'])) { //if user name is empty, throw error
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}

	if (isset($_GET['logout'])) { //if user clicks to logout, return user to login page
		session_destroy();
		unset($_SESSION['username']);
		header("location: login.php");
	}
	setcookie("user", $_SESSION['username']);

?>
<!DOCTYPE html>
<html>
<head>
	<title>FantasyPal Home Page</title> <!-- home page title -->
	<link rel="stylesheet" type="text/css" href="style.css"> 
</head>
<body>
	<div class="header">
		<h2>FantasyPal Home</h2>
	</div>
	<div class="content">

		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome user: <strong><?php echo $_SESSION['username']; ?></strong></p>
			<p> View our player <a href="rankings.php" style="color: red;">Rankings</a> </p>
			<p> View our player <a href="statistics.php" style="color: red;">Statistics</a> </p>
			<p> <a href="answersecurityquestions.php" style="color: red;">Change Password</a> </p>
			<p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>
		<?php endif ?>
	</div>
		
</body>
</html>
