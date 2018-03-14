<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/PHP/SESSION/Session.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/PHP/DATABASE/Connect.php';

//Klasa zawierajaca metody zwiazane z zarzadzanie postami. m.in usuwanie, edytowanie, pobieranie textu z postu itp.
class PostController {
	private $connection;

	//Zapisuje do zmiennej obiekt lacznosci z baza danych
	public function __construct() {
		$this->connection = Connect::getConnection();
	}

	//Wpisuje gotowy kod HTML wysietlajacy wszystkie posty
	public function showAll() {
		$query = "SELECT title, text, date, users.username, user_id, posts.id FROM posts, users WHERE users.id = posts.user_id";
		$result = $this->connection->query($query);
		while($row = $result->fetch_array()) {
			echo<<<_END
		<ul class="post-container">
		  <li class="post-container-title">$row[0]</li><br>
		  <li class="post-container-info">$row[3] $row[2]</li><br>
		  <li class="post-container-content">$row[1]</li><br>
_END;
		// Jezeli post nalezy do aktualnie zalogowanego uzytkownika,
		// metoda dokleja kod HTML w celu ewentualnej edycji lub usuniecia postu
		if($_SESSION['id']==$row[4]) {
			echo ' 
		<form method="POST" action="/Project/WEB/DeletePost.php">
		  <input type="hidden" value=' . $row[4] . ' name="userId">
		  <input type="hidden" value=' . $row[5] . ' name="postId">
		  <input type="submit" value="Delete">
		</form>

		<form method="POST" action="/Project/WEB/editingPost.php">
		  <input type="hidden" value=' . $row[4] . ' name="userId">
		  <input type="hidden" value=' . $row[5] . ' name="postId">
		  <input type="submit" value="Edit">
		</form>';
		}



		echo "</ul>";
		}
		$query = "";
	}

	//Tworzy post w bazie danych
	public function createPost($title, $text) {
		$date = date("Y-m-d H:i:s");
		$query = "INSERT INTO posts(user_id, title, text, date) VALUES(?, ?, ?, ?);";
		$prepstmt = $this->connection->prepare($query);
		$prepstmt->bind_param("isss", $_SESSION['id'], $title, $text, $date);
		$prepstmt->execute();
		$query="";

	}

	//Usuwa post z bazy danych
	public function deletePost($postId) {
		$query = "DELETE FROM posts WHERE id=?";
		$prepstmt = $this->connection->prepare($query);
		$prepstmt->bind_param("i", $postId);
		$prepstmt->execute();
		$query="";
	}

	//Edytuje post
	public function editPost($postId, $title, $text) {
		$query = "UPDATE posts SET title=?, text=? WHERE id=?";
		$prepstmt = $this->connection->prepare($query);
		$prepstmt->bind_param("ssi", $title, $text, $postId);
		$prepstmt->execute();
		$query = "";
		header("Location: http://localhost/Project/WEB/home.php");
	}

	//Pobiera tekst postu
	public function getText($postId) {
		$query = "SELECT text FROM posts WHERE id=?";
		$prepstmt = $this->connection->prepare($query);
		$prepstmt->bind_param("i", $postId);
		$prepstmt->execute();
		$query="";

		$result = $prepstmt->get_result();
		$row = $result->fetch_array();
		$text = $row[0];
		return $text;
	}

	//Pobiera tytul postu
	public function getTitle($postId) {
		$query = "SELECT title FROM posts WHERE id=?";
		$prepstmt = $this->connection->prepare($query);
		$prepstmt->bind_param("i", $postId);
		$prepstmt->execute();
		$query="";

		$result = $prepstmt->get_result();
		$row = $result->fetch_array();
		$title = $row[0];
		return $title;
	}
}
?>