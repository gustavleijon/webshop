<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="utf-8">
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
<div class="mx-auto d-flex topbar">
    <div class="ps-2 flex-grow-1">
        <div class="p-2 ps-2 w-100">
            <form action="products.php" method="GET" class="d-flex" role="search">
                <!-- Ska vi ha ett värde på value?? -->
                <input type="search" class="form-control me-2 sok2" placeholder="&#128269; Sök..." aria-label="Search" name="search_data">
                <input type="submit" value="" class="btn" name="search_data_product">
            </form>
        </div>
    </div>
    <div class="p-2">
        <div class="pt-2">
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
                    <div class="text-center logintext">
                        <div class="row row-cols-2 logintext mb-2">
                        <div class="col">GLÖMT LÖSENORD?</div>
                        <div class="col">ADMIN</div>
                    </div>
                    </div>
                </div>
            </div>
            ';
            } else {
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
            
        </div>
    </div>
</div>
<nav class="mx-auto p-4 meny go-back">
    <a href="../../index.php">
        <i class="fa-solid fa-chevron-left"> Tillbaka</i>
    </a>
</nav>