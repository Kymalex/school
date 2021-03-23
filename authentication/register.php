<?php
session_start();
$servername= 'localhost';
$username= 'root';
$password= '';
$dbname= 'school';

$conn = new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_error) {
	echo "connection failed" . $conn->connect_error;
}

$usernames = $email = $password = $encrypted_pass = '';
$usernameErr = $emailErr = $passwordErr = '';

//session variables
$_SESSION['userRegistered'] = 'Registration successful';
$_SESSION['notRegistered'] = 'Registration not successful';
$_SESSION['classTypeSuccess'] = 'success';
$_SESSION['classtypeError'] = 'danger';
$_SESSION['userTaken'] = "Wrong credentials, try again or create an account";

if (isset($_POST['save'])) {
	# code...
	if (empty($_POST['username'])) {
		# code...
		$usernameErr = "username is required";
	} else {
		$usernames = $_POST['username'];
	}

	if (empty($_POST['email'])) {
		# code...
		$emailErr = "Email is required";
	} else {
		$email = $_POST['email'];
	}	

	if (empty($_POST['password'])) {
		# code...
		$passwordErr = "Password is required";
	} else {
		$password = $_POST['password'];
		$encrypted_pass = md5($password);
	}

	// fetching records to compare sign up details
	$sql = "SELECT * FROM users WHERE username='$usernames' && email='$email'";
	//execute the query
	$result = mysqli_query($conn,$sql);
	//finding the number of rows which match my sql query
	$num = mysqli_num_rows($result);
	// check if the implementations above
	echo "number of row(s) that match reg details" . $num;

	if ($num >= 1) {
		# code...
		$_SESSION['userTaken'];
		header("../index.php?wrongCred");
	} else {
		if (empty($usernameErr) && empty($emailErr) && empty($passwordErr)) {
		# code...
		$stmt = $conn->prepare("INSERT INTO users (username,email,password) VALUES (?,?,?)");
		$stmt->bind_param("sss",$usernames,$email,$encrypted_pass);

		if ($stmt->execute() === TRUE) {
			# code...
			$_SESSION['userRegistered'];
			$_SESSION['classTyppeSuccess'];
			header('location: ../index.php?registered=true');

		} else {

			$_SESSION['notRegistered'];
			$_SESSION['classTyppeError'];
			header('location: ../index.php?notreg=false');


		}
	}

	}

	



}



?>
