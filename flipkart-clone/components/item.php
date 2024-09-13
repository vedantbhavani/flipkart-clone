<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flipkart-Clone</title>
</head>
<?php
    include('../partials/links.php'); 
    include(__DIR__ . "/lsnavbar.php") 

?>

<body class="bg-body-secondary">
    <div class="mx-3 my-3">
        <div class="container w-50 my-5">
            <h3 class="text-center">Add Items</h3>
            <hr>
            <form action="../partials/handleitem.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="item_name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="item_name" id="item_name" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="item_category" class="form-label">Category</label>
                    <select name="item_category" class="form-control" id="item_category">
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
                <div class="mb-3">
                    <label for="item_noprice" class="form-label">Not a Real Price</label>
                    <input type="number" class="form-control" name="item_noprice" id="item_noprice">
                </div>
                <div class="mb-3">
                    <label for="item_price" class="form-label">Real Price</label>
                    <input type="number" class="form-control" name="item_price" id="item_price">
                </div>
                <div class="mb-3">
                    <label for="item_image" class="form-label">Image of Item</label>
                    <input type="file" class="form-control" name="item_image" id="item_image">
                </div>
                <div class="mb-3">
                    <label for="emi_check" class="form-label">EMI Available</label>
                    <select name="emi_check" class="form-control" id="emi_check">
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Item</button>
            </form>
        </div>
    </div>
</body>

</html>