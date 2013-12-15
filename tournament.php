<!--
File Name: tournament.php

Author's Name: Sukhdeep Singh, Nav Bhullar

Web Site Name: Tourney Bracket

File Description: This page Displays the list of the activated Tournaments to annonymous users which inludes list of every round for each tournament and display the results of each round.
-->
<?php
include_once ('header.php');

$conn = mysqli_connect('webdesign4', 'db200245935', '37949', 'db200245935') or die('Error connecting to MySQL server');
$query = "SELECT * FROM tournaments";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result)) {
	//if the tournament is visible, display it
	if ($row['visible'] == "true") {
		
		$tournament_exist = "true";
		echo '<h1>Tournament Name: ' . $row['tourname'] . '</h1>';
		echo '<h4>Description: ' . $row['desc'] . '</h4>';
		echo '<h4>Tournament Owner: ' . $row['ownername'] . '</h4>';
		echo '<h4>Owner Email: ' . $row['owneremail'] . '</h4>';

		echo '<hr class="featurette-divider">';
		echo '<h3><strong>Super Eight</strong></h3>';
		echo '<hr class="featurette-divider">';
		echo '<div class="bout">';

		echo '<button type="button" class="btn btn-info btn-lg btn-block">' . $row['player1'] . '</button>';
		echo '<button type="button" class="btn btn-info btn-lg btn-block">' . $row['player2'] . '</button>';
		echo '<hr class="featurette-divider">';
		echo '<button type="button" class="btn btn-info btn-lg btn-block">' . $row['player3'] . '</button>';
		echo '<button type="button" class="btn btn-info btn-lg btn-block">' . $row['player4'] . '</button>';
		echo '<hr class="featurette-divider">';
		echo '<button type="button" class="btn btn-info btn-lg btn-block">' . $row['player5'] . '</button>';
		echo '<button type="button" class="btn btn-info btn-lg btn-block">' . $row['player6'] . '</button>';
		echo '<hr class="featurette-divider">';
		echo '<button type="button" class="btn btn-info btn-lg btn-block">' . $row['player7'] . '</button>';
		echo '<button type="button" class="btn btn-info btn-lg btn-block">' . $row['player8'] . '</button>';
		echo '</div>';
		
		//Results for Super Eight Round
		echo '<h4>Super Eight Results</h4>';
		if($row['winner1'] != "TBD")
		{
		if ($row['winner1'] == $row['player1']) {
			echo '<h4 class="text-success text-center lead">' . $row['player1'] . ' defeated ' . $row['player2'] . ' !</h4>';
		} else {
			echo '<h4 class="text-success text-center lead">' . $row['player2'] . ' defeated ' . $row['player1'] . ' !</h4>';
		}
		if ($row['winner2'] == $row['player3']) {
			echo '<h4 class="text-success text-center lead">' . $row['player3'] . ' defeated ' . $row['player4'] . ' !</h4>';
		} else {
			echo '<h4 class="text-success text-center lead">' . $row['player4'] . ' defeated ' . $row['player3'] . ' !</h4>';
		}
		if ($row['winner3'] == $row['player5']) {
			echo '<h4 class="text-success text-center lead">' . $row['player5'] . ' defeated ' . $row['player6'] . ' !</h4>';
		} else {
			echo '<h4 class="text-success text-center lead">' . $row['player6'] . ' defeated ' . $row['player5'] . ' !</h4>';
		}
		if ($row['winner4'] == $row['player7']) {
			echo '<h4 class="text-success text-center lead">' . $row['player7'] . ' defeated ' . $row['player8'] . ' !</h4>';
		} else {
			echo '<h4 class="text-success text-center lead">' . $row['player8'] . ' defeated ' . $row['player7'] . ' !</h4>';
		}
		}

		//Semi Final Round
		echo '<hr class="featurette-divider">';
		echo '<h3><strong>Semi Finals</strong></h3>';
		echo '<hr class="featurette-divider">';
		echo '<div class="bout">';
		echo '<button type="button" class="btn btn-warning btn-lg btn-block">' . $row['winner1'] . '</button>';
		echo '<button type="button" class="btn btn-warning btn-lg btn-block">' . $row['winner2'] . '</button>';
		echo '<hr class="featurette-divider">';
		echo '<button type="button" class="btn btn-warning btn-lg btn-block">' . $row['winner3'] . '</button>';
		echo '<button type="button" class="btn btn-warning btn-lg btn-block">' . $row['winner4'] . '</button>';
		echo '</div>';
		echo '<h4>Semi Final Results</h4>';
		if($row['semi1'] != "TBD")
		{
		if ($row['semi1'] == $row['winner1']) {
			echo '<h4 class="text-success text-center lead"> ' . $row['winner1'] . ' defeated ' . $row['winner2'] . ' !</h4>';
		} else {
			echo '<h4 class="text-success text-center lead">' . $row['winner2'] . ' defeated ' . $row['winner1'] . ' !</h4>';
		}
		if ($row['semi2'] == $row['winner3']) {
			echo '<h4 class="text-success text-center lead">' . $row['winner3'] . ' defeated ' . $row['winner4'] . ' !</h4>';
		} else {
			echo '<h4 class="text-success text-center lead">' . $row['winner4'] . ' defeated ' . $row['winner3'] . ' !</h4>';
		}
		}

		//Final Round
		echo '<hr class="featurette-divider">';
		echo '<h3><strong>Final</strong></h3>';
		echo '<hr class="featurette-divider">';

		echo '<div class="bout">';
		echo '<button type="button" class="btn btn-danger btn-lg btn-block">' . $row['semi1'] . '</button>';
		echo '<button type="button" class="btn btn-danger btn-lg btn-block">' . $row['semi2'] . '</button>';
		echo '</div>';

		echo '<hr class="featurette-divider">';
		echo '<h3><strong>Tournament Winner</strong></h3>';
		echo '<hr class="featurette-divider">';
		echo '<div class="bout">';
		echo '<button type="button" class="btn btn-success btn-lg btn-block active">' . $row['winner'] . '</button>';
		echo '</div>';
		if($row['winner'] != "TBD")
		{
		echo '<h4 class="text-success text-center lead">Congratulations ' . $row['winner'] . '!</h4>';
		echo '<h4 class="text-success text-center lead">The New World Champions!</h4>';
		}
		echo '<hr class="featurette-divider">';
	}
}
?>

<?php

//if there is no active tournament
if($tournament_exist != "true")
{
	echo'<h1 class="text-info text-center">No Current Active Tournament to Display!</h1>';
	echo '<hr class="featurette-divider">';
}
include_once ('footer.php');
?>
