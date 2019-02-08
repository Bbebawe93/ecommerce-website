<?php
//Start session management
session_start();
if(isset($_SESSION['username'])) {
header('Location: user.php');
exit;
}
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
            <div id="dialog"></div>
            <div class="row">
                    <div class="col-sm-12 col-md-4">
                    <h2 class="secondary-heading">Login to your Account</h2>
                    <!-- Login form -->
                    <form id="login-form" action="" method="POST">
                        <fieldset class="form-group">
                            <legend>Please fill in the form to login to your account</legend>
                            <label for="log-username"><i class="fa fa-user icon"></i> Username: </label><span id="log-username-error" class="error"></span>
                            <input class="form-control" type="text" name="log-username" id="log-username" required>
                            <label for="log-password"><i class="fas fa-key icon"></i> Password: </label>
                            <input class="form-control" type="password" name="log-password" id="log-password" required>
                            <button type="submit" id="login-button" class="btn btn-success">Login</button>
                            <button type="reset" class="clear-button btn btn-info">Clear</button>
                        </fieldset>
                    </form>
                </div>
                    <div class="col-sm-12 col-md-8">
                    <h1 class="main-heading">Register for a new Account</h1>
                    <!-- Registration form -->
                    <form id="registration-form" class="" action="" method="POST">
                        <fieldset class="form-group">
                            <legend>Please fill in this registration form to create an
                                account</legend>
                            <label for="first-name"> <i class="fas fa-id-card icon"></i> First Name:</label><span id="first-name-message"></span>
                            <input class="form-control" type="text" name="first-name" id="first-name" required>
                            <label for="last-name"><i class="fas fa-id-card icon"></i> Last Name:</label><span id="last-name-message"></span>
                            <input class="form-control" type="text" name="last-name" id="last-name" required>
                            <label for="residential-city"><i class="fas fa-home"></i> Residential City: (auto complete)</label><span
                                id="residential-city-message"></span>
                            <input class="form-control" type="text" name="residential-city" id="residential-city"
                                required>
                            <label for="reg-username"><i class="fa fa-user icon"></i> Username:</label><span id="username-message"></span>
                            <input class="form-control" type="text" name="reg-username" id="reg-username" required>
                            <label for="reg-password"><i class="fas fa-key icon"></i> Password:</label><span id="reg-password-message"></span>
                            <input class="form-control" type="password" name="reg-password" id="reg-password" required>
                            <span id="reg-error"></span>
                            <button type="submit" id="register-button" class="btn btn-primary">Register</button>
                            <button type="reset" id="clear-button" class="clear-button  btn btn-info">Clear</button>
                        </fieldset>
                    </form>
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