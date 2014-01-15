<!--
File Name: user_home.php

Author's Name: Sukhdeep Singh, Nav Bhullar

Web Site Name: Tourney Bracket

File Description: This page is the first page when the user loggs into the Site which Gives the user options to Logout, Create a new tournament, or Modify the existing tournaments
-->
<?php

	//access current session
	session_start();

	//evaluate the user_id stored in the session that was set on validate.php
	if (empty($_SESSION['user_id'])) {
		header('Location:index.php');
		
	} 
	else {
		$conn = mysqli_connect('webdesign4', 'dbxxxxxxxxx', 'xxxxx', 'dbxxxxxxxxx') or die('Error connecting to MySQL server');
		$userID = $_SESSION['user_id'];
		$sql = "SELECT email,username FROM tourney_admins where id = $userID";
		$email = mysqli_query($conn, $sql);
		while ($address = mysqli_fetch_array($email)) {
							$emailAddress = $address['email'];
							$user = $address['username'];
		}
		mysqli_close($conn);
		require_once 'header.php';
?>
<h1>Welcome <?php echo $user; ?>!</h1>;
<hr class="featurette-divider">

<!--Logout Button-->
<a href="logout.php" role="button" class="btn btn-primary btn-lg">Logout</a>

<hr class="featurette-divider">

<!--Modify Existing Button-->
<button class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#tournamentModal">
		Modify Existing
	</button>
	
<!--Create New Tournament Form-->	
<h1>Create a New Tournament</h1>

<hr class="featurette-divider">

<form class="form-horizontal" role="form" method="post" action="create_tournament.php">
	<div class="form-group">
		<label for="tourname" class="col-sm-2 control-label">Tournament Name</label>
		<div class="col-sm-10">
			<input type="text" name="tourname" class="form-control" id="tourname" placeholder="Tournament Name" required="">
		</div>
	</div>
	<div class="form-group">
		<label for="desc" class="col-sm-2 control-label">Short Description</label>
		<div class="col-sm-10">
			<input type="text" name="desc" class="form-control" id="desc" placeholder="Description" required="">
		</div>
	</div>
	<hr class="featurette-divider">
	<div class="form-group">
		<label for="player1" class="col-sm-2 control-label">Player Name</label>
		<div class="col-sm-10">
			<input type="text" name="player1" class="form-control" id="player1" placeholder="1st Player Name" required="">
		</div>
	</div>
	<div class="form-group">
		<label for="player2" class="col-sm-2 control-label">Player Name</label>
		<div class="col-sm-10">
			<input type="text" name="player2" class="form-control" id="player2" placeholder="2nd Player Name" required="">
		</div>
	</div>
	<div class="form-group">
		<label for="player3" class="col-sm-2 control-label">Player Name</label>
		<div class="col-sm-10">
			<input type="text" name="player3" class="form-control" id="player3" placeholder="3rd Player Name" required="">
		</div>
	</div>
	<div class="form-group">
		<label for="player4" class="col-sm-2 control-label">Player Name</label>
		<div class="col-sm-10">
			<input type="text" name="player4" class="form-control" id="player4" placeholder="4th Player Name" required="">
		</div>
	</div>
	<div class="form-group">
		<label for="player5" class="col-sm-2 control-label">Player Name</label>
		<div class="col-sm-10">
			<input type="text" name="player5" class="form-control" id="player5" placeholder="5th Player Name" required="">
		</div>
	</div>
	<div class="form-group">
		<label for="player6" class="col-sm-2 control-label">Player Name</label>
		<div class="col-sm-10">
			<input type="text" name="player6" class="form-control" id="player6" placeholder="6th Player Name" required="">
		</div>
	</div>
	<div class="form-group">
		<label for="player7" class="col-sm-2 control-label">Player Name</label>
		<div class="col-sm-10">
			<input type="text" name="player7" class="form-control" id="player7" placeholder="7th Player Name" required="">
		</div>
	</div>
	<div class="form-group">
		<label for="player8" class="col-sm-2 control-label">Player Name</label>
		<div class="col-sm-10">
			<input type="text" name="player8" class="form-control" id="player8" placeholder="8th Player Name" required="">
		</div>
	</div>
	<input type="hidden" name="ownername" value="<?php echo $user ?>">
	<input type="hidden" name="owneremail" value="<?php echo $emailAddress ?>">
	<hr class="featurette-divider">
	<button type="submit" class="btn btn-primary btn-lg btn-block">
		Create &amp; Activate
	</button>
</form>
<hr class="featurette-divider">
	
<!-- Existing Tournaments Modal -->
<div class="modal fade" id="tournamentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">Choose Tournament</h4>
			</div>
			<div class="modal-body">
				<?php
				$conn = mysqli_connect('webdesign4', 'db200245935', '37949', 'db200245935') or die('Error connecting to MySQL server');
				$query = 'SELECT id,tourname FROM `tournaments` where `owneremail` = "'.$emailAddress.'"';
				
				$tournaments = mysqli_query($conn, $query);				
				while ($row = mysqli_fetch_array($tournaments)) 
				{
					echo'<a href="Modify.php?id='.$row['id'].'" role="button" class="btn btn-primary btn-lg">'.$row['tourname'] .'</a>';
				}
				mysqli_close($conn);
			?>

			</div>			
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
}
require_once 'footer.php';
?>
