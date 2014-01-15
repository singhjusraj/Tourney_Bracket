<!--
File Name: create_tournament.php

Author's Name: Sukhdeep Singh, Nav Bhullar

Web Site Name: Tourney Bracket

File Description: This Page Takes the input from the User_home.php page and Insert the values into database, which results into Creating a New Tournament
-->
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Create Tournament</title>
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
			}
			else {
				
			$conn = mysqli_connect('webdesign4', 'dbxxxxxxxxx', 'xxxxx', 'dbxxxxxxxxx') or die('Error connecting to MySQL server');
			//obtain the incoming inputs from user_home.php page							
			$tourname = mysqli_real_escape_string($conn, $_POST['tourname']);
			$desc = mysqli_real_escape_string($conn, $_POST['desc']);
			$player1 = mysqli_real_escape_string($conn, $_POST['player1']);
			$player2 = mysqli_real_escape_string($conn, $_POST['player2']);
			$player3 = mysqli_real_escape_string($conn, $_POST['player3']);
			$player4 = mysqli_real_escape_string($conn, $_POST['player4']);
			$player5 = mysqli_real_escape_string($conn, $_POST['player5']);
			$player6 = mysqli_real_escape_string($conn, $_POST['player6']);
			$player7 = mysqli_real_escape_string($conn, $_POST['player7']);
			$player8 = mysqli_real_escape_string($conn, $_POST['player8']);
			$ownername = mysqli_real_escape_string($conn, $_POST['ownername']);
			$owneremail = mysqli_real_escape_string($conn, $_POST['owneremail']);
			$visible = "true";
			$TBD = "TBD";

			$conn = mysqli_connect('webdesign4', 'dbxxxxxxxxx', 'xxxxx', 'dbxxxxxxxxx') or die('Error connecting to MySQL server');
			$query = "SELECT tourname FROM tournaments";
			$result = mysqli_query($conn, $query);
			//check if the Tournament already exists or not. If yes, Display the error message. If no, Register the Tournament.
			$exist = false;
			while ($row = mysqli_fetch_array($result)) {
				if ($tourname == $row['tourname']) {
					$exist = true;
				}
			}
			if ($exist) {
				//error message
				echo '<div class="alert alert-danger alert-dismissable">';
				echo '<strong>Tournament Already Exists!</strong> Please Try with Different Tournament Name..';
				echo '</div>';
				echo '<a href="new_tournament.php" class="btn btn-danger btn-lg " role="button">Close</a></p>';

			} else {
				//create a new tournament
				$sql = "INSERT INTO `tournaments` (`tourname`, `desc`, `owneremail`, `ownername`, `player1`, `player2`, `player3`, `player4`, `player5`, `player6`, `player7`, `player8`,`winner1`,`winner2`,`winner3`,`winner4`,`semi1`,`semi2`,`winner`,`visible`) VALUES('$tourname','$desc','$owneremail','$ownername','$player1','$player2','$player3','$player4','$player5','$player6','$player7','$player8','$TBD','$TBD','$TBD','$TBD','$TBD','$TBD','$TBD','$visible')";
				mysqli_query($conn, $sql) or die('Error querying database.');
				mysqli_close($conn);
				//success message
				echo '<div class="alert alert-success alert-dismissable">';
				echo '<strong>Tournament Successfully Registered!</strong>';
				echo '</div>';
				echo '<a href="tournament.php" class="btn btn-success btn-lg " role="button">View Tournament</a></p>';
			}
			}
			?>
		</div>
	</body>
</html>
