<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/PHP/SESSION/Session.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/PHP/DATABASE/Connect.php';

// Klasa zluzaca do logowania uzytkownikow
class Login {
	private $username;
	private $password;
	private $connection;

	//Pobieranie i zapisywanie do zmiennych informacji z formularza
	public function __construct() {
		$this->username = $_POST['username'];
		$this->password = $_POST['password'];
		$this->connection = Connect::getConnection();
	}

	//Logowanie uzytkownika
	public function userLogin() {
		if($this->ifExists()) {
			$_SESSION['online'] = true;
			$_SESSION['username'] = $this->username;
			$_SESSION['password'] = $this->password;
			$_SESSION['id'] = $this->getId();
			die(header("Location: http://localhost/Project/WEB/home.php"));
		} 
		else
			die("The username or password is incorrect");
	}

	//Zwraca true jezeli uzytkownik istnieje oraz haslo jest poprawne
	public function ifExists() {
		$query = "SELECT * FROM users WHERE username='$this->username'";
		$result = $this->connection->query($query);
		$row = $result->fetch_array();

		if($result->num_rows>0 && password_verify($this->password, $row[2]))
			return true;
		else
			return false;
		$query = "";
	}

	//Zwraca id uzytkownika
	public function getId() {
		$query = "SELECT id FROM users WHERE username='$this->username'";
		$result = $this->connection->query($query);
		$row = $result->fetch_array();
		$query = "";
		return $row[0];
	}
}

$login = new Login;
$login->userLogin();

?>