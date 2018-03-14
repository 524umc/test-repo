<?php

//Rozpoczyna sesje
session_start();
class Session {
	public static function isOnline() {
		if(isset($_SESSION['online']) && $_SESSION['online']) {
			header("Location: http://localhost/Project/WEB/home.php");
		}
	}

	public static function isNotOnline() {
		if(!$_SESSION['online']) {
			header("Location: http://localhost/Project/index.php");
		}
	}
}
$session = new Session;
?>