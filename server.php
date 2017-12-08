<?php 
session_start(); 
// variable declaration
$username = "";
$email    = "";
$question1 = "";
$question2 = "";
$errors = array(); 
$_SESSION['success'] = "";

$db = mysqli_connect('localhost', 'root', '', 'registration');
  
 if ($db->connect_error){
        die("Connection Failed: " . $db->connect_error);
    }
//    echo "Connected successfully";

// REGISTER USER
if (isset($_POST['register'])) {
	// receive all input values from the form
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
	$question1 = mysqli_real_escape_string($db, $_POST['question1']);
	$question2 = mysqli_real_escape_string($db, $_POST['question2']);

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($password_1)) { array_push($errors, "Password is required"); }

	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = $password_1;//encrypt the password before saving in the database
		$query = "INSERT INTO users (username, email, password, question1, question2) 
				  VALUES('$username', '$email', '$password', '$question1', '$question2')";
		mysqli_query($db, $query);
		$makeroster = "INSERT INTO UserTeam (userID) VALUES ('$username')";
		mysqli_query($db, $makeroster);
		setcookie("user", $username);
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "Welcome! You are now logged into your FanastyPal Account";
		header('location: index.php');
	}



}


if (isset($_POST['login'])) {
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0) {
		$password = $password;
		$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
		$cookie_name = "user";
		setcookie($cookie_name, $username);
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) {
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged into your FanastyPal Account!";
			header('location: index.php');
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

if (isset($_POST['answersecurityquestions'])) {
	$question1 = mysqli_real_escape_string($db, $_POST['question1']);
	$question2 = mysqli_real_escape_string($db, $_POST['question2']);

	if (empty($question1)) {
		array_push($errors, "Question1 is required");
	}	
	if (empty($question2)) {
		array_push($errors, "Question2 is required");
	}

	if (count($errors) == 0) {
		$query = "SELECT * FROM users WHERE question1='$question1' AND question2='$question2';";
		$cookie_name = "user";
		setcookie($cookie_name, $username);
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) {
			header('location: changepassword.php');
		}else {
			array_push($errors, "Incorrect Security Answers");
		}
	}

}

if (isset($_POST['changepassword'])) {
	$newpassword = mysqli_real_escape_string($db, $_POST['newpassword']);
	$confirmpassword = mysqli_real_escape_string($db, $_POST['confirmpassword']);

	if (empty($newpassword)) {
		array_push($errors, "New Password is required");
	}	
	if (empty($confirmpassword)) {
		array_push($errors, "Password is required");
	}


	if ($newpassword == $confirmpassword) {
		$query = "UPDATE users SET password = '$newpassword' WHERE username = '" . $_SESSION['username'] . "';";
		$results = mysqli_query($db, $query);
		header('location: index.php');

	}

}

?>
