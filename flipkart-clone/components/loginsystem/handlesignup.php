<?php
include(__DIR__ . '/../../partials/dbconnect.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {
    if (isset($_POST['username'], $_POST['email'], $_POST['password'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $query = "SELECT * FROM user WHERE email = '$email' OR username = '$username'";
        $resultexist = mysqli_query($conn, $query);
        if ($row = mysqli_fetch_assoc($resultexist)) {
            if ($row['username'] == $username) {
                echo "username already taken";
                header("Location: /flipkart-clone/components/login.php");
            }
            if ($row['email'] == $email) {
                echo "email already taken";
                header("Location: /flipkart-clone/components/login.php");
            }
        } else {
            if ($password == $cpassword) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `user` (`username`, `email`, `password`) VALUES ('$username', '$email', '$hash')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    $_SESSION['loggedin'] = true;
                    header("location: /flipkart-clone/");
                }
            }
            else{
                $_SESSION['pass_notmatch'] = true;
                header("location: /flipkart-clone/");
            }
        }
    }
}