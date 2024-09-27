<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Flow</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="accordion" id="checkoutAccordion">
            <!-- Login Section -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        1. LOGIN
                    </button>
                </h2>
                <?php
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                require(__DIR__ . '../partials/dbconnect.php');
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    $loggedin = true;
                    $sql = "SELECT * FROM user";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);
                } else {
                    $loggedin = false;
                }
                if ($loggedin) {
                    echo '
                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#checkoutAccordion">
                    <div class="accordion-body">
                        <p><strong>Name:</strong>' . $username . '</p>
                        <p><strong>Number:</strong> Vedant Bhavani</p>
                        <button class="continue-btn btn btn-primary" data-next="headingTwo">Continue Checkout</button>
                    </div>
                </div>
            </div>
            ';
                }
                ?>
            </div>
            <!-- Delivery Address Section (Initially hidden) -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" disabled>
                        2. DELIVERY ADDRESS
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#checkoutAccordion">
                    <div class="accordion-body">
                        <p>Delivery Address details...</p>
                        <button class="continue-btn btn btn-primary" data-next="headingThree">Continue Checkout</button>
                    </div>
                </div>
            </div>

            <!-- Order Summary Section -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" disabled>
                        3. ORDER SUMMARY
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#checkoutAccordion">
                    <div class="accordion-body">
                        <p>Order summary details...</p>
                        <button class="continue-btn btn btn-primary" data-next="headingFour">Continue Checkout</button>
                    </div>
                </div>
            </div>

            <!-- Payment Options Section -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" disabled>
                        4. PAYMENT OPTIONS
                    </button>
                </h2>
                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#checkoutAccordion">
                    <div class="accordion-body">
                        <p>Payment options...</p>
                        <button class="btn btn-primary">Finish Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to enable the next section
        function enableNextSection(nextSectionId) {
            const nextButton = document.querySelector(`#${nextSectionId} .accordion-button`);
            nextButton.disabled = false;
            nextButton.click();
        }

        // Event listener for all "Continue Checkout" buttons
        document.querySelectorAll('.continue-btn').forEach(button => {
            button.addEventListener('click', function() {
                const nextSectionId = this.getAttribute('data-next');
                enableNextSection(nextSectionId);
            });
        });

        // Make sure previously completed sections are accessible
        document.querySelectorAll('.accordion-button').forEach(button => {
            button.addEventListener('click', function() {
                const completedSections = ['headingTwo', 'headingThree', 'headingFour'];
                completedSections.forEach(section => {
                    if (document.querySelector(`#${section} .accordion-collapse`).classList.contains('show')) {
                        document.querySelector(`#${section} .accordion-button`).disabled = false;
                    }
                });
            });
        });
    </script>
</body>

</html>