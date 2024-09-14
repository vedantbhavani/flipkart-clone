<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flipkart-Clone</title>
</head>
<?php
include('../partials/dbconnect.php');
include('../partials/links.php');
include(__DIR__ . "/lsnavbar.php")
?>

<script>
    function toggleFields() {
        const selectedCategory = document.getElementById('category').value;

        // Get the fields
        const mobileFields = document.getElementById('mobileFields');
        const groceryFields = document.getElementById('groceryFields');

        // Hide both initially
        if (mobileFields) mobileFields.classList.add('d-none');
        if (groceryFields) groceryFields.classList.add('d-none');

        // Show relevant fields based on the selected category
        if (selectedCategory === 'Mobile' && mobileFields) {
            mobileFields.classList.remove('d-none');
        } else if (selectedCategory === 'Grocery' && groceryFields) {
            groceryFields.classList.remove('d-none');
        }
        console.log("Toggle fields run success");

        const itemsDropdown = document.getElementById('items');
        const category = selectedCategory;

        // Clear existing options
        itemsDropdown.innerHTML = '<option value="" disabled selected>Select Item</option>';

        // Define items for each category
        const items = {
            Mobile: [
                <?php
                    $sql = "SELECT item_name FROM items WHERE item_category = 'Mobile'";
                    $result = mysqli_query($conn, $sql);
                    $itemNames = [];
                    while ($row = mysqli_fetch_assoc($result)) {
                        $itemNames[] = "'" . addslashes($row["item_name"]) . "'"; // Escape single quotes if needed
                    }
                    echo implode(", ", $itemNames);

                    ?>
            ],
            Grocery: [
                <?php
                    $sql = "SELECT item_name FROM items WHERE item_category = 'Grocery'";
                    $result = mysqli_query($conn, $sql);
                    $itemNames = [];
                    while ($row = mysqli_fetch_assoc($result)) {
                        $itemNames[] = "'" . addslashes($row["item_name"]) . "'"; // Escape single quotes if needed
                    }
                    echo implode(", ", $itemNames);

                    ?>
            ],
            Fashion: ['T-shirt', 'Jeans', 'Shoes'],
            Electronics: ['TV', 'Laptop', 'Headphones'],
            'Home and Furniture': ['Sofa', 'Table', 'Chair'],
            Appliances: ['Washing Machine', 'Refrigerator', 'Microwave'],
            Travel: ['Luggage', 'Backpack'],
            'Beauty Toys and more': ['Makeup Kit', 'Toys'],
            'Two Wheelers': ['Bike', 'Scooter']
        };

        // Populate items based on selected category
        if (items[category]) {
            items[category].forEach(item => {
                const option = document.createElement('option');
                option.value = item;
                option.text = item;
                itemsDropdown.appendChild(option);
            });
        }
    }
</script>


