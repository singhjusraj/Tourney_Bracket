<!--
File Name: Modify.php

Author's Name: Sukhdeep Singh, Nav Bhullar

Web Site Name: Tourney Bracket

File Description: This Page Lets the logged in user Hide or Show the tournament and decide the winners for Super Eight Round
-->
<?php
//access current session
			session_start();			
			//evaluate the user_id stored in the session that was set on validate.php
			if (empty($_SESSION['user_id'])) {
				header('Location:index.php');
			} else {
require_once 'header.php';
//grab the selected id from the url
$id = $_GET['id'];
$conn = mysqli_connect('webdesign4', 'db200245935', '37949', 'db200245935') or die('Error connecting to MySQL server');
$query = 'SELECT * FROM tournaments WHERE id ="'.$id.'"';
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result)) {

	echo '<h1>Tournament: ' . $row['tourname'] . '</h1>';
	//if already visible show the link to hide the tournament
	if($row['visible'] == "true")
	{
		echo'<h4 class="text-success">Tournament Visible to Public</h4>';
		echo '<form class="form-horizontal" role="form" method="post" action="toggle_tournament.php">';
		echo'<input type="hidden" name="visible" value="false">';
		echo'<input type="hidden" name="id" value="'.$id.'">';
		echo '<button type="submit" class="btn btn-warning btn-lg">Hide Tournament</button>';
		echo'</form>';
	}
	//if already hidden show the link to Make the Tournament Visible
	else {
		echo'<h4 class="text-warning">Tournament Hidden</h4>';
		echo '<form class="form-horizontal" role="form" method="post" action="toggle_tournament.php">';
		echo'<input type="hidden" name="visible" value="true">';
		echo'<input type="hidden" name="id" value="'.$id.'">';
		echo '<button type="submit" class="btn btn-success btn-lg">Make Visible</button>';
		echo'</form>';
	}
	
	//form to decide the winners for the Super Eight Round
	echo '<hr class="featurette-divider">';
	echo '<form class="form-horizontal" role="form" method="post" action="update_tournament.php">';	
	echo '<h3>Super Eight</h3>';	
	echo '<hr class="featurette-divider">';	
	
	echo '<div class="bout">';
	echo '<div class="input-group">';
	echo '<span class="input-group-addon">';
	echo '<input type="radio" name="winner1" value="' . $row['player1'] . '" required>';
	echo '</span>';
	echo '<button type="button" class="btn btn-info btn-lg btn-block">' . $row['player1'] . '</button>';
	echo '</div>';
	echo'<p class="text-center">Vs</p>';
	echo '<div class="input-group">';
	echo '<span class="input-group-addon">';
	echo '<input type="radio" name="winner1" value="' . $row['player2'] . '" required>';
	echo '</span>';
	echo '<button type="button" class="btn btn-info btn-lg btn-block">' . $row['player2'] . '</button>';
	echo '</div>';
	
	echo '<hr class="featurette-divider">';
	echo '<div class="input-group">';
	echo '<span class="input-group-addon">';
	echo '<input type="radio" name="winner2" value="' . $row['player3'] . '" required>';
	echo '</span>';
	echo '<button type="button" class="btn btn-info btn-lg btn-block">' . $row['player3'] . '</button>';
	echo '</div>';
	echo'<p class="text-center">Vs</p>';
	echo '<div class="input-group">';
	echo '<span class="input-group-addon">';
	echo '<input type="radio" name="winner2" value="' . $row['player4'] . '" required>';
	echo '</span>';
	echo '<button type="button" class="btn btn-info btn-lg btn-block">' . $row['player4'] . '</button>';
	echo '</div>';
	
	echo '<hr class="featurette-divider">';
	echo '<div class="input-group">';
	echo '<span class="input-group-addon">';
	echo '<input type="radio" name="winner3" value="' . $row['player5'] . '" required>';
	echo '</span>';
	echo '<button type="button" class="btn btn-info btn-lg btn-block">' . $row['player5'] . '</button>';
	echo '</div>';
	echo'<p class="text-center">Vs</p>';
	echo '<div class="input-group">';
	echo '<span class="input-group-addon">';
	echo '<input type="radio" name="winner3" value="' . $row['player6'] . '" required>';
	echo '</span>';
	echo '<button type="button" class="btn btn-info btn-lg btn-block">' . $row['player6'] . '</button>';
	echo '</div>';
	
	
	echo '<hr class="featurette-divider">';
	echo '<div class="input-group">';
	echo '<span class="input-group-addon">';
	echo '<input type="radio" name="winner4" value="' . $row['player7'] . '" required>';
	echo '</span>';
	echo '<button type="button" class="btn btn-info btn-lg btn-block">' . $row['player7'] . '</button>';
	echo '</div>';
	echo'<p class="text-center">Vs</p>';
	echo '<div class="input-group">';
	echo '<span class="input-group-addon">';
	echo '<input type="radio" name="winner4" value="' . $row['player8'] . '" required>';
	echo '</span>';
	echo '<button type="button" class="btn btn-info btn-lg btn-block">' . $row['player8'] . '</button>';
	echo '</div>';
		
	echo '<input type="hidden" name="id" value="'.$id.'">';	
	echo '<hr class="featurette-divider">';
	echo '<button type="submit" class="btn btn-primary btn-lg btn-block">Next</button>';
	echo'</div>';
	echo '</form>';
	echo '<hr class="featurette-divider">';
}
}
require_once 'footer.php';
?>