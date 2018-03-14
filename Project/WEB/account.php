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
  	<li><a class="active" href="/Project/WEB/account.php">Account (<?php echo $_SESSION['username'] ?>)</a></li>
  	<li><a href="/Project/WEB/makePost.php">Create post</a></li>
  	<li><a href="/Project/PHP/LOGIN/Logout.php">Logout</a></li>
</ul>

</body>
</html>