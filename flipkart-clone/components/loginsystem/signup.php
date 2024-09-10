<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flipkart-Clone</title>
</head>
<?php 
require(__DIR__ . '/../../partials/links.php'); 
include(__DIR__ . '/lsnavbar.php');
?>

<body class="bg-body-secondary">
    <div class="mx-3 my-3">
        <div class="container w-50 my-5">
            <h3 class="text-center">Signup page</h3>
            <hr>
            <form action="handlesignup.php" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <div class="mb-3">
                    <label for="cpassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="cpassword" id="cpassword" required>
                </div>
                <button type="submit" class="btn btn-primary text-center">Signup</button>
            </form>
        </div>
    </div>

</body>

</html>