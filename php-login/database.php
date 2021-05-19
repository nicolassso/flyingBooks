<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "flyingbooks";

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);

} catch (PDOException  $e) {
    die("Fallo de conexión: ".$e->getMessage());
}


?>