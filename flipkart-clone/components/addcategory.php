<?php
require(__DIR__ . '/../partials/dbconnect.php');

$table = "categories";
$checkTable = $conn->query("SHOW TABLES LIKE '$table'");
if ($checkTable->num_rows > 0) {
} else {
    $sql = "CREATE TABLE `flipkart`.`categories` (`cat_id` INT NOT NULL AUTO_INCREMENT , `cat_name` INT(50) NOT NULL , `cat_image` VARCHAR(255) NOT NULL , PRIMARY KEY (`cat_id`)) ENGINE = InnoDB";
    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error creating table: " . $conn->error;
    }
}
$method = $_SERVER['REQUEST_METHOD'];
if ($method = 'POST') {
    if (isset($_POST['category_name'])){
        $category_name = $_POST['category_name'];
        if (isset($_FILES['category_img'])) {   
            $category_img = $_FILES['category_img']['name'];
            $tempname = $_FILES['category_img']['tmp_name'];
            $folder = 'uploaded_images/' . $category_img;
            if (move_uploaded_file($tempname, $folder)) {
                $category_img = mysqli_real_escape_string($conn, $category_img);
                $category_name = mysqli_real_escape_string($conn, $category_name);
                $catsql = "INSERT INTO `categories` ( `cat_name`, `cat_image`) VALUES ('$category_name' , '$category_img')";
                $result = mysqli_query($conn, $catsql);
                if ($result) {
                    echo "success";
                    header("Location: /flipkart-clone/");
                } else {
                    die("not inserted");
                }
            }
            echo "success";
        }
        else{
            die("file not intersetd");
        }
    }
}
?>
<!-- Modal -->
<div class="modal fade" id="addcategory" tabindex="-1" aria-labelledby="addcategoryLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addcategoryLabel">Add Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php ' . $_SERVER["REQUEST_URI"] . ' ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="category_img" class="form-label">Category Image</label>
                        <input type="file" name="category_img" class="bg-secondary-subtle form-control" id="category_img" required>
                    </div>
                    <div class="mb-3">
                        <label for="category_name" class="form-label">Name</label>
                        <input type="text" name="category_name" class="bg-secondary-subtle form-control" id="category_name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>