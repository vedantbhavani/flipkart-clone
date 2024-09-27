<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flipkart-Clone</title>
</head>
<?php
require('../partials/links.php');
include('./lsnavbar.php');
?>

<body class="bg-body-secondary">
    <div class="mx-3 my-3">
        <div class="container w-50 my-5">
            <h3 class="text-center">Login Page</h3>
            <hr>
            <form action="../partials/handlelogin.php" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address or Username</label>
                    <input type="text" class="form-control" name="email" id="email" required>
                    <input type="hidden" class="form-control" name="username" value="<?php echo $username; ?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" required>
                </div>
                <button type="submit" class="btn btn-primary text-center">Login</button>
            </form>
        </div>
    </div>

</body>

</html>