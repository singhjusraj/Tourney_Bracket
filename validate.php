<!--
File Name: validate.php

Author's Name: Sukhdeep Singh

Web Site Name: Tourney Bracket

File Description: This page takes the credentials entered by the user in the login dialog
and checks in the database if the credentials are correct and logs the user in otherwise gives
and error message showing that email or password is incorrect
-->
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title></title>
		<link href="css/bootstrap.css" rel="stylesheet">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>		
	</head>
	<body>
		<div class="container">
		<?php
		$email = $_POST['email'];
		//hash the password
		$password = sha1($_POST['password']);
		//check that the email entered is a proper valid email address
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

			$conn = mysqli_connect('webdesign4', 'db200245935', '37949', 'db200245935') or die('Error connecting to MySQL server');

			$sql = "SELECT id FROM tourney_admins WHERE email = '$email' AND password = '$password'";
			$result = mysqli_query($conn, $sql) or die('Error querying database.');
			$count = mysqli_num_rows($result);
			if ($count == 1) {
				while ($row = mysqli_fetch_array($result)) {
					//access the existing session created by the web server
					session_start();
					//store the user id in the session object
					$_SESSION['user_id'] = $row['id'];
					header('Location:user_home.php');
				}
			} else {

		?>
		<div class="alert alert-danger alert-dismissable">
			
			<strong>Username or Password is Incorrect!</strong> Please Try again..
		</div>
		<a href="index.php" class="btn btn-danger btn-lg " role="button">Close</a></p>
		<?php
		}
		}
		else {
		?>
		<div class="alert alert-danger alert-dismissable">
			
			<strong>Invalid email address!</strong> Please enter valid email address..
		</div>
		<a href="index.php" class="btn btn-danger btn-lg " role="button">Close</a></p>
		<?php
		}
		mysqli_close($conn);
		?>
		</div>
	</body>
</html>
