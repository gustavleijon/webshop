<?php
// Checks whether the delete button has been pressed 
if (isset($_GET['cart_delete_product'])) {
    $product_id = $_GET['cart_delete_product'];
    $get_ip = getIPAddress();

    // Creates a query to delete a specific post
    $sql= '
        DELETE FROM cart_details 
        WHERE product_id = :product_id AND ip_address = :ip_address
    ';
    // Prepares a query 
    $stmt = $dbh->prepare($sql);
    // Conects form fields with db conteiners
    $stmt->bindValue(':product_id',$product_id);
    $stmt->bindValue(':ip_address',$get_ip);
    // Send query to databas
    if ($stmt->execute()) {
        echo ' 
        <div class="alert alert-info">
            Varan är borttagen! Uppdatera sidan för att få bort varan ur varukorgen.
        </div>
            '; 
        header('Location: index.php');
        exit();
    }
}
?>