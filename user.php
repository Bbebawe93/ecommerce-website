<?php

//Start session management
session_start();
include "profile.php"
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
 <script src="js/register.js"></script>
 <script src="js/login.js"></script>
 <script src="js/logout.js"></script>
<script src="js/edit-profile.js"></script>
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
                                <a class="nav-link" href="products.php">
                                    <i class="fas fa-dice-d6"></i> Products
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="basket.php">
                                    <i class="fas fa-shopping-cart"></i> Basket
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link current" href="user.php">
                                    <i class="fas fa-user"></i> Account
                                </a>
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
                    <ul class="list-group list-group-flush">
                <p class="personal-profile p-3 mb-2 bg-info text-white">Personal Profile</p>
                    <div id="profile-message"></div>
                    <?php getProfile();?>

                    </ul>
                </div>
                <div class="col-sm-12 col-md-8">
                    <h1 class="p-3 mb-2 bg-info text-white" id="order-history">Order History</h1>
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