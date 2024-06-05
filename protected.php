<!-- Special header to solve some problem with the code, footer does not work on this page -->
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Initiate session managment
session_start();
// Connection to database
require_once 'assets/config/dp.php';
// Checks whether user is logged in
require_once 'assets/functions/session.check.php';
// Includes header
require_once 'assets/includes/inc.header.php';
?>
<!-- Index for admin -->
    <div class="line-container pt-5">
        <div class="solid-line"></div>
    </div>
    <div class="container m-0 p-0">
        <div class="row">
            <div class="col-3 adminpanel">
                <?php 
                // Includes adminpandel 
                require_once 'assets/includes/inc.userpanel.php';
                ?>
            </div>
            <div class="col-9 admintable mt-5">
        </div>
    </div>
    