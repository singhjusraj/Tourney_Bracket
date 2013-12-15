<!--
File Name: header.php

Author's Name: Sukhdeep Singh, Nav Bhullar

Web Site Name: Tourney Bracket

File Description: This Page Contains the Consistent Nav Bar for the Site
-->
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Tourney Brackets</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<link href='http://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet' type='text/css'>
		<!-- Bootstrap CSS -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="../assets/js/html5shiv.js"></script>
		<![endif]-->

	</head>

	<body>

		<nav class="navbar navbar-inverse" role="navigation">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Tourney Bracket</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li>
						<a href="index.php">Home</a>
					</li>

					<li>
						<a href="tournament.php">Tournaments</a>
					</li>
					<?php
					//access current session
					session_start();

					if (empty($_SESSION['user_id'])) {
					} else {
						$conn = mysqli_connect('webdesign4', 'db200245935', '37949', 'db200245935') or die('Error connecting to MySQL server');
						$query = "SELECT * FROM tourney_admins";
						$userID = $_SESSION['user_id'];
						$sql = "SELECT email,username FROM tourney_admins where id = $userID";
						$result = mysqli_query($conn, $query);
						$email = mysqli_query($conn, $sql);
						while ($address = mysqli_fetch_array($email)) {
							$emailAddress = $address['email'];
							$user = $address['username'];
						}
						while ($row = mysqli_fetch_array($result)) {

							if ($emailAddress == $row['email']) {

								echo '<li>';
								echo '<a href="user_home.php">' . $user . '</a>';
								echo '</li>';
							}
						}
						mysqli_close($conn);
					}
					?>
				</ul>

			</div><!--/.nav-collapse -->
		</nav>
		<div class="container">
