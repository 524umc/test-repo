<?php
//Tworzy post 
require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/PHP/SESSION/Session.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/PHP/DATABASE/Connect.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/PHP/POST/PostController.php';

$postController = new PostController;

$title = $_POST['title'];
$text = $_POST['text'];

$postController->createPost($title, $text);
die(header("Location: http://localhost/Project/WEB/home.php"));
?>