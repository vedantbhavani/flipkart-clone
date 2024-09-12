<div class="bg-body row mx-0 px-0 ">
<?php
$sql = "select * from `categories`";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    $images = $row["cat_image"];
    $names = $row["cat_name"];
    $id = $row["cat_id"];
    echo '
    <div class="col text-center pt-2 m-0 p-0 link-offset-10-hover ">
        <img src="uploaded_images/'.$images.'" class="card-img-top" style="width: 4vw; height: 8vh;" alt="phone...">
        <p class="card-title fw-semibold fs-6">'.$names.'</p>
    </div>
    ';   
}
?>
</div>
