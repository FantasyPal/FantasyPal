//Bryce Vokus
//Login page, if user already has account

<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>FantasyPal Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<h2>FantasyPal Login</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login">Login</button>
		</div>
		<p>
			New to FantasyPal? <a href="register.php"> Create Account</a>
		</p>
	</form>

</body>
</html>
