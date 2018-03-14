<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/PHP/SESSION/Session.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/PHP/POST/PostController.php';
$postController = new PostController;
Session::isNotOnline();

?>
<!DOCTYPE html>
<html>
	<head>
    <link rel="stylesheet" type="text/css" href="/Project/CSS/style.css">
		<style>
		</style>
	</head>
<body>
<ul>
  	<li><a class="active" href="/Project/WEB/home.php">Home</a></li>
  	<li><a href="/Project/WEB/account.php">Account (<?php echo $_SESSION['username'] ?>)</a></li>
  	<li><a href="/Project/WEB/makePost.php">Create post</a></li>
  	<li><a href="/Project/PHP/LOGIN/Logout.php">Logout</a></li>
</ul>

	<?php 
	//Wysietla wszystkie posty
	$postController->showAll();
	?>

</body>

</html>