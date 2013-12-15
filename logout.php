<!--
File Name: logout.php

Author's Name: Sukhdeep Singh, Nav Bhullar

Web Site Name: Tourney Bracket

File Description: This page logs the user out of the business contacts page and closes all connections
-->
<!DOCTYPE html>
<html lang="en">
	<head></head>
	<body>
		<?php

		//access the existing session object
		session_start();

		//remove all the variables from existing session
		session_unset();

		//get rid of current session
		session_destroy();

		//redirect to the login page
		header('Location:index.php');
	?>
	</body>
</html>