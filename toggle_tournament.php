<!--
File Name: toggle_tournament.php

Author's Name: Sukhdeep Singh, Nav Bhullar

Web Site Name: Tourney Bracket

File Description: This page takes the input from the Modify.php page and toggles the tournament to hidden or visible and redirects back to the Modify.php page
-->
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Toggle Tournament</title>		
	</head>
	<body>
		
			<?php
			//access current session
			session_start();			
			//evaluate the user_id stored in the session that was set on validate.php
			if (empty($_SESSION['user_id'])) {
				header('Location:index.php');
			} else {

				$conn = mysqli_connect('webdesign4', 'db200245935', '37949', 'db200245935') or die('Error connecting to MySQL server');
				
				$visible = $_POST['visible'];							
				$id = $_POST['id'];	

				$conn = mysqli_connect('webdesign4', 'db200245935', '37949', 'db200245935') or die('Error connecting to MySQL server');

				$query = 'UPDATE tournaments SET visible = "'.$visible.'" WHERE id = "'.$id.'"';
				mysqli_query($conn, $query) or die('Error querying database.');
				mysqli_close($conn);
				header('Location: Modify.php?id='.$id);				
			}
			?>
		</div>
	</body>
</html>