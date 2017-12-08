<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Change Password</h2>
	</div>
	
	<form method="post" action="changepassword.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>New Password</label>
			<input type="password" name="newpassword" value="<?php echo $newpassword; ?>">
		</div>
		<div class="input-group">
			<label>Confirm New Password</label>
			<input type="password" name="confirmpassword" value="<?php echo $confirmpassword; ?>">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="changepassword">Change</button>
		</div>
	</form>
</body>
</html>
