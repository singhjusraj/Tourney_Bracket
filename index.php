<?php
require_once 'header.php';
?>

<div class="jumbotron">

	<h1>Create &amp; Organize Your Own Tournament!</h1>
	<p>
		Sign Up Today for free and Create Your Own Unlimited Number of Tournaments. Active your Tournament,
		Customize it, and Display the the End Winners.
	</p>
	<p>
		<a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" role="button">Sign Up</a>
	</p>
	<h2>Already a Member!</h2>
	<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#signInModal">
		Sign In
	</button>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">Sign Up</h4>
			</div>
			<div class="modal-body">

				<form class="form-horizontal" role="form" method="post" action="register.php">
					<div class="form-group">
						<label for="username" class="col-sm-2 control-label">Username</label>
						<div class="col-sm-10">
							<input type="text" name="username" class="form-control" id="username" placeholder="Username" required="Username is Required">
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" name="email" class="form-control" id="email" placeholder="Email" required="Email is Required">
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" name="password" class="form-control" id="password" placeholder="Password" required="Password is required">
						</div>
					</div>

			</div>
			<div class="modal-footer">

				<button type="submit" class="btn btn-primary">
					Sign Up
				</button>
				</form>
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Close
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal -->
<div class="modal fade" id="signInModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="myModalLabel">Sign In</h4>
			</div>
			<div class="modal-body">

				<form class="form-horizontal" role="form" method="post" action="validate.php">

					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" name="email" class="form-control" id="email" placeholder="Email" required="Email is Required!" >
						</div>
					</div>
					<div class="form-group">
						<label for="password" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" name="password" class="form-control" id="password" placeholder="Password" required="Password is Required!">
						</div>
					</div>

			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">
					Sign In
				</button>
				</form>
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Close
				</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
require_once 'footer.php';
?>