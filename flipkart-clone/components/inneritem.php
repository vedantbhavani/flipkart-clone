<?php require('../partials/dbconnect.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flipkart-Clone</title>
    <?php include('../partials/links.php'); ?>
    <?php include(__DIR__ . "/navbar.php") ?>
</head>
<?php
$itemname = mysqli_real_escape_string($conn, $_GET['name']);
$itemcate = mysqli_real_escape_string($conn, $_GET['category']);

$sql = "SELECT it.*, itd.* 
        FROM items it
        INNER JOIN itemdetails itd ON it.item_name = itd.item_name 
        WHERE it.item_name = '$itemname' AND it.item_category = '$itemcate'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
        
<body class="bg-white mx-4" style="margin-top: 6%;">
    <div class="d-flex bg-white" style="font-family:open sans;">
        <div class="sticky-top overflow-hidden " style="width: 35vw; height: 90vh; top: 11%;">
            <div class="align-items-center justify-content-center bg-light" style="height: 80%;">
                <!-- Small image -->
                <img src="../uploaded_images/' . $row['item_image'] . '"
                    class="img-fluid border object-fit-cover w-100 h-100"
                    style="cursor: pointer;"
                    alt="Product Image"
                     onmousemove="showImage(event, \'../uploaded_images/' . $row['item_image'] . '\')" 
                    onmouseout="resetContent()">
            </div>
            <button class="btn btn-warning px-5 me-1 py-3" style="width: 49%;">ADD TO CART</button>
            <button class="btn btn-danger px-5 my-3 py-3" style="width: 49%;">BUY NOW</button>
        </div>

        <div id="large-image" class="bg-light flex-grow-1 d-none px-4" style="width:61.8vw; height: 90vh; position: relative;">
            <div id="zoomed-image" style="width: 100%; height: 100%; background-size: 300%; background-repeat: no-repeat;"></div>
        </div>
        <!-- Right Panel (Scrollable) -->
        <div class="px-4 rightpart flex-grow-1" id="rightpart">
            <small class="fst-italic text-body-secondary ">' . $row['item_category'] . ' > ' . $row['item_name'] . ' (' . $row['item_color'] . ', ' . $row['item_storage'] . ' GB) (' . $row['item_ram'] . ' GB RAM)
            </small>
            <h5 class="mt-3">' . $row['item_name'] . ' (' . $row['item_color'] . ', ' . $row['item_storage'] . ' GB) (' . $row['item_ram'] . ' GB RAM)</h5>
            <p> <span class="text-bg-success w-100 d-inline fw-semibold px-1 rounded-1">4.5 ☆</span><span
                    class="text-body-secondary fw-medium"> 2,984 Ratings & 160 Reviews</span></p>
            <h5><span class="fs-2 fw-semibold ">₹' . number_format($row['item_price']) . '</span>&nbsp;<small><del>₹' . number_format($row['item_noprice']) . '</del>&nbsp;&nbsp;<span
                        class="text-success fw-semibold"> ' . $row['item_discount'] . '% off</span></small></h5>
            <p>+ ₹59 Secured Packaging Fee</p>

            <p class="fw-semibold mb-2">Available offers</p>
            <ul class="p-0 ">
                <li class="list-unstyled"><span class="fw-semibold">Bank Offer</span> 10% Instant Discount upto ₹500 on
                    first Flipkart Pay Later EMI Transaction</li>
                <li class="list-unstyled"><span class="fw-semibold">Bank Offer</span> 5% Unlimited Cashback on Flipkart Axis
                    Bank Credit Card</li>
                <li class="list-unstyled"><span class="fw-semibold">Bank Offer</span> ₹1000 Off On All Banks Credit and
                    Debit Card Transactions</li>
            </ul>
            <!-- Add additional scrolling content -->
            <div class="d-flex">
                <p class="text-body-secondary fw-semibold">Highlights</p>
                <ul class="text-dark fw-semibold">
                    <li><small> ' . $row['item_ram'] . ' GB RAM | ' . $row['item_storage'] . ' GB Storage </small></li>
                    <li><small> ' . $row['item_inch'] . '" ' . $row['item_display'] . ' </small></li>
                    <li><small> ' . $row['item_backcam'] . ' Camera with OIS </small></li>
                    <li><small> ' . $row['item_protection'] . ' </small></li>
                    <li><small> ' . $row['item_battery'] . ' mAh Battery </small></li>
                    <li><small> ' . $row['item_processor'] . ' </small></li>
                </ul>
                <p class="text-body-secondary fw-semibold ms-5" style="width:9vw">Easy Payment Options</p>
                <ul class="text-dark fw-semibold">
                    <li><small>No cost EMI starting from ₹' . number_format($row['item_emi']) . '/month</small></li>
                    <li><small>Cash on Delivery</small></li>
                    <li><small>Net banking & Credit/ Debit/ ATM card</small></li>
                </ul>
            </div>

            <div class="rating-part my-4 border">
                <h3 class="fw-semibold p-3 pt-4 pb-0">Ratings & Reviews</h3>
                <p class="mb-0 mt-3 fw-medium px-3">Overall Rating: 4.2/5 (14,159 Ratings & 1,625 Reviews)</p>
                <div class="reviews border-top p-3">
                    <p><span class="text-bg-success w-100 d-inline fw-semibold px-1 rounded-1">4.5 ☆</span> <span
                            class="fw-semibold">&nbsp;&nbsp;&nbsp;Excellent</span></p>
                    <pre class="text-dark fw-medium" style="font-family:open sans;">Its a very light weight and Slim phone with 5500 Mah battery
Awesome design
Display is very bright
Camera is good in the price range
Charging speed is also superb and battery performance is awesome lasts easily a day.</pre>
                    <small class="text-body-secondary fw-medium my-0">Vedant patel ✔ <small class="fw-medium">Certified
                            Buyer, Gurugram 1 month ago</small></small>
                </div>
            </div>

            <div class="question-part border">
                <h3 class="fw-semibold p-3">Questions & Answers</h3>
                <div class="reviews border-top p-3">
                    <p><span class="fw-semibold">Q:&nbsp;Overheating issues in this phone</span></p>
                    <p style="font-family:open sans;"><span class="fw-semibold">A:</span>&nbsp;Yes</p>
                    <small class="text-body-secondary fw-medium my-0">Vedant patel </small>
                    <p><small class="text-body-secondary fw-medium my-0">✔ Certified Buyer</small></p>
                </div>
            </div>

            <div class="specification-part border my-4">
                <h3 class="fw-semibold  p-3">Specifications</h3>
                <h6 class="fw-semibold border-top py-4 px-4">General</h6>
                <div class="reviews px-3 py-2 d-flex">
                <small class="text-body-secondary d-block w-25 h-100 ms-2">Model Brand</small>
                    <small class="h-100 w-75">' . $row['item_brand'] . '</small>
                </div>
                <div class="reviews px-3 py-2 d-flex">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Model Name</small>
                    <small class="h-100 w-75">' . $row['item_modalname'] . '</small>
                </div>
                <div class="reviews px-3 py-2 d-flex">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Color</small>
                    <small class="h-100 w-75">' . $row['item_color'] . '</small>
                </div>
                <div class="reviews px-3 py-2 d-flex">
                <small class="text-body-secondary d-block w-25 h-100 ms-2">Touchscreen</small>
                <small class="h-100 w-75">Yes</small>
                </div>
                <div class="reviews px-3 py-2 d-flex">
                <small class="text-body-secondary d-block w-25 h-100 ms-2">SIM Type</small>
                <small class="h-100 w-75">Dual Sim</small>
                </div>
                
                
                <h6 class="fw-semibold border-top py-4 px-4">Display Resolution</h6>
                
                <div class="reviews px-3 py-2 d-flex">
                <small class="text-body-secondary d-block w-25 h-100 ms-2">Display Size</small>
                <small class="h-100 w-75">' . number_format($row['item_inch'] * 2.54, 2) . ' cm (' . $row['item_inch'] . ' inch)</small>
                </div>
                <div class="reviews px-3 py-2 d-flex">
                <small class="text-body-secondary d-block w-25 h-100 ms-2">Resolution</small>
                <small class="h-100 w-75">2400 x 1080 pixels</small>
                </div>
                <div class="reviews px-3 py-2 d-flex">
                <small class="text-body-secondary d-block w-25 h-100 ms-2">Resolution Type</small>
                <small class="h-100 w-75">Full HD+</small>
                </div>
                <div class="reviews px-3 py-2 d-flex">
                <small class="text-body-secondary d-block w-25 h-100 ms-2">Display Type</small>
                <small class="h-100 w-75">' . $row['item_display'] . '</small>
                </div>
                
                
                <h6 class="fw-semibold border-top py-4 px-4">OS & Processor Features</h6>
                
                <div class="reviews px-3 py-2 d-flex">
                <small class="text-body-secondary d-block w-25 h-100 ms-2">Operating System</small>
                <small class="h-100 w-75">Android 14</small>
                </div>

            </div>

        </div>
    </div>
    </body>';
    } ?>
    <script>
        function showImage(event, imagePath) {
            const zoomedImage = document.getElementById("zoomed-image");
            const largeImageContainer = document.getElementById("large-image");

            document.getElementById("rightpart").style.display = "none";
            largeImageContainer.classList.remove("d-none");
            zoomedImage.style.backgroundImage = `url(${imagePath})`;

            // Get the coordinates of the mouse relative to the small image
            const rect = event.target.getBoundingClientRect();
            const x = event.clientX - rect.left; // X position within the image
            const y = event.clientY - rect.top; // Y position within the image

            // Get the percentage of cursor position within the small image
            const xPercent = (x / rect.width) * 100;
            const yPercent = (y / rect.height) * 100;

            // Move the background of the large image to correspond with the hover position
            zoomedImage.style.backgroundPosition = `${xPercent}% ${yPercent}%`;
        }

        function resetContent() {
            // Reset large image and show right content again
            document.getElementById("rightpart").style.display = "block";
            document.getElementById("large-image").classList.add("d-none");
        }
    </script>
<?php
} else {
    echo "No items found";
}
?>

</html>