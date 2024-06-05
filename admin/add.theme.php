<?php
// Initiate session managment
session_start();
// Checks whether admin is logged in
require_once 'functions/admin.session.check.php';
// Connection to database
require_once '../assets/config/dp.php';
// Includes header
require_once 'admin.header.php';
// Process uploaded photo
require_once '../assets/functions/user.photo.upload.php';
// Insert theme into database
require_once 'functions/insert.theme.php';
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
            <div class="col-9 admintable my-5">
                <form action="add.theme.php" method="post" class="mb-2">
                    <div class="input-group w-90 mb-2">
                        <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
                        <input type="text" class="form-control" name="theme_title" placeholder="Lägg till säsongskollektion" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group w-10 mb-2 m-auto">
                        <input type="submit" class="btn btn-dark loginbtn p-2 my-2" name="insert_theme" value="Lägg till säsongskollektion">
                    </div>
                </form>
            </div>
        </div>
    </div>