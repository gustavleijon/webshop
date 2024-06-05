<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Initiate session managment
session_start();
// Connection to database
require_once 'assets/config/dp.php';
// Get information from a specific user
require_once 'assets/functions/user.select.id.php';
// Process login data to database
require_once 'assets/functions/session.login.php';
// Process login admin data to database
require_once 'admin/functions/admin.session.login.php';
// Includes header
require_once 'assets/includes/inc.header.php';
// Sends out the error messages
require_once 'assets/includes/notification.index.php';
// Deletes products from cart
require_once 'assets/functions/cart.delete.php';
?>
<div class="default-index">
    <div class="mx-auto text-center mt-2 background-image d-flex align-items-center justify-content-center">
        <div class="row indextext">
            <h1 class="mt-5 indexheader">YOURSTON DESIGN</h1>
            <h5>Text om handgjorda saker</h5>
            <?php
            if (!isset($_SESSION['uid']) || empty($_SESSION['uid'])) {
                echo '
                <a data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <button type="button" class="btn btn-light w-25 rounded-0 mx-auto d-block mt-5 mb-5">SPECIALBESTÄLL</button> 
                </a>
                ';
            } else {
                // If there is a session started send user to special products page 
                echo '
                <a href="special.products.php">
                    <button type="button" class="btn btn-light w-25 rounded-0 mx-auto d-block mt-5 mb-5">SPECIALBESTÄLL</button> 
                </a>
                ';
            }
            ?>
        </div>
    </div>
    <div class="introtext mx-auto text-center mt-2">
        <div class="row d-flex">
            <div class="mt-5 text-center">
                <h5>NYHETER</h5>
                <p class="mt-2">Spana in våra senaste tillagda produkter</p>
                <a href="products.php">
                    <button type="button" class="btn btn-dark w-25 rounded-0 mx-auto d-block mt-2 mb-5">GÅ TILL ALLA PRODUKTER</button>
                </a>
            </div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-1 mb-5 produkt2 mx-auto">
        <?php
        //Gets all information from database
        $sql = 'SELECT * FROM products ORDER BY date DESC LIMIT 0,3';
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
                <div class="col">
                <a href="product.details.php?product_id='.$row['product_id'].'">
                <div class="card produktholder">
                    <img src="./admin/product_images/'.$row['product_image'].'" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-center fw-bolder">'.ucfirst($row['product_title']).'</h5>
                        <p class="card-text text-center mt-2">Pris: '.ucfirst($row['product_price']).':-</p>
                    </div>
                    <a href="products.php?add_to_cart='.$row['product_id'].'" class="btn btn-dark productbtn rounded-0 mx-auto mt-2 mb-5 text-light">Lägg till i varukorgen</a>
                </div>
                </a>  
                </div>
                ';
            }
        }
        ?>
    </div>
</div>
<div class="small-index">
    <div class="mx-auto text-center mt-2 background-image-small d-flex align-items-center justify-content-center">
        <div class="row indextext">
            <h1 class="mt-5 indexheader-small">YOURSTON DESIGN</h1>
            <h5>Handgjorda produkter - fyllda med kärlek</h5>
        </div>
    </div>
    <div class="small-introtext mx-auto text-center mt-2">
        <div class="row d-flex">
            <div class="mt-5 text-center">
                <h5>NYHETER</h5>
                <p class="mt-2">Spana in våra senaste tillagda produkter</p>
                <a href="products.php">
                    <button type="button" class="btn btn-dark rounded-0 mx-auto d-block mt-2 mb-5">GÅ TILL ALLA PRODUKTER</button>
                </a>
            </div>
        </div>
    </div>
    <div class="row row-cols-12 g-4 mt-1 mx-auto">
        <?php
        //Gets all information from database
        $sql = 'SELECT * FROM products ORDER BY date DESC LIMIT 0,3';
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
                <div>
                    <a href="product.details.php?product_id='.$row['product_id'].'">
                        <div class="card produktholder">
                            <img src="./admin/product_images/'.$row['product_image'].'" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center fw-bolder">'.ucfirst($row['product_title']).'</h5>
                                <p class="card-text text-center mt-2">Pris: '.($row['product_price']).':-</p>
                            </div>
                            <a href="product.details.php?product_id='.$row['product_id'].'" class="btn btn-dark productbtn rounded-0 mx-auto mt-2 mb-5 text-light">Läs mer om produkten</a>
                        </div>
                    </a>  
                </div>
                ';
            }
        }
        ?>
    </div>
</div>
<?php
// Includes footer
require_once 'assets/includes/inc.footer.php';
?>