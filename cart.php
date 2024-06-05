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
// Insert items into cart table on small screen
require_once 'assets/functions/small.cart.insert.php';
?>
<!-- Present the products that exist in the cart if the IP adress matches the IP adress in the cart_details table -->
<div class="default-cart">
    <nav class="mx-auto p-3 meny">
        <div class="line-container pt-5">
            <div class="solid-line"></div>
        </div>
        <div class="container m-0 p-0">
            <div class="row">
                <div class="admintable mt-4">
                    <section>
                        <div class="pb-5">
                            <div class="row">
                                <div class="col-7">
                                    <div class="container">
                                    <h5>Din varukorg</h5>
                                        <div class="row pt-4">
                                            <div class="solid-line ms-2"></div>
                                        <?php
                                        $get_ip = getIPAddress();
                                        $total = 0;
                                        $sql = 'SELECT * FROM cart_details WHERE ip_address = :ip_address';
                                        $stmt = $dbh->prepare($sql);
                                        $stmt->bindValue(':ip_address', $get_ip);
                                        $stmt->execute();
                                        while($row_cart = $stmt->fetch(PDO::FETCH_ASSOC)){
                                            $product_id = $row_cart['product_id'];
                                            $sql_product = 'SELECT * FROM products WHERE product_id = :product_id';
                                            $stmt_product = $dbh->prepare($sql_product);
                                            $stmt_product->bindValue(':product_id', $product_id);
                                            $stmt_product->execute();
                                            while($row_price = $stmt_product->fetch(PDO::FETCH_ASSOC)){
                                                $product_price = array($row_price['product_price']);
                                                $price_table = $row_price['product_price'];
                                                $product_id = $row_price['product_id'];
                                                $product_title = $row_price['product_title'];
                                                $product_image = $row_price['product_image'];
                                                $product_values = array_sum($product_price);
                                                $total += $product_values;  
                                                echo '
                                            <div class="row my-3">
                                                <div class="col">
                                                    <img src="./admin/product_images/' . $product_image . '" class="cart_image">
                                                </div>
                                                <div class="col">
                                                    <p>' . ucwords($product_title) . '</p>
                                                    <p>' . $price_table . ' Kr</p>
                                                </div>
                                                <div class="col">
                                                    <input type="text" name="qty" id="" value="1" class="form-input w-25">
                                                    <a href="../../index.php?cart_delete_product=' . $product_id. '">
                                                        <i class="fa-solid fa-x"></i>
                                                    </a>
                                                </div>
                                            </div> 
                                            ';
                                            }
                                        }
                                        ?>   
                                        </div>
                                    </div>         
                                </div>   
                                <div class="col-4 offset-1">
                                    <div class="container">
                                    <h5>Att betala</h5>
                                        <div class="row pt-4">
                                            <div class="solid-line ms-2"></div>
                                            <h4 class="px-3 py-4">Totalt: <?php echo $total?></h4>
                                            <button class="btn btn-dark loginbtn ms-2">BETALA</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </nav>
</div>
<div class="small-cart">
    <nav class="mx-auto p-3">
        <section>
            <h5>Din varukorg</h5>
                <div class="row pt-4">
                    <div class="solid-line ms-2"></div>
                    <?php
                    $get_ip = getIPAddress();
                    $total = 0;
                    $sql = 'SELECT * FROM cart_details WHERE ip_address = :ip_address';
                    $stmt = $dbh->prepare($sql);
                    $stmt->bindValue(':ip_address', $get_ip);
                    $stmt->execute();
                    while($row_cart = $stmt->fetch(PDO::FETCH_ASSOC)){
                        $product_id = $row_cart['product_id'];
                        $sql_product = 'SELECT * FROM products WHERE product_id = :product_id';
                        $stmt_product = $dbh->prepare($sql_product);
                        $stmt_product->bindValue(':product_id', $product_id);
                        $stmt_product->execute();
                        while($row_price = $stmt_product->fetch(PDO::FETCH_ASSOC)){
                            $product_price = array($row_price['product_price']);
                            $price_table = $row_price['product_price'];
                            $product_id = $row_price['product_id'];
                            $product_title = $row_price['product_title'];
                            $product_image = $row_price['product_image'];
                            $product_values = array_sum($product_price);
                            $total += $product_values;  
                            echo '
                        <div class="row my-3">
                            <div class="col">
                                <img src="./admin/product_images/' . $product_image . '" class="cart_image">
                            </div>
                            <div class="col">
                                <p>' . ucwords($product_title) . '</p>
                                <p>' . $price_table . ' Kr</p>
                            </div>
                            <div class="col">
                                <input type="text" name="qty" id="" value="1" class="form-input w-25">
                                <a href="../../index.php?cart_delete_product=' . $product_id. '">
                                    <i class="fa-solid fa-x"></i>
                                </a>
                            </div>
                        </div> 
                        ';
                        }
                    }
                    ?>           
                </div>   
                <h5>Att betala</h5>
                <div class="row pt-4">
                    <div class="solid-line ms-2"></div>
                    <h4 class="px-3 py-4">Totalt: <?php echo $total?></h4>
                    <a href="products.php" class="btn btn-dark loginbtn ms-2 text-light">FORTSÄTT SHOPPA</a>
                    <button class="btn btn-dark loginbtn ms-2 my-3">BETALA</button>
                </div>
        </section>
    </nav>
</div>  
<!-- Ett försök till fuktionalitet som gör att användaren har möjligheten till att uppdatera antalet av en produkt. OBS funkar ej -->          
<?php
/* $get_ip = getIPAddress();
if (isset($_POST['update_cart'])){ */
    /* $quantity = intval($_POST['quantity']);
    //Creates query to database
    $sql_quantity = '
        UPDATE cart_details SET quantity = :quantity
        WHERE ip_address = :ip_address
        ';
    //Prepares the query
    $stmt_quantity = $dbh->prepare($sql_quantity);
    //Connects empty placeholders with form fields
    $stmt_quantity->bindValue(':quantity',$quantity);
    $stmt_quantity->bindValue(':ip_address', $get_ip);
    // Execute the query
    $stmt_quantity->execute(); 
    $total=$total*$quantity;  */
    $get_ip = getIPAddress();
    if (isset($_POST['update_cart'])){
    // KOD FRÅN AI under här
    // Ensure $quantity is a valid integer
    $quantity = intval($_POST['qty']);

    // Your existing code for updating the quantity
    $sql_update_quantity = 'UPDATE cart_details SET quantity = :quantity WHERE product_id = :product_id AND ip_address = :ip_address';
    $stmt_update_quantity = $dbh->prepare($sql_update_quantity);
    $stmt_update_quantity->bindValue(':product_id', $product_id);
    $stmt_update_quantity->bindValue(':ip_address', $get_ip);
    $stmt_update_quantity->bindValue(':quantity', $quantity, PDO::PARAM_INT); // Specify the parameter type as integer
    // $stmt_update_quantity->BindValue(':product_id', $row_price['product_id']);
    
    $stmt_update_quantity->execute();
    //$total = $price_table*$row_cart['quantity'];
    
}
?>