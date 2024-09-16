<?php
include('../partials/dbconnect.php');
include('../partials/links.php');
include(__DIR__ . "/lsnavbar.php")
?>

<html>

<body>
    <div class="mx-5 mt-3">
        <?php
        $query = $_GET['search'];
        if ($query) {
            $noResult = true;
            $searchquery = mysqli_real_escape_string($conn, $query);
            $searchquery = str_replace("<", "&lt;", $searchquery);
            $searchquery = str_replace(">", "&gt;", $searchquery);
            $sql = "SELECT it.*, itd.* 
            FROM items it
            INNER JOIN itemdetails itd ON it.item_name = itd.item_name 
            WHERE it.item_name LIKE '%$searchquery%' 
            OR it.item_category LIKE '%$searchquery%'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_num_rows($result);
            echo '
            <h2 class="mb-4">Showing '.$row.' results for <span class="">" ' . $searchquery . ' "</span></h2>';
            while ($row = mysqli_fetch_assoc($result)) {
                $noResult = false;
                $category = mysqli_real_escape_string($conn, $row['item_category']);
                $name = mysqli_real_escape_string($conn, $row['item_name']);
                $image = mysqli_real_escape_string($conn, $row['item_image']);
                $color = mysqli_real_escape_string($conn, $row['item_color']);
                $ram = mysqli_real_escape_string($conn, $row['item_ram']);
                $storage = mysqli_real_escape_string($conn, $row['item_storage']);
                $inch = mysqli_real_escape_string($conn, $row['item_inch']);
                $display = mysqli_real_escape_string($conn, $row['item_display']);
                $backcam = mysqli_real_escape_string($conn, $row['item_backcam']);
                $frontcam = mysqli_real_escape_string($conn, $row['item_frontcam']);
                $battery = mysqli_real_escape_string($conn, $row['item_battery']);
                $processor = mysqli_real_escape_string($conn, $row['item_processor']);
                $price = mysqli_real_escape_string($conn, $row['item_price']);
                $noprice = mysqli_real_escape_string($conn, $row['item_noprice']);
                $discount = mysqli_real_escape_string($conn, $row['item_discount']);
                $exchange = ($price + 1) * 30 / 100;

                echo '
                <a  href="../components/inneritem.php?category=' . $category . '&name=' . $name . '" class="text-decoration-none border-0 border-bottom card shadow-sm"
                onmouseover="this.querySelector(\'.product-name\').style.color = \'#0d6efd\';"
    onmouseout="this.querySelector(\'.product-name\').style.color = \'inherit\';"
                >
                    <div class="row g-0">
                <!-- Product Image -->
                <div class="col-md-3">
                    <img src="../uploaded_images/' . $image . '" class="img-fluid rounded-start ms-5" style="width: 18vw; height: 40vh;" alt="' . $name . '">
                </div>
                <!-- Product Details -->
                <div class="col-md-6">
                    <div class="card-body mt-2">
                        <h5 class="card-title fw-semibold product-name">' . $name . ' (' . $color . ', ' . $storage . ' GB)</h5>
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-success me-2">4.5 ★</span>
                            <span class="text-muted fw-semibold">56,221 Ratings & 5,880 Reviews</span>
                        </div>
                        <ul class=" mb-3 fw-medium">
                            <li>' . $ram . ' GB RAM | ' . $storage . ' GB ROM</li>
                            <li>' . number_format($inch * 2.54, 2) . ' cm (' . $inch . ' inch) ' . $display . ' Display</li>
                            <li>' . $backcam . ' | ' . $frontcam . ' Front Camera</li>
                            <li>' . $battery . ' mAh Battery</li>
                            <li>' . $processor . '</li>
                            <li>1 Year on Handset and 6 Months on Accessories</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3  bg-white d-flex justify-content-between mt-3">
                    <div>
                        <span class="fs-2 fw-semibold ">₹' . number_format($price) . ' <img src="../us_images/flipkart-assured.png" class="ms-4" height="20px" alt=""></span>
                        <span class="d-block"><small class="fs-6 fw-normal text-body-secondary "><del>₹' . number_format($noprice) . '</del>&nbsp;</small><span class="text-success fw-semibold">' . $discount . '% off</span></span>
                        <small class="d-block fw-semibold">Free delivery</small>
                        <small class="text-success d-block fw-semibold">Save extra with combo offers</small>
                        <small>Upto<span class="fw-semibold"> ₹' . number_format($exchange) . '</span> Off on Exchange</small>
                    </div>
                </div>
            </div>
        </a>';
            }
            if ($noResult) {
                echo '
                <div class="jumbotron border p-4 bg-light jumbotron-fluid">
                <div class="container">
                <h3 class="display-6">No Result Found</h3>
                <p class="lead">Suggestions:
                <li class="mx-5">Make sure that all words are spelled correctly.</li>
                <li class="mx-5">Try different keywords.</li>
                <li class="mx-5">Try more general keywords.</p></li>
                </div>
                </div>';
            }
        }
        ?>

    </div>
</body>

</html>