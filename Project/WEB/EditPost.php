<?php
//Edytuje post
require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/PHP/SESSION/Session.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/PHP/DATABASE/Connect.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/PHP/POST/PostController.php';

$postController = new PostController;

$text = $_POST['text'];
$title = $_POST['title'];
$postId = $_POST['postId'];

$postController->editPost($postId, $title, $text);
?>