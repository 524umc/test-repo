<?php
//Pobiera i wyswietla informacje w do edycji
require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/PHP/SESSION/Session.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/PHP/DATABASE/Connect.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/PHP/POST/PostController.php';

//Inicjowanie klasy zarzadzajacej postami oraz zapisywanie informacji z formularza do zmiennych
$postController = new PostController;
$postId = $_POST['postId'];
$text = $postController->getText($postId);
$title = $postController->getTitle($postId);
?>

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

<div class="create-post">
	<form method="POST" action="EditPost.php">
		Title<br>
		<input type="text" name="title" value=<?php echo $title?>><br>
		Content<br>
		<textarea name="text" id="content" ><?php echo $text?></textarea><br>
		<input type="hidden" name="postId" value=<?php echo $postId ?>>
		<input type="submit" id="submit-button" value="Edit">
	</form>
</div>


</body>
</html>

