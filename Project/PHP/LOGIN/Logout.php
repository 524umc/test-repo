<?php
//Czysci zmienne sesyjne
session_start();
session_unset();
header('Location: http://localhost/Project/index.php');
?>