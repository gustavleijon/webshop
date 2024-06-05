<?php
// Checks whether the cancel button has been pressed 
if (isset($_POST['cancel'])) {
    // Send the user to index.php
    header('Location:../../protected.php');
}
// Checks whether the delete button has been pressed 
if (isset($_POST['delete'])) {
    // Creates a query to delete a specific post
    $sql= '
        DELETE FROM users 
        WHERE uid = :uid
    ';
    // Prepares a query 
    $stmt = $dbh->prepare($sql);
    // Conects form fields with db conteiners
    $stmt->bindValue(':uid',$_POST['uid']);
    // Send query to databas
    if ($stmt->execute()) {
        header('Location:../../index.php?delete=true');
        // Logs out user from system
        session_start();
        session_destroy();
        exit();
    }
}
?>