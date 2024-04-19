<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "phpmyadmin";

// Kapcsolódás az adatbázishoz
$conn = new mysqli($servername, $username, $password, $database);

// Ellenőrzi a kapcsolatot
if ($conn->connect_error) {
   die("Connection failed: " . $connection->connect_error);
}
// Kapcsolódás lezárása

?>