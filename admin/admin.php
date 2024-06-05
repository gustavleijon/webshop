<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Initiate session managment
session_start();
// Checks whether admin is logged in
require_once 'functions/admin.session.check.php';
// Connection to database
require_once '../assets/config/dp.php';
// Includes header
require_once 'admin.header.php';
// Delete category from database
require_once 'functions/category.delete.php';
// Delete theme from database
require_once 'functions/theme.delete.php';
// Delete product from database
require_once 'functions/product.delete.php';
?>
    <div class="line-container pt-5">
        <div class="solid-line"></div>
    </div>
    <div class="container m-0 p-0">
        <div class="row">
            <div class="col-3 adminpanel">
                <?php 
                // Includes adminpandel 
                require_once 'inc.adminpanel.php';
                ?>
            </div>
            <div class="col-9 admintable mt-5">
            </div>
        </div>
    </div>