<?php
// Checks whether the delete button for category has been pressed 
if (isset($_GET['delete_category'])) {
    // Creates a query to delete a specific post
    $sql= '
        DELETE FROM categories 
        WHERE category_id = :category_id
    ';
    // Prepares a query 
    $stmt = $dbh->prepare($sql);
    // Connects form fields with datebase
    $stmt->bindValue(':category_id',$_GET['delete_category']);
    // Send query to database
    if ($stmt->execute()) {
        header('Location: manage.category.php');
        exit();
    }
}
?>