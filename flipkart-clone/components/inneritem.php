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



?>


<body class="bg-white mx-4" style="margin-top: 6%;">
    <div class="d-flex bg-white" style="font-family:open sans;">
        <div class="sticky-top overflow-hidden " style="width: 55vw; height: 90vh; top: 11%;">
            <div class="align-items-center justify-content-center bg-light" style="height: 80%;">
                <!-- Small image -->
                <img src="../uploaded_images/mimobile.jpg"
                    class="img-fluid border object-fit-cover w-100 h-100"
                    style="cursor: pointer;"
                    alt="Product Image"
                    onmousemove="showImage(event, '../uploaded_images/mimobile.jpg')"
                    onmouseout="resetContent()">
            </div>
            <button class="btn btn-warning px-5 me-1 py-3" style="width: 49%;">ADD TO CART</button>
            <button class="btn btn-danger px-5 my-3 py-3" style="width: 49%;">BUY NOW</button>
        </div>

        <div id="large-image" class="bg-light flex-grow-1 d-none px-4" style="width:96.5vw; height: 90vh; position: relative;">
            <div id="zoomed-image" style="width: 100%; height: 100%; background-size: 350%; background-repeat: no-repeat;"></div>
        </div>
        <!-- Right Panel (Scrollable) -->
        <div class="px-4 rightpart flex-grow-1" id="rightpart">
            <small class="fst-italic text-body-secondary ">Mobile > POCO X6 5G (Mirror Black, 256 GB) (8 GB RAM)
            </small>
            <h5 class="mt-3">POCO X6 5G (Mirror Black, 256 GB) (8 GB RAM)</h5>
            <p> <span class="text-bg-success w-100 d-inline fw-semibold px-1 rounded-1">4.5 ☆</span><span
                    class="text-body-secondary fw-medium"> 2,984 Ratings & 160 Reviews</span></p>
            <h5><span class="fs-2 ">₹18,999</span>&nbsp;<small><del>₹24,999</del>&nbsp;&nbsp;<span
                        class="text-success fw-semibold"> 24% off</span></small></h5>
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
                    <li><small> 8 GB RAM | 256 GB ROM </small></li>
                    <li><small> 6.67" 1.5K AMOLED Display </small></li>
                    <li><small> 64MP Triple Camera with OIS </small></li>
                    <li><small> Corning® Gorilla® Glass Victus® </small></li>
                    <li><small> 5000 mAh Battery </small></li>
                    <li><small> Snapdragon 7 Gen 3 Processor </small></li>
                </ul>
                <p class="text-body-secondary fw-semibold ms-5" style="width:9vw">Easy Payment Options</p>
                <ul class="text-dark fw-semibold">
                    <li><small>No cost EMI starting from ₹4,500/month</small></li>
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

            <div class="question-part border my-4">
                <h3 class="fw-semibold p-3">Specifications</h3>
                <div class="reviews border-top p-3 d-flex">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">In The Box</small>
                    <small class="h-100 w-75">Handset is the best change of the world and i want ot alkdsjflka sdkljf lkajlsd fjlka sdjfkkaljksldjlf kljsd fjkl ajsdkl jflk asdkfjlkds fdsljf lk dsjflkds jfdlksf jdlksf jlksdjflkds flkdsjklfdslkfjlk </small>
                </div>
                <div class="reviews border-top p-3 d-flex">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Modal Name</small>
                    <small class="h-100 w-75">Xiomi note 4</small>
                </div>
                <div class="reviews border-top p-3 d-flex">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Modal Name is ready and i want to </small>
                    <small class="h-100 w-75">Xiomi note 4</small>
                </div>
                <div class="reviews border-top p-3 d-flex">
                    <small class="text-body-secondary d-block w-25 h-100 ms-2">Modal Name</small>
                    <small class="h-100 w-75">Xiomi note 4</small>
                </div>
            </div>

        </div>
    </div>
    <script>
        function showImage(event, imagePath) {
            const zoomedImage = document.getElementById('zoomed-image');
            const largeImageContainer = document.getElementById('large-image');

            document.getElementById('rightpart').style.display = 'none';
            largeImageContainer.classList.remove('d-none');
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
            document.getElementById('rightpart').style.display = 'block';
            document.getElementById('large-image').classList.add('d-none');
        }
    </script>
</body>

</html>