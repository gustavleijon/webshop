<?php
// Checks whether the delete button has been pressed 
if (isset($_GET['delete_theme'])) {
    // Creates a query to delete a specific post
    $sql= '
        DELETE FROM theme 
        WHERE theme_id = :theme_id
    ';
    // Prepares a query 
    $stmt = $dbh->prepare($sql);
    // Conects form fields with db containers
    $stmt->bindValue(':theme_id',$_GET['delete_theme']);
    // Send query to databas
    if ($stmt->execute()) {
        header('Location: manage.theme.php');
        exit();
    }
}
?>