<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yourston Design</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Font-Awesome Core CSS -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- JCrop CSS -->
    <link rel="stylesheet" href="assets/css/jcrop.min.css">
    <!-- Custom styles -->
    <link rel="stylesheet" href="assets/css/album.css">
    <!-- Includes JavaScript to creat dropdown -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php
    // Get ip address from visitor
    require_once 'assets/functions/ip.function.php';
    // Get specific information from cart table 
    require_once 'assets/functions/cart.function.php';
?>
<header class="default-header">
<!-- Search field, account/login modal and cart offcanvas -->
<div class="topbar ms-5">
<div class="mx-auto d-flex">
    <div class="ps-2 flex-grow-1">
        <div class="p-2 ps-2 w-100">
            <form action="products.php" method="GET" class="d-flex" role="search">
                <input type="search" class="form-control me-2 sok2" placeholder="&#128269; Sök..." aria-label="Search" name="search_data">
                <input type="submit" value="" class="btn" name="search_data_product">
            </form>
        </div>
    </div>
    <div class="p-2">
        <div class="pt-2">
        <!-- If there is no session for "uid" activate modal for login -->
        <?php
        if (!isset($_SESSION['uid']) || empty($_SESSION['uid'])) {
            echo '
            <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa-solid fa-circle-user"></i> Logga in
            </a>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-content modal-dialog login">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLabel">Mina sidor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="index.php" method="post" class="px-4 py-3">
                            <div class="mb-3">
                                <input type="email" class="form-control inputfield" id="email" name="email" placeholder="E-post">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control inputfield" id="password" name="password" placeholder="Lösenord">
                            </div>
                            <button type="submit" class="btn btn-dark loginbtn" name="login">Logga in</button>
                        </form>
                        <a href="add.user.php" class="px-4 py-3">
                            <button type="submit" class="btn btn-light addbtn mb-2">Registrera</button>
                        </a>
                    </div>
                </div>
            </div>
            ';
            } else {
                // If there is a session for "uid" write out link to account
            echo '
            <div>
                <a class="nav-link" href="protected.php">
                    <i class="fa-solid fa-circle-user"></i> Ditt konto
                </a>
            </div>
            ';
        }
        ?>
        </div>
        </div>
        <!-- Cart that activates offcanvas cart -->
        <div class="p-2 pe-3 pt-3">                                             
            <a class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><i class="fa-solid fa-cart-shopping"><sup><?php cart_item();?></sup></i></a>
        </div>
        <?php
        // Includes offcanvas side cart
        require_once 'inc.cart.php';
        ?>
        </div>
    </div>
</div>
</div>
<!-- Navbar on fullscreen with links -->
<nav class="mx-auto p-3 meny">
    <div class="d-flex">
        <div class="p-2 flex-grow-1">YOURSTON DESIGN</div>
        <div class="d-flex ms-auto">
            <div class="p-2">
                <a href="index.php">Hem</a>
            </div>
            <div class="p-2">
                <!-- Products dropdown with options controled by admin page -->
                <a href="products.php" data-bs-toggle="dropdown" aria-expanded="false">Produkter</a>
                <div class="dropdown-menu mt-4 mx-auto produkter">
                    <div class="row gx-3">
                        <div class="col ms-5 mt-3 ps-5 text-center">
                            <h5>Produkter</h5>
                            <!-- Showes all products -->
                            <li class="nav-item m-0 p-0">
                                <a href="products.php" class="nav-link"><p>Visa alla</p></a>
                            </li>
                            <?php
                                //Gets all information from database
                                $sql = 'SELECT * FROM categories';
                                //Prepare a query
                                $stmt = $dbh->prepare($sql);
                                //Sends query to database
                                $stmt->execute();

                                //Checks wether database is empty
                                if ($stmt->rowCount()>0) {
                                    //Get categories from database
                                    while ($row = $stmt->fetch()) {
                                        //prints out categories to HTML
                                        echo '
                                        <li class="nav-item m-0 p-0">
                                            <a href="products.php?category='.$row['category_id'].'" class="nav-link"><p>'.ucfirst($row['category_title']).'</p></a>
                                        </li>
                                        ';
                                    }
                                }
                            ?>
                        </div>
                        <div class="col text-center mt-3">
                            <h5>Säsongskollektion</h5>
                            <!-- Showes all products -->
                            <li class="nav-item m-0 p-0">
                                <a href="products.php" class="nav-link"><p>Visa alla</p></a>
                            </li>
                            <?php
                                //Gets all information from database
                                $sql = 'SELECT * FROM theme';
                                //Prepare a query
                                $stmt = $dbh->prepare($sql);
                                //Sends query to database
                                $stmt->execute();

                                //Checks wether database is empty
                                if ($stmt->rowCount()>0) {
                                    //Get theme from database
                                    while ($row = $stmt->fetch()) {
                                        //prints out theme to HTML
                                        echo '
                                            <li class="nav-item">
                                                <a href="products.php?theme='.$row['theme_id'].'" class="nav-link"><p>'.ucfirst($row['theme_title']).'</p></a>
                                            </li>
                                        ';
                                    }
                                }
                            ?>
                        </div>
                        <div class="col me-5 mt-3 pe-5 text-center">
                            <!-- Link to special product page -->
                            <h5>Designa din egna</h5>
                            <!-- If there is no session started for "uid" activate login modal (user need to be logged in to make special orders) -->
                            <?php
                                if (!isset($_SESSION['uid']) || empty($_SESSION['uid'])) {
                                    echo '
                                    <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Börja designa
                                    </a>
                                    ';
                                } else {
                                    // If there is a session started send user to special products page 
                                    echo '
                                    <a href="special.products.php">Börja designa</a>
                                    ';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-2">
                <a href="about.php">Om konstnären</a>
            </div>
        </div>
    </div>
</nav>
</header>
<!-- responsive header -->
<header class="small-header">
    <div class="d-flex">
    <!-- Use the logo as a link to index -->
        <h3 class="flex-grow-1 m-3">
            <a href="index.php">YOURSTON DESIGN</a>
        </h3>
        <!-- hamburger menu -->
        <a type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasResponsive" aria-controls="offcanvasRight"><i class="fa-solid fa-bars m-3 burgermenu"></i></a>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasResponsive" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body"> 
            <ul class="ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Hem</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Produkter</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">Om konstnären</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">Din varukorg</a>
                </li>
            </ul>
        </div>
    </div>
</header>