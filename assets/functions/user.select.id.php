<?php
// Checks whether user ID is available as GET
if (isset($_GET['uid'])) {
// Gets specific post from database
$sql = 'SELECT * FROM users WHERE uid = :uid';
// Prepares a query
$stmt = $dbh->prepare($sql);
// Connects GET-variable with db containers
$stmt->bindValue(':uid', $_GET['uid']);
// Sends query to database
$stmt->execute();
// Adds all information about user to variable
$row = $stmt->fetch();
}
?>