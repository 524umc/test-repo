<?php
//Usuwa post
require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/PHP/SESSION/Session.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/PHP/DATABASE/Connect.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/PHP/POST/PostController.php';

$postController = new PostController;

$postId = $_POST['postId'];
echo $postId;
$postController->deletePost($postId);

die(header("Location: http://localhost/Project/WEB/home.php"));
?>