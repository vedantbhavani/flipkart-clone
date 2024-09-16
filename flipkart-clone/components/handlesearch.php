<?php
include('../partials/dbconnect.php');
include('../partials/links.php');
include(__DIR__ . "/lsnavbar.php")
?>

<html>
<body>
<div class="mx-5 mt-3">
<h2 class="mb-4">Showing results for <span class="">"<?php if ($_GET["search"]){echo $_GET["search"];} else{echo "";}?>"</span></h2>
        <div class="card shadow-sm">
            <div class="row g-0">
                <!-- Product Image -->
                <div class="col-md-3">
                    <img src="../uploaded_images/Apple-iPhone-15.jpg" class="img-fluid rounded-start h-100 w-100" alt="Motorola Edge 40 Neo">
                </div>
                <!-- Product Details -->
                <div class="col-md-5">
                    <div class="card-body mt-2">
                        <h5 class="card-title fw-semibold">Motorola Edge 40 Neo (Soothing Sea, 128 GB)</h5>
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-success me-2">4.3 ★</span>
                            <span class="text-muted fw-semibold">56,221 Ratings & 5,880 Reviews</span>
                        </div>
                        <ul class=" mb-3 fw-medium">
                            <li>8 GB RAM | 128 GB ROM</li>
                            <li>16.64 cm (6.55 inch) Full HD+ Display</li>
                            <li>50MP + 13MP | 32MP Front Camera</li>
                            <li>5000 mAh Battery</li>
                            <li>Dimensity 7030 Processor</li>
                            <li>1 Year on Handset and 6 Months on Accessories</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3  bg-white d-flex justify-content-between mt-3">
                    <div>
                        <span class="fs-2 fw-semibold ">₹22,500 <img src="../us_images/flipkart-assured.png" class="ms-4" height="20px" alt=""></span>
                        <span class="d-block"><small class="fs-6 fw-normal text-body-secondary "><del>₹19,999</del>&nbsp;</small><span class="text-success fw-semibold">17% off</span></span>
                        <small class="d-block">Free delivery by <span class="fw-semibold">19th Sep</span></small>
                        <small class="text-success d-block fw-semibold">Save extra with combo offers</small>
                        <small>Upto<span class="fw-semibold"> ₹17,100</span> Off on Exchange</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>