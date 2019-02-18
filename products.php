<?php

//Start session management
session_start();
?>
<!doctype <!DOCTYPE html>
<!-- Begin html5 document -->
<html lang="en">
<!-- Begin head element -->

<head>
<?php
include "php/php-include/head.php"; 
output_head("Title", "Description"); 
?>
 <!-- js scripts -->
 <script src="js/product-search.js"></script>
 <script src="js/product-sort.js"></script>
</head>

<body>
    <!-- begin wrapper, wraps header and main, keeps footer and the bottom -->
    <div class="wrapper">
        <header class="container-fluid">
            <!-- begin nav bar container -->
            <div class="container">
                <nav class="navbar navbar-expand-md  navbar-light">
                    <a href="index.php" class="navbar-brand" id="logo-link">
                        <img id="site-logo" alt="" src="img/logo.jpg">SHOP
                    </a>
                    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-menu">
                        Menu
                        <br>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div id="nav-menu" class="collapse navbar-collapse">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">
                                    <i class="fas fa-home"></i> Home
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link current" href="products.php">
                                    <i class="fas fa-dice-d6"></i> Products
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="basket.php">
                                    <i class="fas fa-shopping-cart"></i> Basket
                                </a>
                            </li>
                            <li class="nav-item">
                            <?php
                            if(!isset($_SESSION['username'])) {
                                echo '<a class="nav-link" href="account.php">
                                    <i class="fas fa-user"></i> Account
                                </a>';
                            }else {
                                echo '<a class="nav-link" href="user.php">
                                    <i class="fas fa-user"></i> Account
                                </a>';
                            }
                            ?>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- begin nav bar container -->
        </header>
        <!-- end header -->
        <!-- begin main -->
        <main class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <form id="product-search-form" class="" action="" method="POST">
                    <br>
                    <br>
                        <label for="product-search"> <i class="fas fa-search"></i> Search Product:</label><span id="product-search-message"></span>
                        <input class="form-control" type="text" name="product-search" id="product-search" required>
                        <button type="submit" id="searchBtn" class="btn btn-info">Search</button>
                        <br>
                        <br>
                        <button type="submit" id="sort-low-high" class="btn btn-secondary">Sort by Price Low-High</button>
                        <br>
                        <br>
                        <button type="submit" id="sort-high-low" class="btn btn-secondary">Sort by Price High-Low</button>
                        <br>
                        <br>
                        <button type="submit" id="sort-name-a-z" class="btn btn-secondary">Sort by Name A-Z</button>
                        <br>
                        <br>
                        <button type="submit" id="sort-name-z-a" class="btn btn-secondary">Sort by Name Z-A</button>

                    </form>
                </div>
                <div class="col-sm-12 col-md-8">
                    <h1 class="main-heading">Search our Product List</h1>
                    <div id="search-info"></div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Size</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                                <th scope="col">Image</th>
                                <th scope="col">Add to Basket</th>


                            </tr>
                        </thead>
                        <tbody class="product-info">
                            <tr >
                                <th scope="row"></th>
                                <td>Search for your products to display product results</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <!-- end main -->

    </div>
    <!-- end wrapper (header and main) -->
    <!-- begin footer -->

    <footer class="container-fluid">
        <?php 
        include "php/php-include/footer.php"; 
        output_footer(); 
        ?>
    </footer>
    <!-- end footer -->
</body>

</html>