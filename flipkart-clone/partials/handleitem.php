<?php
require(__DIR__ ."/dbconnect.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {
    if (isset($_POST["item_name"], $_POST['item_category'], $_POST['item_noprice'], $_POST['item_price'])) {
        $item_name = $_POST['item_name'];
        $item_category = $_POST['item_category'];
        $item_noprice = $_POST['item_noprice'];
        $item_price = $_POST['item_price'];
        $item_disc = ($_POST['item_price'] * 100) / $_POST['item_noprice'];
        $item_discount = 100 - $item_disc;
        if ($_POST['emi_check'] == "no") {
            $item_emi = 0;
        } else {
            $item_emi = $item_price / 6;
        }
        $existitem = "SELECT * FROM items WHERE item_name = '$item_name'";
        $itemresult = mysqli_query($conn, $existitem);
        $row = mysqli_fetch_assoc($itemresult);
        if ($row && $row['item_category'] == $item_category) {
            echo "This is already chosen";
            header("Location: " .__DIR__ );
        } else {
            if (isset($_FILES['item_image'])) {
                $item_image = $_FILES['item_image']['name'];
                $tempname = $_FILES['item_image']['tmp_name'];
                $folder = '../uploaded_images/' . $item_image;
                if (move_uploaded_file($tempname, $folder)) {
                    $item_image = mysqli_real_escape_string($conn, $item_image);
                    $item_name = mysqli_real_escape_string($conn, $item_name);
                    $sql = "INSERT INTO items (item_category, item_name, item_noprice, item_price, item_image, item_discount, item_emi) VALUES ('$item_category', '$item_name', '$item_noprice', '$item_price', '$item_image', '$item_discount', '$item_emi')";
                    $result = mysqli_query($conn, $sql);
                    $_SESSION['item_added'] = true;
                    header("location: /flipkart-clone/");
                }
                echo "image not uploaded";
            }
        }
    }
}
?>
<!-- echo '<img src="../../uploaded_images/bike.jpg" alt="">'; -->