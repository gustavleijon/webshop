<?php
if(isset($_GET['add_to_cart'])){
    $get_ip = getIPAddress();
    $get_product_id = $_GET['add_to_cart'];
    // Check if $get_ip and $get_product_id are set
    if (isset($get_ip) && isset($get_product_id)) {
        $sql = "SELECT * FROM cart_details WHERE ip_address = :ip_address AND product_id = :product_id";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':ip_address', $get_ip);
        $stmt->bindValue(':product_id', $get_product_id);
        $stmt->execute();

        // Use rowCount() as a method
        if ($stmt->rowCount() > 0){
            echo '
                <div class="alert alert-warning">
                    Varan finns redan i varukorgen!
                </div>';
/*          header('Location: products.php'); */
        } else {
            $sql = 'INSERT INTO cart_details (product_id, ip_address, quantity) VALUES (:product_id, :ip_address, 1)';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':product_id', $get_product_id);
            $stmt->bindValue(':ip_address', $get_ip);
            // $stmt->bindValue(':quantity', ($_GET['qty']));

             if ($stmt->execute()){
                echo ' 
                <div class="alert alert-info">
                    Varan är tillagd! Uppdatera sidan för att se varan i varukorgen.
                </div>
                    '; 
            } 
        }
    } 
} 
// Modalkod som inte fungerar, ett försök till att få varukorgen att automatiskt uppdateras
/*  <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-content modal-dialog login">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="exampleModalLabel">Varan har hamnat i varukorgen</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-4 py-3 text-center">
                                <a href="products.php">
                                    <button type="submit" class="btn btn-dark addbtn mb-2">Fortsätt shoppa</button>
                                </a>
                                <a href="cart.php">
                                    <button type="submit" class="btn btn-light addbtn mb-2">Gå till varukorgen</button>
                                </a>
                            </div>
                        </div>
                    </div> */  
?>