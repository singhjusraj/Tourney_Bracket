<!--
File Name: semi_final.php

Author's Name: Sukhdeep Singh, Nav Bhullar

Web Site Name: Tourney Bracket

File Description: This page Contains a form to decide the Winners for the Semi final round
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
	$conn = mysqli_connect('webdesign4', 'dbxxxxxxxxx', 'xxxxx', 'dbxxxxxxxxx') or die('Error connecting to MySQL server');
	$query = 'SELECT * FROM tournaments WHERE id ="'.$id.'"';
	$result = mysqli_query($conn, $query);
	while ($row = mysqli_fetch_array($result)) {

		echo '<h1>Tournament: ' . $row['tourname'] . '</h1>';
		echo '<hr class="featurette-divider">';
		echo '<form class="form-horizontal" role="form" method="post" action="update_semi.php">';
		
		echo '<h3>Semi Finals</h3>';
		echo '<hr class="featurette-divider">';
		
		echo '<div class="bout">';
		echo '<div class="input-group">';
		echo '<span class="input-group-addon">';
		echo '<input type="radio" name="semi1" value="' . $row['winner1'] . '" required>';
		echo '</span>';
		echo '<button type="button" class="btn btn-warning btn-lg btn-block">' . $row['winner1'] . '</button>';
		echo '</div>';
		echo '<p class="text-center">Vs</p>';
		echo '<div class="input-group">';
		echo '<span class="input-group-addon">';
		echo '<input type="radio" name="semi1" value="' . $row['winner2'] . '" required>';
		echo '</span>';
		echo '<button type="button" class="btn btn-warning btn-lg btn-block">' . $row['winner2'] . '</button>';
		echo '</div>';

		echo '<hr class="featurette-divider">';
		echo '<div class="input-group">';
		echo '<span class="input-group-addon">';
		echo '<input type="radio" name="semi2" value="' . $row['winner3'] . '" required>';
		echo '</span>';
		echo '<button type="button" class="btn btn-warning btn-lg btn-block">' . $row['winner3'] . '</button>';
		echo '</div>';
		echo '<p class="text-center">Vs</p>';
		echo '<div class="input-group">';
		echo '<span class="input-group-addon">';
		echo '<input type="radio" name="semi2" value="' . $row['winner4'] . '" required>';
		echo '</span>';
		echo '<button type="button" class="btn btn-warning btn-lg btn-block">' . $row['winner4'] . '</button>';
		echo '</div>';		
		echo '<hr class="featurette-divider">';
		
		echo '<input type="hidden" name="id" value="' . $id . '">';
		echo '<button type="submit" class="btn btn-primary btn-lg btn-block">Next</button>';
		echo '</form>';
		echo'</div>';
		echo '<hr class="featurette-divider">';
	}
}
require_once 'footer.php';
?>
