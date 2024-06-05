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
                <h5>Hantera kategorier</h5>
                <table class="table table-bordered mt-5">
                    <thead>
                        <tr>
                            <th>Kategorinamn</th>
                            <th>Radera</th>
                        </tr>
                    </thead>
                    <?php
                        //Gets all information from database
                        $sql = 'SELECT * FROM categories ORDER BY category_title';
                        //Prepare a query
                        $stmt = $dbh->prepare($sql);
                        //Sends query to database
                        $stmt->execute();
                        //Checks wether database is empty
                        if ($stmt->rowCount()>0) {
                            //Get categories from database
                            while ($row = $stmt->fetch()) {
                                //prints out categories to HTML
                                echo ' 
                                    <tbody>
                                        <tr>
                                  
                                            <td>'.ucfirst($row['category_title']).'</td>
                                            <td>    
                                                <a href="admin.php?delete_category='.($row['category_id']).'">
                                                    <i class="fa-regular fa-circle-xmark"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                ';
                            }
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>