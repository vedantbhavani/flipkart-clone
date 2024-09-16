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

<body class="bg-body-secondary" style="margin-top: 6%;">
    <div class="mx-3">
        <?php
        include("./components/categories.php") ?>
        <div class="my-3 ">
            <?php include("./components/slider.php"); ?>
        </div>
        <div class="my-3 d-flex">
            <?php
            $_SESSION['cate'] = "Mobile";
            $_session['suggest'] = "Suggested for You";
            include("./components/itemscard.php");
            ?>
            <span class="mx-2">
                <?php
                $_SESSION['cate'] = "Grocery";
                $_session['suggest'] = "Top Selection";
                include("./components/itemscard.php");
                ?>
            </span>
            <?php
            $_SESSION['cate'] = "Fashion";
            $_session['suggest'] = "Recommended Items";
            include("./components/itemscard.php");
            ?>

        </div>
    </div>
</body>

</html>