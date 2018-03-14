<?php

//Klasa wiazujaca polaczenie z baza danych
class Connect{
    private static $hn;
    private static $un;
    private static $pw;
    private static $db;
    private static $connection;

    //Laczy sie z baza danych
    public function __construct() {
        self::$hn = 'localhost';
        self::$un = 'root';
        self::$pw = '';
        self::$db = 'project';
        self::$connection = new mysqli(self::$hn, self::$un, self::$pw, self::$db);
        self::$connection->set_charset('utf8');
        if(self::$connection->connect_errno > 0)
            die("Błąd podczas połaczenia z serwerem.\nError: " . self::$connection->connect_errno);
    }

    //Zwraca obiekt polaczenia
    public static function getConnection() {
        return self::$connection;
    }
}

$connect = new Connect;
?>