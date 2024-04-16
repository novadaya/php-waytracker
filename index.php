<?php
    include ("./src/config.php");

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

echo "Lefutott";
// Adatbázis kapcsolat bezárása
$conn->close();

?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Test Page for PHP and HTML</title>
        <script src="https://kit.fontawesome.com/0ae9cfa4e0.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>  
        <main class="main">
            <header>
                <h1>WayTracker</h1>
            </header>
            <main class="box">
                <div class="small-box"></div>
                <div class="small-box"></div>
                <div class="small-box"></div>
                <div class="small-box"></div>
                <div class="scene scene--card">
                    <div class="card">
                      <div class="card__face card__face--front">
                        <div class="flip-card">
                            <div class="card-front">
                                <div class="form-text">
                                    <h1 class="login-h1">Login</h1>
                               </div>
                              <div class="form" method="post" action="./src/login.php">
                                <div class="input-box">
                                  <i class="fa-solid fa-user favicon"></i>
                                      <input id="username" name="username" type="text"/>
                                      <label class="user-label">Username</label>
                                  </div>
                                  <div class="input-box">
                                      <i class="fa-solid fa-key  favicon"></i>
                                      <input id="password" name="password" type="password">
                                      <label class="user-label">Password</label>
                                  </div>
                                  <div class="remember-forgot">
                                      <div class="checkbox-container">
                                          <label class="checkbox-label">
                                              <input id="rememberme" name="rememberme" type="checkbox" class="checkbox">Remember me</label>
                                      </div>
                                      <a href="#" class="forgot">Forgot Password?</a>
                                  </div>
                                  <div class="input-box">
                                      <button class="btn" type="submit" name="login" value="login">
                                          <span class="text">Login</span>
                                      </button>
                                  </div>
                                  <div class="account">
                                      <p>Don't have an Account? <a onclick="myFunc()">Sign Up</a></p>
                                  </div>
                                  <div class="or">
                                      <p>Or</p>
                                  </div>
                                    <div class="social-login">
                                      <button class="facebook"><i class="fa-brands fa-facebook socialfav"></i> Login with Facebook</button>
                                      <button class="google"><i class="fa-brands fa-google-plus"></i> Login with Google</button>
                                  </div>
                              </div>
                            </div>
                        </div>
                      </div>
                      
                      <div class="card__face card__face--back">
                        <div class="flip-card">
                            <div class="card-front">
                                <div class="form-text">
                                    <h1 class="login-h1">Register</h1>
                               </div>
                              <div class="form" method="post" action="/src/register.php">
                                <div class="input-box">
                                  <i class="fa-solid fa-user favicon"></i>
                                      <input id="reg-username" name="reg-username" type="text">
                                      <label class="user-label">Username</label>
                                  </div>
                                  <div class="input-box">
                                    <i class="fa-solid fa-envelope favicon"></i>
                                        <input id="reg-email" name="reg-email" type="text">
                                        <label class="user-label">Email</label>
                                    </div>
                                  <div class="input-box">
                                      <i class="fa-solid fa-key  favicon"></i>
                                      <input id="reg-password" name="reg-password" type="password">
                                      <label class="user-label">Password</label>
                                  </div>
                                  <div class="input-box">
                                      <button class="btn" type="submit" name="register" value="register">
                                          <span class="text">Create an Account</span>
                                      </button>
                                  </div>
                                  <div class="account">
                                      <p>Have an Account? <a onclick="myFunc()">Login</a></p>
                                  </div>
                                  <div class="or">
                                      <p>Or</p>
                                  </div>
                                    <div class="social-login">
                                      <button class="facebook"><i class="fa-brands fa-facebook socialfav"></i> Login with Facebook</button>
                                      <button class="google"><i class="fa-brands fa-google-plus"></i> Login with Google</button>
                                  </div>
                              </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
        </main>
        <script src="myscript.js"></script>  
    </body>
</html>

