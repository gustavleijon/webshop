<?php
// Checks whether user has pressed send button
if (isset($_POST['admin-comment'])) {
// Get information from form fields
$admincomment = strtolower($_POST['admincomment']);
// Get user id
$uid = $_POST['uid'];
// Creates query to database
$sql = 'INSERT INTO admin_comments (uid, admin_comment)
VALUES (:uid, :comment)
';
// Prepares the query
$stmt = $dbh->prepare($sql);
// Connects empty placeholders with form fields
$stmt->bindValue(':uid', $uid);
$stmt->bindValue(':comment', $admincomment);
// Checks whether query executes successfully
if ($stmt->execute()) {
header('https://port-3000-php-grupp4-gustavleijon1820182.preview.codeanywhere.com/admin/admin.php');
exit();
}
}
?>
