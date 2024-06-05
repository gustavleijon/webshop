<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Initiate session managment
session_start();
// Get information from a specific user
require_once 'assets/functions/user.select.id.php';
// Connection to database
require_once 'assets/config/dp.php';
// Includes header
require_once 'assets/includes/inc.header.php';
// Insert items into cart table
require_once 'assets/functions/cart.insert.php';
?>
<div class="default-product">
    <div class="mt-2">
        <img src="photos/product-image.png" alt="Bild på produkter" class="productimage">
    </div>
    <div class="mx-auto introtext text-center mt-3">
        <div class="row">
            <h1 class="mt-5">Produkter</h1>
            <p> Handgjorda produkter - Fyllda med kärlek </p>
        </div>                  
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4 mt-1 produkt2 mx-auto">
        <?php
        //Checks wether category/brand is not set
        if (!isset($_GET['category']) && !isset($_GET['theme']) && !isset($_GET['search_data_product'])) {
            //Gets all information from database
            $sql = 'SELECT * FROM products ORDER BY product_title';
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
                            <h5 class="card-title fw-bolder text-center">'.ucwords($row['product_title']).'</h5>
                            <p class="card-text text-center mt-2">Pris: '.($row['product_price']).':-</p>
                        </div>
                        <a href="products.php?add_to_cart='.$row['product_id'].'" class="btn btn-dark productbtn rounded-0 mx-auto mt-2 mb-5 text-light">Lägg till i varukorgen</a>
                    </div>
                    </a>  
                    </div>
                    ';
                }
            }
        }
        // Getting unique categories
        if(isset($_GET['category'])){ 
            //Gets all information from database
            $sql = 'SELECT * FROM products WHERE category_id = :category_id ORDER BY product_title';
            //Prepare a query
            $stmt = $dbh->prepare($sql);
            // Binds Value
            $stmt->bindValue(':category_id', $_GET['category']);
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
                            <h5 class="card-title fw-bolder text-center">'.ucwords($row['product_title']).'</h5>
                            <p class="card-text text-center mt-2">Pris: '.($row['product_price']).':-</p>
                        </div>
                        <a href="products.php?add_to_cart='.$row['product_id'].'" class="btn btn-dark productbtn text-light">Lägg till i varukorgen</a>
                    </div>
                    </a>  
                    </div> 
                    ';
                }
            } else {
                // Successful insertion
                echo '
                    <div class="alert alert-warning">
                        Det finns inga varor i den valda kategorin!
                    </div>';
            }
        }
        // Getting unique theme
        if(isset($_GET['theme'])){ 
            //Gets all information from database
            $sql = 'SELECT * FROM products WHERE theme_id = :theme_id ORDER BY product_title';
            //Prepare a query
            $stmt = $dbh->prepare($sql);
            // Binds Value
            $stmt->bindValue(':theme_id', $_GET['theme']);
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
                            <h5 class="card-title fw-bolder text-center">'.ucwords($row['product_title']).'</h5>
                            <p class="card-text text-center mt-2">Pris: '.($row['product_price']).':-</p>
                        </div>
                        <a href="products.php?add_to_cart='.$row['product_id'].'" class="btn btn-dark productbtn text-light">Lägg till i varukorgen</a>
                    </div>
                    </a>  
                    </div> 
                    ';
                }
            } else {
                // Successful insertion
                echo '
                    <div class="alert alert-warning">
                        Det finns inga varor i den valda kategorin!
                    </div>';
                }
            }
            if(isset($_GET['search_data_product'])){ 
                $search_data_value = $_GET['search_data'];
                //Gets all information from database where search data is equal with keyword
                $sql = "SELECT * FROM products WHERE product_keywords LIKE '%$search_data_value%'";
                //Prepare a query
                $stmt = $dbh->prepare($sql);
                //Sends query to database
                $stmt->execute();
        
                //Checks wether database is empty
                if ($stmt->rowCount()>0){
                    //Get categories from database
                    while ($row = $stmt->fetch()){
                        //prints out categories to HTML
                        echo '
                        <div class="col">
                            <a href="product.details.php?product_id='.$row['product_id'].'">
                                <div class="card produktholder">
                                    <img src="./admin/product_images/'.$row['product_image'].'" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bolder text-center">'.ucwords($row['product_title']).'</h5>
                                        <p class="card-text text-center mt-2">Pris: '.($row['product_price']).':-</p>
                                    </div>
                                    <a href="products.php?add_to_cart='.$row['product_id'].'" class="btn btn-dark productbtn text-light">Lägg till i varukorgen</a>
                                </div>
                            </a>  
                        </div> 
                        ';
                    }
                }
            }
        ?> 
    </div>
</div>
<div class="small-product">
    <div class="mt-2 text-center">
        <img src="photos/product-image.png" alt="Bild på produkter" class="small-productimage">
    </div>
    <div class="mx-auto small-introtext text-center mt-3">
        <div class="row">
            <h1 class="mt-5">Produkter</h1>
            <p>Hangjorda produkter - Fyllda med kärlek</p>
        </div>                  
    </div>
    <div class="row row-cols-12 g-4 mt-1 mx-auto">
        <?php
            //Gets all information from database
            $sql = 'SELECT * FROM products ORDER BY product_title';
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
                                    <h5 class="card-title fw-bolder text-center">'.ucwords($row['product_title']).'</h5>
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