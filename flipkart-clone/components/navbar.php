<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require(__DIR__ . '/../partials/dbconnect.php');
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $loggedin = true;
    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
} else {
    $loggedin = false;
}
echo '
<nav class="navbar navbar-expand-lg navbar-tertiary bg-body px-4 fixed-top">
<div class="container-fluid ">
<a class="navbar-brand" href="/flipkart-clone/"><img src="https://static-assets-web.flixcart.com/batman-returns/batman-returns/p/images/fkheaderlogo_plus-055f80.svg" alt="Nothing"></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
<li class="nav-item dropdown">
</button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="d-flex" action="./components/handlesearch.php" method="get" role="search">
            <input class="form-control me-2 bg-primary-subtle " style="width: 50vw;" name="search" type="search" placeholder="Search" aria-label="Search">
        </form>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent2">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <div class="btn-group">
        ';
if (!$loggedin) {
    echo '<a href="/flipkart-clone/components/login.php" class="btn btn-body nav-link fw-semibold" type="button">Login</a>';
}
if ($loggedin) {
    echo '<a class="btn btn-body nav-link dropdown-toggle-split fw-semibold" data-bs-toggle="dropdown" type="button" aria-haspopup="true">' . $username . '</a>';
}
echo '  

<button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true">
<span class="visually-hidden fw-semibold">Toggle Dropdown</span>
</button>
<ul class="dropdown-menu" >';
if (!$loggedin) {
    echo '
    <li class="d-flex"><a class="dropdown-item" href="./components/signup.php">New Coustomer? <span class="fw-semibold text-primary">Sign Up</span></a></li>
    <hr class="my-2">
    <li><a class="dropdown-item" href="#">My Profile</a></li>
    <li><a class="dropdown-item" href="#">Flipkart Plus Zone</a></li>
        <li><a class="dropdown-item" href="#">Orders</a></li>
        <li><a class="dropdown-item" href="#">Wishlist</a></li>
        <li><a class="dropdown-item" href="#">Rewards</a></li>
        <li><a class="dropdown-item" href="#">Gift Cards</a></li>';
}
if ($loggedin) {
    echo '
        <li><a class="dropdown-item" href="#">My Profile</a></li>
        <li><a class="dropdown-item" href="#">SuperCoin Zone</a></li>
        <li><a class="dropdown-item" href="#">Flipkart Plus Zone</a></li>
        <li><a class="dropdown-item" href="#">Orders</a></li>
        <li><a class="dropdown-item" href="#">Wishlist</a></li>
        <li><a class="dropdown-item" href="#">Coupons</a></li>
        <li><a class="dropdown-item" href="#">Gift Cards</a></li>
        <li><a class="dropdown-item" href="#">Notification</a></li>
        <li><a class="dropdown-item" href="/flipkart-clone/components/item.php">Item add</a></li>
        <li><a class="dropdown-item" href="/flipkart-clone/components/additemdetails.php">Details add</a></li>
        <li><a class="dropdown-item" href="/flipkart-clone/partials/handlelogout.php">Logout</a></li>
        ';
}
// <li><a class="dropdown-item" data-bs-toggle="modal" type="button" data-bs-target="#addcategory">Add Category</a></li>
echo '</ul>
    </div>
    </li>
    <li class="nav-item">
    <a class="nav-link fw-semibold" href="#">Cart</a>
    </li>
    <li class="nav-item">
    <a class="nav-link fw-semibold" href="#">Become a Seller</a>
    </li>
    </ul>
        </div>
        </div>
        </nav>';
if (isset($_SESSION['update_item']) && $_SESSION['update_item'] == true) {
    include("./components/confirmupdate.php");
}

include(__DIR__ . '/../partials/handlelogin.php');
include(__DIR__ . '/../partials/handleitemdetails.php');
include(__DIR__ . '/addCategory.php');
