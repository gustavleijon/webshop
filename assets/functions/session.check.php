<?php
// Checks whether session id exists
if (!isset($_SESSION['uid']) || empty($_SESSION['uid'])) {
// Redirect user to front / login page
header('Location: ../../index.php');
exit();
}
?>