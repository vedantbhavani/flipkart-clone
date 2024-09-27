<?php
require(__DIR__ . "/dbconnect.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$_SESSION['update_item'] = false;
$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {
    if (isset($_POST['item_category'], $_POST['item_brand'], $_POST['item_name'], $_POST['item_modalname'], $_POST['item_color'])) {
        $item_category = $_POST['item_category'];
        $item_name = $_POST['item_name'];
        $item_brand = $_POST['item_brand'];
        $item_modalname = $_POST['item_modalname'];
        $item_color = $_POST['item_color'];
        $item_width = $_POST['item_width'];
        $item_height = $_POST['item_height'];
        $item_depth = $_POST['item_depth'];
        $item_weight = $_POST['item_weight'];

        $query = "SELECT * FROM itemdetails WHERE item_name = '$item_name' AND item_category = '$item_category' ";
        $ans = mysqli_query($conn, $query);
        $row = mysqli_num_rows($ans);
        if ($row != 0) {
            // $_SESSION['update_item'] = true;
            header("Location: /flipkart-clone/");
        } else {
            if ($item_category == "Mobile") {
                $item_ram = $_POST['item_ram'];
                $item_storage = $_POST['item_storage'];
                $item_inch = $_POST['item_inch'];
                $item_display = $_POST['item_display'];
                $item_protection = $_POST['item_protection'];
                $item_backcam = $_POST['item_backcam'];
                $item_frontcam = $_POST['item_frontcam'];
                $item_battery = $_POST['item_battery'];
                $item_charger = $_POST['item_charger'];
                $item_processor = $_POST['item_processor'];

                $sql = "INSERT INTO `itemdetails` (`item_name`, `item_brand`, `item_modalname`, `item_color`, `item_width`, `item_height`, `item_depth`, `item_weight`,`item_ram`, `item_storage`, `item_inch`, `item_display`, `item_protection`, `item_backcam`, `item_frontcam`, `item_battery`, `item_charger`, `item_processor`, `item_category`) VALUES ('$item_name', '$item_brand', '$item_modalname', '$item_color', '$item_width', '$item_height', '$item_depth', '$item_weight','$item_ram', '$item_storage', '$item_inch', '$item_display ', '$item_protection', '$item_backcam', '$item_frontcam', '$item_battery', '$item_charger', '$item_processor', '$item_category')";

                $result = mysqli_query($conn, $sql);
            }
            if ($item_catogory == 'Grocery') {
                $item_quantity = $_POST['item_quantity'];
                $item_containertype = $_POST['item_containertype'];
                $item_maximumlife = $_POST['item_maximumlife'];
                $item_organic = $_POST['item_organic'];
                $item_ingrediants = $_POST['item_ingrediants'];
                $item_manufactured = $_POST['item_manufactured'];

                $sql = "INSERT INTO `itemdetails` (`item_name`, `item_brand`, `item_modalname`, `item_color`, `item_width`, `item_height`, `item_depth`, `item_weight`, `item_quantity`,'item_containertype`, `item_maximumlife`, `item_organic`, `item_ingrediants`, `item_manufactured`) VALUES ('$item_name', '$item_brand', '$item_modalname', '$item_color', '$item_width', '$item_height', '$item_depth', '$item_weight', '$item_quantity', '$item_containertype', '$item_maximumlife', '$item_organic', '$item_ingrediants', '$item_manufactured');";

                $result = mysqli_query($conn, $sql);
            }
            header("location: /flipkart-clone/");
        }
    }
}
