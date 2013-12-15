<!--
File Name: update_semi.php

Author's Name: Sukhdeep Singh, Nav Bhullar

Web Site Name: Tourney Bracket

File Description: This page Takes the input from the semi_final.php page and makes the updation to the database
-->
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Update Semi Final Winners</title>		
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

				$conn = mysqli_connect('webdesign4', 'db200245935', '37949', 'db200245935') or die('Error connecting to MySQL server');

				$semi1 = $_POST['semi1'];
				$semi2 = $_POST['semi2'];
				
				$id = $_POST['id'];	

				$conn = mysqli_connect('webdesign4', 'db200245935', '37949', 'db200245935') or die('Error connecting to MySQL server');

				$query = 'UPDATE tournaments SET semi1 = "'.$semi1.'", semi2 = "'.$semi2.'" WHERE id = "'.$id.'"';
				mysqli_query($conn, $query) or die('Error querying database.');
				mysqli_close($conn);
				header('Location: final.php?id='.$id);
				
			}
			?>
		</div>
	</body>
</html>