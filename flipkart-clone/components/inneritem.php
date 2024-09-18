<?php require('../partials/dbconnect.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        <title>' . $row['item_name'] . ' (' . $row['item_color'] . ', ' . $row['item_storage'] . ' GB) (' . $row['item_ram'] . ' GB RAM)</title>
<body class="bg-white mx-4 position-relative" style="margin-top: 4.5%;">
    <div class="d-flex bg-white" style="font-family:open sans;">
        <div class="sticky-top overflow-hidden" style="width: 35vw; height: 90vh; top: 11vh;">
            <div class="align-items-center bg-white overflow-y-hidden justify-content-center" style=" height: 80%; ">
                <!-- Small image -->
                <img src="../uploaded_images/' . $row['item_image'] . '"
                    class="img-fluid d-block mx-auto object-fit-cover"
                    style="cursor: pointer; width: 90%; height: 95%"
                    alt="Product Image"
                     onmousemove="showImage(event, \'../uploaded_images/' . $row['item_image'] . '\')" 
                    onmouseout="resetContent()">
            </div>
            <button class="btn btn-warning px-5 me-1 py-3" style="width: 49%;">ADD TO CART</button>
            <button class="btn btn-danger px-5 my-3 py-3" style="width: 49%;">BUY NOW</button>
        </div>

        <div>
        <div id="large-image" class="bg-white flex-grow-1 d-none position-fixed shadow-lg ms-4" style="width:60vw; height: 85vh; top:10vh">
            <div id="zoomed-image" class="w-100 h-100" style="background-size: 140%; background-repeat: no-repeat;"></div>
        </div>
        <div class="px-4 rightpart flex-grow-1" id="rightpart" style="width:61.8vw;">
        <!-- Right Panel (Scrollable) -->
            <small class="fst-italic text-body-secondary ">' . $row['item_category'] . ' > ' . $row['item_name'] . ' (' . $row['item_color'] . ', ' . $row['item_storage'] . ' GB) (' . $row['item_ram'] . ' GB RAM)
            </small>
            <h5 class="mt-3">' . $row['item_name'] . ' (' . $row['item_color'] . ', ' . $row['item_storage'] . ' GB) (' . $row['item_ram'] . ' GB RAM)</h5>
            <p> <span class="badge bg-success me-2 ">4.5 ★</span><span
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
                    <li><small> ' . $row['item_inch'] . '" ' . $row['item_display'] . ' Display</small></li>
                    <li><small> ' . $row['item_backcam'] . ' Camera with OIS </small></li>
                    <li><small> ' . $row['item_protection'] . ' </small></li>
                    <li><small> ' . $row['item_battery'] . ' mAh Battery </small></li>
                    <li><small> ' . $row['item_processor'] . ' Processor </small></li>
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
                    <p><span class="text-bg-success w-100 d-inline fw-semibold px-1 rounded-1">4.5 ★</span> <span
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

                <h5 class="fw-semibold border-top py-4 px-4">General</h5>

                <div class="reviews px-3 py-2 d-flex gap-2">
                <small class="text-body-secondary d-block w-25 h-100 ms-2">Model Brand</small>
                    <small class="h-100 w-75">' . $row['item_brand'] . '</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Model Name</small>
                    <small class="h-100 w-75">' . $row['item_modalname'] . '</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Color</small>
                    <small class="h-100 w-75">' . $row['item_color'] . '</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Touchscreen</small>
                    <small class="h-100 w-75">Yes</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">SIM Type</small>
                    <small class="h-100 w-75">Dual Sim</small>
                </div>
                
                
                <h5 class="fw-semibold border-top py-4 px-4">Display Resolution</h5>
                
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Display Size</small>
                    <small class="h-100 w-75">' . number_format($row['item_inch'] * 2.54, 2) . ' cm (' . $row['item_inch'] . ' inch)</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Resolution</small>
                    <small class="h-100 w-75">2400 x 1080 pixels</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Resolution Type</small>
                    <small class="h-100 w-75">Full HD+</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Display Type</small>
                    <small class="h-100 w-75">' . $row['item_display'] . '</small>
                </div>
                
                
                <h5 class="fw-semibold border-top py-4 px-4">OS & Processor Features</h5>
                
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Operating System</small>
                    <small class="h-100 w-75">Android 14</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Processor Name</small>
                    <small class="h-100 w-75">' . $row['item_processor'] . '</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Processor Core</small>
                    <small class="h-100 w-75">Octa Core</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Operating Frequency</small>
                    <small class="h-100 w-75">5G: n1/n2/n3/n5/n7/n8/n20/n28/n38/n40/n41/n66/n77/n77 HPUE/n78/n78 HPUE, 4G LTE: B1/B2/B3/B4/B5/B7/B8/B12/B13/B17/B18/B19/B20/B25/B26/B28/B32/B38/B38 HPUE/B39/B40/B41/B41 HPUE/B42/B43/B48/B66, 3G UMTS: B1/B2/B4/B5/B8/B19, 2G GSM: B2/B3/B5/B8</small>
                </div>

                
                <h5 class="fw-semibold border-top py-4 px-4">Memory & Storage Features</h5>

                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Internal Storage</small>
                    <small class="h-100 w-75">' . $row['item_ram'] . ' GB</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Ram</small>
                    <small class="h-100 w-75">' . $row['item_storage'] . ' GB</small>
                </div>
               
                
                <h5 class="fw-semibold border-top py-4 px-4">Camera Features</h5>

                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Primary Camera Available</small>
                    <small class="h-100 w-75">Yes</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Primary Camera</small>
                    <small class="h-100 w-75">' . $row['item_backcam'] . '</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Primary Camera Features</small>
                    <small class="h-100 w-75">Dual Camera Setup: ' . $row['item_backcam'] . ' Main Camera (1/1.5 inch Optical Format, f/1.8 Aperture, 1.0um Pixel Size (Ultra Pixel Technology for 2.0um), Omni Directional PDAF, Optical Image Stabilization (OIS)) + 13MP Ultrawide Camera, Camera Features: Ultra-Res, Portrait (24mm/35mm/50mm), Pro (W/ Long Exposure), 360 Degree Panorama, Night Vision, Dual Capture, Scan, Spot Color, Auto Smile Capture, Google Lens Integration, Smart Composition, Shot Optimization, Auto Night Vision, Burst Shot, Timer, Assistive Grid, Leveler, Metering Mode, Watermark, RAW Photo Output, QR/Barcode Scanner, HDR, Super Resolution Zoom, Active Photos, Live Filters, Quick Capture (Twist-Twist), Active Photos, Video Features: Timelapse (W/ Hyperlapse), Slow Motion, Portrait Video, Dual Capture Video, Macro, Spot Color, Horizon Lock, Video Stabilization, Video Snapshot, Audio Zoom, External Microphone Support</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Secondary Camera Available</small>
                    <small class="h-100 w-75">Yes</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Secondary Camera</small>
                    <small class="h-100 w-75">' . $row['item_frontcam'] . '</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Secondary Camera Features</small>
                    <small class="h-100 w-75">Front Camera Setup: ' . $row['item_frontcam'] . ' (f/2.4 Aperture, 0.7um Pixel Size (Quad Pixel Technology for 1.4um), Auto Focus, Camera Feature: Pro (W/ Long Exposure), Dual Capture, Spot Color, Auto Smile Capture, Gesture Capture, Auto Night Vision, Timer, Assistive Grid, Leveler, Metering Mode, Watermark, Selfie Photo Mirror, Selfie Animation, Face Beauty, RAW Photo Output, HDR, Active Photos, Live Filters, Quick Capture (Twist-Twist), Quick Capture (Twist-Twist), Video Feature: Dual Capture, Timelapse (W/ Hyperlapse), Portrait, Spot Color, Video Stabilization, Face Beauty, Video Snapshot, Live Filters, External Microphone Support</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Flash</small>
                    <small class="h-100 w-75">Rear: Single LED Flash</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Full HD Video Recording</small>
                    <small class="h-100 w-75">Yes</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Dual Camera Lens</small>
                    <small class="h-100 w-75">Yes</small>
                </div>
                
                
                <h5 class="fw-semibold border-top py-4 px-4">Connectivity Features</h5>
                
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Network Type</small>
                    <small class="h-100 w-75">2G, 3G, 4G, 5G</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Internet Connectivity</small>
                    <small class="h-100 w-75">Wi-Fi, 3G, 4G, 5G</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">USB Version</small>
                    <small class="h-100 w-75">Type C Port</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Bluetooth Support</small>
                    <small class="h-100 w-75">Yes</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Wi-Fi Hotspot </small>
                    <small class="h-100 w-75">Yes</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">NFC</small>
                    <small class="h-100 w-75">Yes</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">GPS Support</small>
                    <small class="h-100 w-75">Yes</small>
                </div>
                
                
                <h5 class="fw-semibold border-top py-4 px-4">Battery & Power Features</h5>
                
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Bettery Capacity</small>
                    <small class="h-100 w-75">' . $row['item_battery'] . ' mAh</small>
                </div>
                
                
                <h5 class="fw-semibold border-top py-4 px-4">Dimensions</h5>
                
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Width</small>
                    <small class="h-100 w-75">' . $row['item_width'] . '</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Height</small>
                    <small class="h-100 w-75">' . $row['item_height'] . '</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Depth</small>
                    <small class="h-100 w-75">' . $row['item_depth'] . '</small>
                </div>
                <div class="reviews px-3 py-2 d-flex gap-2">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Weight</small>
                    <small class="h-100 w-75">' . $row['item_weight'] . '</small>
                </div>
                </div>

            </div>
        </div>
    </div>
    </body>';
    } ?>
    <script>
        let savedScrollPos = 0;

        function showImage(event, imagePath) {
            const zoomedImage = document.getElementById("zoomed-image");
            const largeImageContainer = document.getElementById("large-image");

            largeImageContainer.classList.remove("d-none");
            zoomedImage.style.backgroundImage = `url(${imagePath})`;

            const rect = event.target.getBoundingClientRect();
            const x = event.clientX - rect.left; // X position within the image
            const y = event.clientY - rect.top; // Y position within the image

            const xPercent = (x / rect.width) * 100;
            const yPercent = (y / rect.height) * 100;

            zoomedImage.style.backgroundPosition = `${xPercent}% ${yPercent}%`;
        }

        function resetContent() {
            const largeImageContainer = document.getElementById("large-image");
            largeImageContainer.classList.add("d-none");
        }
    </script>
<?php
} else {
    echo "No items found";
}
?>

</html>