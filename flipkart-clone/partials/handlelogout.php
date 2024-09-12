<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$redirect_url = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/flipkart-clone/'; // Get the previous page URL or default to /forums/


session_unset();
session_destroy();
header("location: ".$redirect_url);
?>