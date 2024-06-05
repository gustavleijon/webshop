<?php
// Initiate session managment
session_start();
// Checks whether admin is logged in
require_once 'functions/admin.session.check.php';
// Connection to database
require_once '../assets/config/dp.php';
// Includes header
require_once 'admin.header.php';
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
                <h5>Hantera produkter</h5>
                <table class="table table-bordered mt-5">
                    <?php
                    //Gets all information about chosen product from database
                        $sql = 'SELECT products.*, categories.category_title, theme.theme_title
                                FROM products 
                                LEFT JOIN categories ON products.category_id = categories.category_id
                                LEFT JOIN theme ON products.theme_id = theme.theme_id
                                ORDER BY product_id';
                        //Prepare a query
                        $stmt = $dbh->prepare($sql);
                        //Sends query to database
                        $stmt->execute();
                        // Fetch all rows at once
                        $roww = $stmt->fetchAll(PDO::FETCH_ASSOC);      
                        // Checks if there are products in the database
                        if (!empty($roww)) {
                            echo '
                            <thead>
                                <tr>  
                                    <th>Produktnamn</th>
                                    <th>Produktbeskrivning</th>
                                    <th>Sökord</th>
                                    <th>Kategori</th>
                                    <th>Säsongskollektion</th>
                                    <th>Produktbild</th>
                                    <th>Pris</th>
                                    <th>Antal</th>
                                    <th colspan="2">Hantera</th>
                                </tr>
                            </thead>
                            <tbody>
                            ';
                            // Prints out all information about each product
                            foreach ($roww as $product_row) {
                                //prints out categories to HTML
                                echo ' 
                                        <tr>
                                            
                                            <td>'.ucfirst($product_row['product_title']).'</td>
                                            <td>'.ucfirst($product_row['product_description']).'</td>
                                            <td>'.ucwords($product_row['product_keywords']).'</td>
                                            <td>'.ucfirst($product_row['category_title']).'</td>
                                            <td>'.ucfirst($product_row['theme_title']).'</td>
                                            <td>'.($product_row['product_image']).'</td>
                                            <td>'.($product_row['product_price']).'</td>
                                            <td>'.($product_row['product_status']).'</td>
                                            <td>    
                                                <a href="edit.product.php?edit_product='.$product_row['product_id'].'">
                                                    <i class="fa-solid fa-pen"></i> 
                                                </a>
                                                <a href="remove.product.php?delete_product='.$product_row['product_id'].'">
                                                    <i class="fa-regular fa-circle-xmark"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    ';
                                }
                            echo '</tbody>';
                        } else {
                            echo '<p>Inga produkter inlagda!</p>';
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>