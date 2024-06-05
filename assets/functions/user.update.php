<?php
// Checks whether the update button has been pressed 
if (isset($_POST['modify'])){
    // Creates a query
    $sql= "
        UPDATE users SET 
        firstname = :firstname,
        lastname = :lastname,
        email = :email
        WHERE uid = :uid    
    ";
    // Prepares a query
    $stmt = $dbh->prepare($sql);
    // Conects form fields with db conteiners
    $stmt->bindValue(':firstname', $_POST['firstname']);
    $stmt->bindValue(':lastname', $_POST['lastname']);
    $stmt->bindValue(':email', $_POST['email']);
    $stmt->bindValue(':uid', $_POST['uid']);
    // Send query to databas
    if ($stmt->execute()) {
        header('Location: ../../index.php?update=true');
        exit();
    }
}
?>