<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/PHP/SESSION/Session.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Project/PHP/DATABASE/Connect.php';

//Klasa rejestrujaca uzytkownika do bazy danych
class Register {
	private $username;
	private $password;
	private $connection;

	//Zapisuje do zmiennych pobrane dane z formularza
	//oraz obiekt lacznosci z baza danych
	public function __construct() {
		$this->username = $_POST['username'];
		$this->password = $_POST['password'];
		$this->password = $_POST['password_confirmation'];
		$this->connection = Connect::getConnection();
	}

	//Hashuje haslo
	public function hashThePassword() {
		$this->password = password_hash($this->password, PASSWORD_DEFAULT);
	}

	//Dodaje uzytkownika do bazy danych i odsyla do logowania/rejestracji
	public function addUserToDB() {
		$this->hashThePassword();
		if($this->ifExists()) {
			die("Username is already exists");
		}
		$query = "INSERT INTO users(username, password) VALUES(?, ?);";
		$prepstmt = $this->connection->prepare($query);
		$prepstmt->bind_param("ss", $this->username, $this->password);
		$prepstmt->execute();

		$this->connection->close();
		header("Location: http://localhost/Project/");
	}

	//Zwraca wartosc true jezeli podana nazwa uzytkownika juz istnieje w bazie danych
	public function ifExists(){
		$query = "SELECT username FROM users WHERE username='?'";
		$prepstmt = $this->connection->prepare($query);
		$prepstmt->bind_param("s", $this->username);
		$prepstmt->execute();
		$result = $prepstmt->get_result();
		$query = "";

		if($result->num_rows>0)
			return true;
		else
			return false;
	}
}

$register = new Register;
$register->addUserToDB();
?>