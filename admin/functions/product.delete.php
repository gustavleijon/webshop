<?php
// Checks whether the cancel button has been pressed 
if (isset($_POST['cancel_product'])) {
    // Send the user to index.php
    header('Location: ./manage.product.php');
}
// Checks whether the delete button has been pressed 
if (isset($_POST['delete_product'])) {
    // Creates a query to delete a specific post
    $sql= '
        DELETE FROM products 
        WHERE product_id = :product_id
    ';
    // Prepares a query 
    $stmt = $dbh->prepare($sql);
    // Conects form fields with db conteiners
    $stmt->bindValue(':product_id',$_POST['product_id']);
    // Send query to databas
    if ($stmt->execute()) {
        header(' ./manage.product.php');
        exit();
    }
}
?>