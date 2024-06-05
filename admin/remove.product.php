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
            <?php
            // Checks whether delete button for product has been pressed and product ID is available as GET
            if (isset($_GET['delete_product'])) {
            // Gets specific post from database
            $sql = 'SELECT * FROM products WHERE product_id = :product_id';
            // Prepares a query
            $stmt = $dbh->prepare($sql);
            // Connects GET-variable with db containers
            $stmt->bindValue(':product_id', $_GET['delete_product']);
            // Sends query to database
            $stmt->execute();
            // Adds all information about the specific product to variable
            $row = $stmt->fetch();
            }
            ?>
            <div class="col-9 mt-5">
                <h4 class="mb-4 pt-4">Radera produkt</h4>
                <div class="row">
                    <div class="col-4">
                        <form action="admin.php" method="post">
                            <div class="row">
                                <p>Är du säker på att du vill radera följande konto?</p>
                                <p><?php echo ucfirst($row['product_title']); ?></p>
                            </div>
                            <div>
                                <input type="submit" class="btn btn-danger loginbtn" value="Radera" name="delete_product">  
                            </div> 
                            <div class="mt-2">
                                <input type="submit" class="btn btn-success loginbtn" value="Avbryt" name="cancel_product">  
                            </div>                     
                            <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>