<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Initiate session managment
session_start();
// Checks whether admin is logged in
require_once 'functions/admin.session.check.php';
// Connection to database
require_once '../assets/config/dp.php';
// Includes header
require_once 'admin.header.php';
// Process uploaded photo
require_once '../assets/functions/user.photo.upload.php';
// Insert product into database 
require_once 'functions/insert.product.php';
// Update product into database 
require_once 'functions/product.update.php';
?>
    <div class="line-container pt-5">
        <div class="solid-line"></div>
    </div>
    <div class="container m-0 p-0 mb-5">
        <div class="row">
            <div class="col-3 adminpanel">
                <?php 
                // Includes adminpandel 
                require_once 'inc.adminpanel.php';
                ?>
            </div>
            <?php
            // Checks whether user ID is available as SESSION
            if (isset($_GET['edit_product'])) {
            // Gets specific post from database
            $sql = 'SELECT * FROM products WHERE product_id = :product_id';
            // Prepares a query
            $stmt = $dbh->prepare($sql);
            // Connects GET-variable with db containers
            $stmt->bindValue(':product_id', $_GET['edit_product']);
            // Sends query to database
            $stmt->execute();
            // Adds all information about user to variable
            $row = $stmt->fetch();
            }
            ?>
            <div class="col-9 admintable my-5">
                <h5>Hantera produkter</h5>
                <div class="row mt-5">
                    <form action="edit.product.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="product_title" class="form-label pt-2">Hantera produktnamn</label>
                            <input type="text" class="form-control inputfield" id="product_title" name="product_title" value="<?php echo ucfirst($row['product_title']);?>" placeholder="Produktnamn" autocomplete="off" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="product_description" class="form-label pt-2">Hantera produktbeskrivning</label>
                            <input type="text" class="form-control inputfield" id="product_description" name="product_description" value="<?php echo ucfirst($row['product_description']);?>" placeholder="Produktbeskrivning">
                        </div>
                        <div class="mb-3">
                            <label for="product_keywords" class="form-label pt-2">Hantera sökord</label>
                            <input type="text" class="form-control inputfield" id="product_keywords" name="product_keywords" value="<?php echo ($row['product_keywords']);?>" placeholder="Sökord">
                        </div>
                        <div class="mb-3">
                            <select name="product_category" id="" class="form-select">
                                <option value="">Välj kategori</option>
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
                                        while ($c_row = $stmt->fetch()) {
                                            //prints out categories to HTML
                                            echo '
                                            <option value="'.$c_row['category_id'].'">'.ucfirst($c_row['category_title']).'</option>
                                            ';
                                        }
                                    }
                                ?>
                            </select>   
                        </div>
                        <div class="mb-3">
                            <select name="product_theme" id="" class="form-select">
                                <option value="">Välj säsongskollektion</option>
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
                                        while ($t_row = $stmt->fetch()) {
                                            //prints out theme to HTML
                                            echo '
                                            <option value="'.$t_row['theme_id'].'">'.ucfirst($t_row['theme_title']).'</option>
                                            ';
                                        }
                                    }
                                ?>
                            </select>   
                        </div>
                        <div class="mb-3">
                            <label for="product_image" class="form-label pt-2">Lägg till produktbild</label>
                            <input type="file" name="product_image" id="product_image" class="form-control" required="required">
                        </div> 
                        <div class="mb-3">
                            <label for="product_price" class="form-label pt-2">Hantera produktpris</label> 
                            <input type="text" class="form-control inputfield" id="product_price" name="product_price" value="<?php echo $row['product_price'];?>" placeholder="Produktpris">
                        </div>
                        <div class="mb-3">
                            <label for="product_status" class="form-label pt-2">Hantera antal</label>
                            <input type="text" class="form-control inputfield" id="product_status" name="product_status" value="<?php echo $row['product_status'];?>" placeholder="produktantal">
                        </div>
                        <button type="submit" class="btn btn-dark loginbtn mt-5" name="update_product">Uppdatera produktinformationen</button>
                        <input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>">
                    </form>
                </div>
            </div>
        </div>
    </div>