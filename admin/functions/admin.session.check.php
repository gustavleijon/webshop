<?php
// Checks whether session id for admin exists
if (!isset($_SESSION['adminid']) || empty($_SESSION['adminid'])) {
// Redirect user to login page
header('Location: ../../index.php');
exit();
}
?>