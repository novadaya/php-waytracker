<?php
    include ("config.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        // Ellenőrzi a felhasználót az adatbázisban
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);
    
        if ($result->num_rows == 1) {
            // Sikeres bejelentkezés
            session_start();
            $_SESSION['username'] = $username;
            // Átirányítja a Dashboard-ra
            header("Location: dashboard.php");
            exit();
        } else {
            // Sikertelen bejelentkezés
            echo "Invalid username or password.";
        }
    }
    
    // Kapcsolat bontása
    $conn->close();
?>
