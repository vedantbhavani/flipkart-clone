<?php require("./partials/dbconnect.php") ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flipkart-Clone</title>
</head>
<?php require("./partials/links.php") ?>
<?php include("./components/navbar.php") ?>

<body class="bg-body-secondary">
    <div class="mx-3 my-3 ">
        <?php
        include("./components/categories.php") ?>
        <div class="my-3 ">
            <?php include("./parts/cards.php"); ?>
        </div>
        <div class="my-3 d-flex">
            <?php
            $_session['suggest'] = "Suggested for You";
            $_SESSION['cate'] = "Mobile"; 
            include("./parts/itemscard.php"); 
            ?>
            <span class="mx-2">
            <?php
            $_SESSION['cate'] = "Grocery"; 
            $_session['suggest'] = "Top Selection";
            include("./parts/itemscard.php"); 
            ?>
            </span>
            <?php
            $_SESSION['cate'] = "Fashion"; 
            $_session['suggest'] = "Recommended Items";
            include("./parts/itemscard.php"); 
            ?>
        </div>
    </div>

</body>

</html>