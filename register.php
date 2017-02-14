<!DOCTYPE html>
<html>
	<?php session_start(); ?>
	<head>
		<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
		<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
		<style>
			/* Begin Common CSS */
			* {box-sizing:border-box;}
			ul {list-style-type: none;}
			body {
				font-family: Verdana,sans-serif;
				min-width: 45em;
				position: relative;
			}
			/* End Common CSS */
		</style>
	</head>
	<body style="overflow-x: scroll;">
		<!-- Header -->
		<div data-role="header">
			<h1>MMU CONNECT</h1>
		</div>
		<div data-role="main" style="text-align: center">
			<form method="post" action="checkRegister.php">
				<div>
					<h3>Personal information</h3>
					<label for="usrnm" class="ui-hidden-accessible">Username:</label>
					<input type="text" name="myusername" id="myusername" placeholder="Username">
					<label for="pswd" class="ui-hidden-accessible">Password:</label>
					<input type="password" name="mypassword" id="mypassword" placeholder="Password">
					<input type="submit" data-inline="true" value="Submit">
				</div>
			</form>
		</div>
	</body>
</html>