<!-- Offcanvas side cart -->
<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="cartheader">
        <h4 class="offcanvas-title text-center py-5" id="offcanvasRightLabel">Varukorg</h4>
    </div>
    <div class="container">
        <div class="row">
            <form action="" method="post">
                <div class="offcanvas-body overflow-auto" style="max-height: 500px;">
                    <table class="table table-bordered text-center">
                    <!--PHP code dynamic data-->
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
                        <div class="container text-center mt-5">
                            <div class="row">
                                <div class="col">
                                    <img class="cart_image" src="./admin/product_images/' . $product_image . '">
                                </div>
                                <div class="col">
                                    <p>' . ucwords($product_title) . '</p>
                                    <p>' . $price_table . ' Kr</p>
                                    <input type="text" name="qty" id="" value="1" class="form-input w-25">
                                </div>
                                <div class="col">
                                    <a href="../../index.php?cart_delete_product=' . $product_id. '">
                                        <i class="fa-solid fa-x"></i>
                                    </a>
                                </div>
                            </div>
                        </div>               
                        ';
                        }
                        }
                        ?>
                    </table>
                    <!-- Footer for the offcanvas -->
                    <div class="offcanvasfooter">
                        <div class="mt-5">
                            <h5>Totalt</h5>
                            <p><?php echo $total?> Kr</p>
                        </div>
                        <div class="line-container pb-3">
                            <div class="solid-line"></div>
                        </div>
                            <a href="../../cart.php" class="btn btn-dark productbtn rounded-0 mb-3 text-light">Gå till kassa</a>
                        </div>
                    </div>
                </div>        
            </form>
        </div>
    </div>  
</div>

                            
                                <!-- <?php
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
                                ?> -->
                                
                                <!-- <td></td>
                                <td><input type="checkbox"></td>
                                <td>    
                                    <input type="submit" value="Update" class="btn btn-danger py-2 px-3 mx-3" name="update_cart">
                                    <button class="btn btn-danger py-2 px-3 mx-3">Remove</button>
                                </td> -->