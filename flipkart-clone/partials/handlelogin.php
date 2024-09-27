<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require(__DIR__ . "/dbconnect.php");
$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {
    if (isset($_POST['email'], $_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $query = "SELECT * FROM user WHERE email = '$email' OR username = '$email'";
        $resultexist = mysqli_query($conn, $query);
        if ($row = mysqli_fetch_assoc($resultexist)) {
            if (password_verify($password, $row["password"])) {
                $_SESSION['loggedin'] = true;
                $_SESSION['login'] = true;
                $username = $row['username'];
                $_SESSION['username'] = $username;
                header('location: /flipkart-clone/');
            } else {
                echo "Password not match";
                $_SESSION['pass_notmatch'] = true;
                header("Location: /flipkart-clone/components/login.php");
            }
        } else {
            echo "Signup first";
            header("Location: /flipkart-clone/components/signup.php");
        }
    }
}
