<?php
    // Kapcsolódás az adatbázishoz
$servername = "sql203.epizy.com";
$username = "epiz_33437673";
$password = "OaC1st5ykv";
$dbname = "epiz_33437673_waytracker";

$conn = new mysqli($servername, $username, $password, $dbname);

// Ellenőrzi a kapcsolatot
if ($conn->connect_error) {
   die("Connection failed: " . $connection->connect_error);
}
echo "Connection";
?>