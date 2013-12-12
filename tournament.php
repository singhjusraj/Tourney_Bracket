<?php
include_once ('header.php');

	$conn = mysqli_connect('webdesign4', 'db200245935', '37949', 'db200245935') or die('Error connecting to MySQL server');
			 $query = "SELECT * FROM tournaments";
			 $result = mysqli_query($conn,$query);
			  while ($row = mysqli_fetch_array($result)) {
            	
            	echo'<h1>Tournament Name: '. $row['tourname'].'</h1>';
				echo'<h4>Description: '. $row['desc'].'</h4>';
            	echo'<h4>Tournament Owner: '. $row['ownername'].'</h4>';
            	echo'<h4>Owner Email: '. $row['owneremail'].'</h4>';
            	echo'<hr class="featurette-divider">';
				echo '<div class="bout">';
            	echo'<button type="button" class="btn btn-primary btn-lg btn-block">'.$row['player1'].'</button>';
            	echo'<button type="button" class="btn btn-primary btn-lg btn-block">'.$row['player2'] .'</button>';
            	echo'<hr class="featurette-divider">';
            	echo'<button type="button" class="btn btn-primary btn-lg btn-block">'.$row['player3'].'</button>';
            	echo'<button type="button" class="btn btn-primary btn-lg btn-block">'.$row['player4'].'</button>';
            	echo'<hr class="featurette-divider">';
            	echo'<button type="button" class="btn btn-primary btn-lg btn-block">'.$row['player5'].'</button>';
            	echo'<button type="button" class="btn btn-primary btn-lg btn-block">'.$row['player6'].'</button>';
            	echo'<hr class="featurette-divider">';
            	echo'<button type="button" class="btn btn-primary btn-lg btn-block">'. $row['player7'].'</button>';
            	echo'<button type="button" class="btn btn-primary btn-lg btn-block">'. $row['player8'].'</button>';            	
            	echo'</div>';     
            	echo '<div class="bout">';
            	echo'<button type="button" class="btn btn-primary btn-lg btn-block">'.$row['player1'].'</button>';            	            
            	echo'<button type="button" class="btn btn-primary btn-lg btn-block">'.$row['player3'].'</button>';            	
            	echo'<hr class="featurette-divider">';
            	echo'<button type="button" class="btn btn-primary btn-lg btn-block">'.$row['player5'].'</button>';            	            	
            	echo'<button type="button" class="btn btn-primary btn-lg btn-block">'. $row['player7'].'</button>';            	            	
            	echo'</div>';     
            	echo '<div class="bout">';
            	echo'<button type="button" class="btn btn-primary btn-lg btn-block">'.$row['player1'].'</button>';            	            	            	
            	echo'<button type="button" class="btn btn-primary btn-lg btn-block">'. $row['player7'].'</button>';            	            	
            	echo'</div>';               
}
?>

<?php
	include_once ('footer.php');
?>
