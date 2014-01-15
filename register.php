<!--
File Name: Register.php

Author's Name: Sukhdeep Singh, Nav Bhullar

Web Site Name: Tourney Bracket

File Description: This Page Takes the input from the Sign Up Model from Index.php page and Completes the user registration
-->
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Register Users</title>
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
		 
		$username = $_POST['username'];
		

		//check that the email entered is a proper valid email address
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

		$conn = mysqli_connect('webdesign4', 'dbxxxxxxxxx', 'xxxxx', 'dbxxxxxxxxx') or die('Error connecting to MySQL server');
			 $query = "SELECT * FROM tourney_admins";
			  $result = mysqli_query($conn, $query);
            //check if the email address already exists or not. If yes, Display the error message. If no, Register the user.
            $exist = false;
            while ($row = mysqli_fetch_array($result)) {
                if($email == $row['email']){
                    $exist = true;
                }
            }
			//the new user should have a unique email address
			//i.e. Two Users cannot have same email address
            if($exist){
            	echo '<div class="alert alert-danger alert-dismissable">';			
			echo'<strong>Email Address Already Exists!</strong> Please Try with Different Email Address..';
			echo'</div>';
			echo'<a href="index.php" class="btn btn-danger btn-lg " role="button">Close</a></p>';
                
            }
			//register the user
            else{
			$sql = "INSERT INTO tourney_admins (username, password, email) VALUES('$username','$password','$email')";
			mysqli_query($conn, $sql) or die('Error querying database.');			
			mysqli_close($conn);
			
			//show the success dialog
			echo '<div class="alert alert-success alert-dismissable">';			
			echo'<strong>User Successfully Registered!</strong>';
			echo'</div>';
			echo'<a href="index.php" class="btn btn-success btn-lg " role="button">Close</a></p>';
			}
		
		}

		?>
		</div>
	</body>
</html>
