<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/PHP/SESSION/Session.php';
Session::isOnline();

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="/Project/CSS/style.css">
	<title></title>
</head>
<body class="index-body">
	<form method="POST" action="PHP/LOGIN/Login.php" id="login">
		<table class="login">
			<tr>
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td><input type="submit" id="login-button" value="Sign in"></td>
			</tr>
		</table>
	</form>

	<form method="POST" action="PHP/REGISTER/Register.php" id="register">
		<table class="register">
			<tr>
				<td>Username</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="password" name="password_confirmation"></td>
			</tr>
			<tr>
				<td><input type="submit" id="login-button" value="Sign up"></td>
			</tr>
		</table>
	</form>
	<script>

	</script>
</body>
</html>