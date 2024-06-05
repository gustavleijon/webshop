<?php
// Checks whether user has pressed registration button
if (isset($_POST['register'])) {
// Get information from form fields
$firstname = strtolower($_POST['firstname']);
$lastname = strtolower($_POST['lastname']);
$email = strtolower($_POST['email']);
$password = $_POST['password'];
// Creates query to database
$sql = '
INSERT INTO users (firstname, lastname, email, password, regdate)
VALUES (:firstname, :lastname, :email, :password, NOW())
';
// Prepares the query
$stmt = $dbh->prepare($sql);
// Connects empty placeholders with form fields
$stmt->bindValue(':firstname', $firstname);
$stmt->bindValue(':lastname', $lastname);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':password', $password);
// Checks whether query executes successfully
if ($stmt->execute()) {
header('Location: ../../index.php');
exit();
}
}
?>