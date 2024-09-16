<nav class="navbar p-0 navbar-expand-lg navbar-tertiary bg-primary">
    <div class="container-fluid " style="margin-left: 100px">
        <a class="navbar-brand text-light" href="/flipkart-clone/"><img src="../us_images/flipkart-img.png" style="width: 60px;" alt="Nothing"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="d-flex my-auto" action="./handlesearch.php" method="get" role="search">
                <input class="form-control me-2 bg-primary-subtle" name="search" style="width: 50vw;" type="search" placeholder="Search" aria-label="Search">
            </form>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <div class="btn-group ">
                        <a href="./login.php" class="btn btn-body nav-link text-light" type="button">Login</a>
                        <button type="button" class="btn dropdown-toggle dropdown-toggle-split  text-light" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li class="d-flex"><a class="dropdown-item" href="./signup.php">New Coustomer?  Signup</a></li>
                            <hr>
                            <li><a class="dropdown-item" type="button">Add Category</a></li>
                            <!-- <li><a class="dropdown-item" href="addcategory.php">Add Category</a></li> -->
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Become a Seller</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
