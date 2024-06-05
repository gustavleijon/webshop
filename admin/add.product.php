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
?>
    <div class="line-container pt-5">
        <div class="solid-line"></div>
    </div>
    <div class="container m-0 p-0">
        <div class="row">
            <div class="col-3 adminpanel">
                <?php 
                // Includes adminpandel 
                require_once 'inc.adminpanel.php';
                ?>
            </div>
            <div class="col-9 admintable my-5">
                <h5>Lägg till produkter</h5>
                <div class="row mt-5">
                    <form action="add.product.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="product_title" class="form-label pt-2">Lägg till produktnamn</label>
                            <input type="text" class="form-control inputfield" id="product_title" name="product_title" placeholder="Produktnamn" autocomplete="off" required="required">
                        </div>
                        <div class="mb-3">
                            <label for="product_description" class="form-label pt-2">Lägg till produktbeskrivning</label>
                            <input type="text" class="form-control inputfield" id="product_description" name="product_description" placeholder="Produktbeskrivning">
                        </div>
                        <div class="mb-3">
                            <label for="product_keywords" class="form-label pt-2">Lägg till sökord</label>
                            <input type="text" class="form-control inputfield" id="product_keywords" name="product_keywords" placeholder="Sökord">
                        </div>
                        <div class="mb-3">
                            <select name="product_category" id="" class="form-select">
                                <option value="">Välj en kategori</option>
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
                                            <option value="'.$row['category_id'].'">'.ucfirst($row['category_title']).'</option>
                                            ';
                                        }
                                    }
                                ?>
                            </select>   
                        </div>
                        <div class="mb-3">
                            <select name="product_theme" id="" class="form-select">
                                <option value="">Välj en säsongskollektion</option>
                                <?php
                                    //Gets all information from database
                                    $sql = 'SELECT * FROM theme';
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
                                            <option value="'.$row['theme_id'].'">'.ucfirst($row['theme_title']).'</option>
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
                            <label for="product_price" class="form-label pt-2">Lägg till produktpris</label>
                            <input type="text" class="form-control inputfield" id="product_price" name="product_price" placeholder="Produktpris">
                        </div>
                        <div class="mb-3">
                            <label for="product_status" class="form-label pt-2">Lägg till antal</label>
                            <input type="text" class="form-control inputfield" id="product_status" name="product_status" placeholder="produktantal">
                        </div>
                        <button type="submit" class="btn btn-dark loginbtn mt-5" name="insert_product">Lägg till produkt</button>
                    </form>
                </div>
            </div>
        </div>
    </div>