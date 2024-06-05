<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Checks whether login button for admin has been pressed 
if (isset($_POST['adminlogin'])) {
    // Checks whether e-mail or password are empty
    if (empty($_POST['email']) || empty($_POST['password'])) {
       // Send user to error page (index.php with error message)
       header('Location: ../../index.php?login=empty');
       exit();
    } 
    // Trims e-mail and password
    $email = strtolower(trim($_POST['email']));
    $password = trim($_POST['password']);
    // Creates, prepares, binds and executes a query
    $sql = '
    SELECT * FROM admin WHERE email = :email AND password = :password
    ';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':email',$email);
    $stmt->bindValue(':password',$password);
    $stmt->execute();
    // Counts rows returned from database
    $count = $stmt->rowCount();
    // Checks whether admin user exists
    if ($count>0) {
        // Saves results to variable
        $row = $stmt->fetch();
        // Creates session variable with admin id and redirects admin
        $_SESSION['adminid'] = $row['adminid'];
        // Redirects user to success page, choose to hardcode this and only on this specific place
        header('Location: https://port-3000-php-grupp4-gustavleijon1820182.preview.codeanywhere.com/admin/admin.php');
        exit();
    } else {
       // Send admin to error page (index.php with error message)
       header('Location: ../../index.php?login=error');
       exit();
    }
}
?>