<!--
File Name: update_final.php

Author's Name: Sukhdeep Singh, Nav Bhullar

Web Site Name: Tourney Bracket

File Description: This page takes the input from the final.php page and makes the updation to the database
-->
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Update Final Winners</title>		
		<link href="css/bootstrap.css" rel="stylesheet">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
	</head>
	<body>

		<div class="container">
			<?php
			//access current session
			session_start();			
			//evaluate the user_id stored in the session that was set on validate.php
			if (empty($_SESSION['user_id'])) {
				header('Location:index.php');
			} else {

				$conn = mysqli_connect('webdesign4', 'dbxxxxxxxxx', 'xxxxx', 'dbxxxxxxxxx') or die('Error connecting to MySQL server');

				$winner = $_POST['winner'];				
				
				$id = $_POST['id'];	

				$conn = mysqli_connect('webdesign4', 'dbxxxxxxxxx', 'xxxxx', 'dbxxxxxxxxx') or die('Error connecting to MySQL server');

				$query = 'UPDATE tournaments SET winner = "'.$winner.'" WHERE id = "'.$id.'"';
				mysqli_query($conn, $query) or die('Error querying database.');
				mysqli_close($conn);

				echo '<div class="alert alert-success alert-dismissable">';
				echo '<strong>Tournament Successfully Updated!</strong>';
				echo '</div>';
				echo '<a href="tournament.php" class="btn btn-success btn-lg " role="button">View Tournament</a></p>';
				
			}
			?>
		</div>
	</body>
</html>
