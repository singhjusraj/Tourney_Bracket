<!--
File Name: update_semi.php

Author's Name: Sukhdeep Singh, Nav Bhullar

Web Site Name: Tourney Bracket

File Description: This page Takes the input from the Modify.php page and makes the updation for the Super Eight Round to the Database
-->
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Update Super Eight</title>		
	</head>
	<body>	
			<?php
			//access current session
			session_start();			
			//evaluate the user_id stored in the session that was set on validate.php
			if (empty($_SESSION['user_id'])) {
				header('Location:index.php');
			} else {

				$conn = mysqli_connect('webdesign4', 'dbxxxxxxxxx', 'xxxxx', 'dbxxxxxxxxx') or die('Error connecting to MySQL server');
				
				$winner1 = $_POST['winner1'];
				$winner2 = $_POST['winner2'];
				$winner3 = $_POST['winner3'];
				$winner4 = $_POST['winner4'];				
				$id = $_POST['id'];	

				$conn = mysqli_connect('webdesign4', 'dbxxxxxxxxx', 'xxxxx', 'dbxxxxxxxxx') or die('Error connecting to MySQL server');

				$query = 'UPDATE tournaments SET winner1 = "'.$winner1.'", winner2 = "'.$winner2.'", winner3 = "'.$winner3.'", winner4 = "'.$winner4.'" WHERE id = "'.$id.'"';
				mysqli_query($conn, $query) or die('Error querying database.');
				mysqli_close($conn);
				header('Location: semi_final.php?id='.$id);				
			}
			?>		
	</body>
</html>