<body class="bg-body-secondary">
    <div class="mx-3 my-3">
        <div class="container w-50 my-5">
            <h3 class="text-center">Add Item-Details</h3>
            <hr>
            <form class="needs-validation" action="../partials/handleitemdetails.php" method="post" novalidate>
                <div class="fix-part g-3 row">
                    <div class="col-md-12">
                        <label for="category" class="form-label">Select Category</label>
                        <select name="item_category" class="form-control" id="category" onchange="toggleFields()">
                            <option value="" disabled selected>Select Category</option>
                            <option value="Grocery">Grocery</option>
                            <option value="Mobile">Mobile</option>
                            <option value="Fashion">Fashion</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Home and Furniture">Home and Furniture</option>
                            <option value="Appliances">Appliances</option>
                            <option value="Travel">Travel</option>
                            <option value="Beauty Toys and more">Beauty Toys and more</option>
                            <option value="Two Wheelers">Two Wheelers</option>
                        </select>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="items" class="form-label">Select Item</label>
                        <select name="item_name" class="form-control" id="items">
                            <option value="" disabled selected>Select Item</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="brand" class="form-label">Brand name</label>
                        <input type="text" class="form-control" name="item_brand" id="brand" required>
                        <div class="invalid-feedback">
                            fill this field.
                        </div>
                    </div>
                    <div class="col-md-8">
                        <label for="modal" class="form-label">Modal name</label>
                        <input type="text" class="form-control" name="item_modalname" id="modal" required>
                        <div class="invalid-feedback">
                            fill this field.
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="color" class="form-label">Color name</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" name="item_color" id="color" required>
                            <div class="invalid-feedback">
                                fill this field.
                            </div>
                        </div>
                    </div>

                    <hr>
                    <label class="form-label fs-4 mb-0 mt-1">Demensions</label>

                    <div class="col-md-3">
                        <label for="width" class="form-label">Width</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" name="item_width" id="width" required>
                            <div class="invalid-feedback">
                                fill this field.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="height" class="form-label">Height</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" name="item_height" id="height" required>
                            <div class="invalid-feedback">
                                fill this field.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="depth" class="form-label">Depth</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" name="item_depth" id="depth" required>
                            <div class="invalid-feedback">
                                fill this field.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="weight" class="form-label">Weight</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" name="item_weight" id="weight" required>
                            <div class="invalid-feedback">
                                fill this field.
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <!-- Mobile fields -->
                <div id="mobileFields" class="row d-flex g-3 needs-validation d-none">
                    <h3 class="col-md-12">Mobile Details</h3>
                    <div class="col-md-6">
                        <label class="form-label" for="ram">RAM (GB)</label>
                        <input class="form-control" type="number" id="ram" min="0" name="item_ram" step="2">
                        <div class="invalid-feedback">
                            fill this field.
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="storage">Storage (GB)</label>
                        <input class="form-control" type="number" id="storage" name="item_storage" step="1">
                        <div class="invalid-feedback">
                            fill this field.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label" for="displayInch">Display Size (Inch)</label>
                        <input class="form-control" type="text" id="displayInch" name="item_inch" step="0.1">
                        <div class="invalid-feedback">
                            fill this field.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label" for="displayType">Display Type</label>
                        <input class="form-control" type="text" id="displayType" name="item_display">
                        <div class="invalid-feedback">
                            fill this field.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label" for="protection">Display Protection</label>
                        <input class="form-control" type="text" id="protection" name="item_protection">
                        <div class="invalid-feedback">
                            fill this field.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label" for="cameraBack">Back Camera (MP)</label>
                        <input class="form-control" type="text" id="cameraBack" name="item_backcam" step="0.1">
                        <div class="invalid-feedback">
                            fill this field.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label" for="cameraFront">Front Camera (MP)</label>
                        <input class="form-control" type="text" id="cameraFront" name="item_frontcam" step="0.1">
                        <div class="invalid-feedback">
                            fill this field.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label" for="battery">Battery Capacity (mAh)</label>
                        <input class="form-control" type="number" id="battery" name="item_battery">
                        <div class="invalid-feedback">
                            fill this field.
                        </div>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label" for="charger">Charger Capacity (W)</label>
                        <input class="form-control" type="number" id="charger" name="item_charger">
                        <div class="invalid-feedback">
                            fill this field.
                        </div>
                    </div>
                    <div class="col-md-8">
                        <label class="form-label" for="processor">Processor Name</label>
                        <input class="form-control" type="text" id="processor" name="item_processor">
                        <div class="invalid-feedback">
                            fill this field.
                        </div>
                    </div>
                </div>


                <!-- Grocery fields -->
                <div id="groceryFields" class="mt-3 row d-flex g-3 needs-validation d-none">
                    <h3>Grocery Details</h3>

                    <div class="col-md-3">
                        <label class="form-label" for="quantity">Quantity (kg/liter):</label>
                        <input class="form-control" type="text" id="quantity" name="item_quantity">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label" for="containerType">Container Type:</label>
                        <select class="form-control" id="containerType" name="item_containertype">
                            <option value="" disabled selected>Select Container Type</option>
                            <option value="packet">Packet</option>
                            <option value=" ">Bottle</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label" for="shelfLife">Maximum Shelf Life (days):</label>
                        <input class="form-control" type="number" id="shelfLife" name="item_maximumlife" step="1">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label" for="organic">Organic:</label>
                        <select class="form-control" id="organic" name="item_organic">
                            <option value="" disabled selected>Select organic or not</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label" for="ingredients">Ingredients</label>
                        <textarea class="form-control" id="ingredients" name="item_ingrediants"></textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="manufacturedBy">Manufactured By</label>
                        <input class="form-control" type="text" id="manufacturedBy" name="item_manufactured">
                    </div>
                </div>

                <!-- last btn -->
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                            Agree to terms and conditions
                        </label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
            </form>
        </div>
    </div>
    <script>
    (() => {
        'use strict';
        const forms = document.querySelectorAll('.needs-validation');
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
    </script>
</body>

</html>