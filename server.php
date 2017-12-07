//Bryce Vokus
//php file used for connection to server

<?php 
session_start(); 
// variable declaration
$username = "";
$email    = "";
$errors = array(); 
$_SESSION['success'] = "";

$servername = "dbsrv2.cs.fsu.edu";
    $dbname = "hapgooddb";
    $usrname = "hapgood";
    $pasword = "CEN4020SH";
                                            
    // Create connection to the server
    $db = new mysqli($servername, $usrname, $pasword, $dbname);
  
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

	// make sure no input fields are left blank
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($password_1)) { array_push($errors, "Password is required"); }

	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt user password before saved in the database
		$query = "INSERT INTO users (username, email, password) 
				  VALUES('$username', '$email', '$password')";
		mysqli_query($db, $query);
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
		$password = md5($password);
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


?>
