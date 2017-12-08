<?php include('server.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>FanastyPal Security Questions</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Answer Security Questions</h2>
	</div>
	
	<form method="post" action="answersecurityquestions.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>What is the name of your favorite sports team?</label>
			<input type="text" name="question1" value="<?php echo $question1; ?>">
		</div>
		<div class="input-group">
			<label>What was the model of your first car?</label>
			<input type="text" name="question2" value="<?php echo $question2; ?>">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="answersecurityquestions">Submit Answers</button>
		</div>
	</form>
</body>
</html>
