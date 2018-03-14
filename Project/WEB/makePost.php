<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/PHP/SESSION/Session.php';
Session::isNotOnline();

?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/Project/CSS/style.css">
	</head>
<body>

<ul>
  	<li><a href="home.php">Home</a></li>
  	<li><a href="/Project/WEB/account.php">Account (<?php echo $_SESSION['username'] ?>)</a></li>
  	<li><a class="active" href="/Project/WEB/makePost.php">Create post</a></li>
  	<li><a href="/Project/PHP/LOGIN/Logout.php">Logout</a></li>
</ul>

<div class="create-post">
	<form method="POST" action="CreatePost.php">
		Title<br>
		<input type="text" name="title"><br>
		Content<br>
		<textarea name="text" id="content"></textarea><br>
		<input type="submit" id="submit-button" value="Create">
	</form>
</div>


</body>
</html>