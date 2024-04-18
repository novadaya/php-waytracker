<?php
    include ("config.php");

    // Regisztráció kezelése
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $username = $_POST['reg-username'];
    $email = $_POST['reg-email'];
    $password = $_POST['reg-password'];

    // Ellenőrizd, hogy a felhasználónév és az email cím létezik-e már
    $check_query = "SELECT * FROM users WHERE username='$username' OR email='$email'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        echo "Username or email already exists.";
    } else {
        // Felhasználó hozzáadása az adatbázishoz
        $insert_query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($insert_query) === TRUE) {
            echo "Registration successful.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
echo "Kész";
// Adatbázis kapcsolat bezárása
$conn->close();

?>