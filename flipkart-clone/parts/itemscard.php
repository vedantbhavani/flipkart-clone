<div class="bg-white" style="width: 32vw;">
    <div class="p-2 px-3 d-flex flex-row justify-content-between">
        <?php
        if(isset($_SESSION['suggest'])){
            $suggetion = $_SESSION['suggest'];
        }
        else{
            $suggetion = 'Top Suggestion';
        }
        echo '
        <h4>'.$suggetion.'</h4>
        <img src="./us_images/next-button.png" style="height: 25px;" alt="next">
        ';
        ?>
    </div>
    
    <!-- Main Layout -->
    <div class="card border-end-0 border-bottom-0 border-start-0 d-flex flex-row rounded-0" style="height:100vh; width:fit-content;">
        <?php
        $category = $_SESSION['cate'];
        $sqlquery = "SELECT * FROM items WHERE item_category='$category' ORDER BY RAND() LIMIT 3";
        $resultsql = mysqli_query($conn, $sqlquery);

        // Array to store the fetched items
        $items = [];

        if ($resultsql) {
            while ($row = mysqli_fetch_assoc($resultsql)) {
                $items[] = $row;
            }

            // Left Item (1st item)
            if (isset($items[0])) {
                $item = $items[0];
                echo '
                <div class="left border-end align-content-center" style="height:100%; width: 55%;">
                    <img src="./uploaded_images/' . $item["item_image"] . '" class="card-img-top object-fit-cover" style="height: 50%;" alt="' . $item["item_name"] . '">
                    <div class="card-details" style="height: 10%;">
                        <p class="card-text text-center longlength my-0">' . $item["item_name"] . '</p>
                        <p class="card-text text-center longlength mx-0 px-0 my-0">
                            <span class="text-decoration-line-through">' . number_format($item["item_noprice"]) . ' </span>&nbsp;&#8377;' . number_format($item["item_price"]) . '
                            <span class="text-success fw-semibold"> ' . $item["item_discount"] . '% off</span>
                        </p>';
                if ($item["item_emi"] != 0) {
                    echo '<p class="card-text text-center my-0 text-success fw-semibold">No Cost EMI from &#8377;' . $item["item_emi"] . '/month</p>';
                }
                echo '</div>
                </div>';
            }
        ?>

        <!-- Right Items (2nd and 3rd items) -->
        <div class="right" style="width: 45%; height: 100%;">
        <?php
            // Right Upper (2nd item)
            if (isset($items[1])) {
                $item = $items[1];
                echo '
                <div class="card border-end-0 border-start-0 align-content-center border-top-0 rounded-0" style="width: 100%; height: 50%;">
                    <img src="./uploaded_images/' . $item["item_image"] . '" class="card-img-top" style="height: 65%; object-fit:cover;" alt=""' . $item["item_name"] . '">
                    <div class="card-body text-center px-0" style="height: 35%;">
                        <h6 class="card-title">' . $item["item_name"] . '</h6>
                        <p class="card-text my-0">
                            <span class="text-decoration-line-through my-0">' . number_format($item["item_noprice"]) . ' </span>
                            &#8377;' . number_format($item["item_price"]) . ' 
                            <span class="text-success fw-semibold my-0"> ' . $item["item_discount"] . '% off</span>
                        </p>';
                if ($item["item_emi"] != 0) {
                    echo '<p class="card-text text-success fw-semibold">No Cost EMI from &#8377;' . $item["item_emi"] . '/month</p>';
                }
                echo '</div>
                </div>';
            }

            // Right Down (3rd item)
            if (isset($items[2])) {
                $item = $items[2];
                echo '
                <div class="card border-end-0 border-start-0 border-top-0 align-content-center rounded-0" style="width: 100%; height: 50%;">
                    <img src="./uploaded_images/' . $item["item_image"] . '" class="card-img-top" style="height: 60%; object-fit: cover;" alt="' . $item["item_name"] . '">
                    <div class="card-body text-center px-0" style="height: 40%;">
                        <h6 class="card-title">' . $item["item_name"] . '</h6>
                        <p class="card-text my-0">
                            <span class="text-decoration-line-through my-0">' . number_format($item["item_noprice"]) . ' </span>
                            &#8377;' . number_format($item["item_price"]) . ' 
                            <span class="text-success fw-semibold my-0"> ' . $item["item_discount"] . '% off</span>
                        </p>';
                if ($item["item_emi"] != 0) {
                    echo '<p class="card-text text-success fw-semibold">No Cost EMI from &#8377;' . $item["item_emi"] . '/month</p>';
                }
                echo '</div>
                </div>';
            }
        }
        ?>
        </div>
    </div>
</div>
