<?php
include "config.php";
session_start();
$username = "";
$email = "";
$errors = [];

// SIGN UP USER
if (isset($_POST['register'])) {
    if (empty($_POST['reg-username'])) {
        $errors['reg-username'] = 'Username required';
    }
    if (empty($_POST['reg-email'])) {
        $errors['reg-email'] = 'Email required';
    }
    if (empty($_POST['reg-password'])) {
        $errors['reg-password'] = 'Password required';
    }
    if (isset($_POST['reg-password']) && $_POST['reg-password'] !== $_POST['reg-passwordConf']) {
        $errors['reg-passwordConf'] = 'The two passwords do not match';
    }

    $username = $_POST['reg-username'];
    $email = $_POST['reg-email'];
    $token = bin2hex(random_bytes(50)); // generate unique token
    $password = password_hash($_POST['reg-password'], PASSWORD_DEFAULT); //encrypt password

    // Check if email already exists
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $errors['email'] = "Email already exists";
    }

    if (count($errors) === 0) {
        $query = "INSERT INTO users SET username=?, email=?, token=?, password=?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ssss', $username, $email, $token, $password);
        $result = $stmt->execute();

        if ($result) {
            $user_id = $stmt->insert_id;
            $stmt->close();

            // TO DO: send verification email to user
            // sendVerificationEmail($email, $token);

            $_SESSION['id'] = $user_id;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['verified'] = false;
            $_SESSION['message'] = 'You are logged in!';
            $_SESSION['type'] = 'alert-success';
            header('location: index.php');
        } else {
            $_SESSION['error_msg'] = "Database error: Could not register user";
        }
    }

}

// LOGIN
if (isset($_POST['login'])) {
    if (empty($_POST['username'])) {
        $errors['username'] = 'Username or email required';
    }
    if (empty($_POST['password'])) {
        $errors['password'] = 'Password required';
    }
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (count($errors) === 0) {
        $query = "SELECT * FROM users WHERE username=? OR email=? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('ss', $username, $password);

        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) { // if password matches
                $stmt->close();

                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['verified'] = $user['verified'];
                $_SESSION['message'] = 'You are logged in!';
                $_SESSION['type'] = 'alert-success';
                header('location: index.php');
                exit(0);
            } else { // if password does not match
                $errors['login_fail'] = "Wrong username / password";
            }
        } else {
            $_SESSION['message'] = "Database error. Login failed!";
            $_SESSION['type'] = "alert-danger";
        }
    }
}
echo "lefutott de minek";
?>