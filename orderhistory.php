<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Initiate session managment
session_start();
// Checks whether user is logged in
require_once 'assets/functions/session.check.php';
// Connection to database
require_once 'assets/config/dp.php';
// Include header
require_once 'assets/includes/inc.header.php';
?>
<?php
// Gets information from photos and user
$sql = 'SELECT photos.*, users.firstname, users.lastname
FROM photos
INNER JOIN users ON photos.uid = users.uid
WHERE photos.uid = :uid';
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':uid', $_SESSION['uid']);
$stmt->execute();
// Fetch all rows at once
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
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
        <h5>Din order</h5>
            <section>
                <div class="container py-5">
                    <div class="row">
                        <div class="col-4">
                        <?php
                        // Checks if there are users with special orders in the database
                        if (!empty($rows)) {
                            // Prints out all special orders
                            foreach ($rows as $innerRow) {
                                echo '
                                <div class="card border-0 mb-2">
                                    <div class="card-body">
                                        <ul class="list-unstyled">
                                            <li>
                                                <a href="orderhistory.php?uid='.$innerRow['uid'].'" class="d-flex justify-content-between">
                                                    <div class="d-flex flex-row">
                                                        <div class="pt-1">
                                                            <p class="fw-bold mb-0">'.ucfirst($innerRow['firstname']) . ' ' . ucfirst($innerRow['lastname']).'</p>
                                                            <p class="small text-muted">'.$innerRow['specialproduct'].'</p>
                                                        </div>
                                                    </div>
                                                    <div class="pt-1">
                                                        <p class="small text-muted mb-1">'.$innerRow['senddate'].'</p>
                                                        <span class="badge bg-success float-end">1</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                ';
                            }
                        } else {
                            echo '<p>Inga beställningar</p>';
                        }
                        ?>
                        </div>
                        <div class="col-8">
                        <?php
                        // Getting unique product, comment, and user info
                        if (isset($_GET['uid'])) {
                            // Gets all the info from the database
                            $sql = 'SELECT photos.*, users.firstname, users.lastname, admin_comments.admin_comment
                            FROM photos
                            INNER JOIN users ON photos.uid = users.uid
                            INNER JOIN admin_comments ON photos.uid = admin_comments.uid
                            WHERE photos.uid = :uid';
                            // Prepare a query
                            $stmt = $dbh->prepare($sql);
                            // Binds Value
                            $stmt->bindValue(':uid', $_GET['uid']);
                            // Sends query to the database
                            $stmt->execute();

                            // Checks whether the database is not empty
                            if ($stmt->rowCount() > 0) {
                                // Get photos, comments, etc., from the database
                                while ($row = $stmt->fetch()) {
                                    echo '
                                    <div class="col-6 offset-6 row">
                                        <h5 class="card-title">' . ucfirst($row['firstname']) . ' ' . ucfirst($row['lastname']) . '</h5>
                                        <img src="../user.photos/'.$row['photo'].'" alt="Bild">
                                        <div class="comments rounded ms-2 mt-2">
                                            <p class="card-tex mt-2">' . $row['comment'] . '</p>
                                        </div>
                                    </div>
                                    <div class="col-6 row">
                                        <h5 class="card-title">YOURSTON DESIGN</h5>
                                        <div class="comments rounded ms-2 mt-2">
                                            <p class="card-tex mt-2">' . $row['admin_comment'] . '</p>
                                        </div>
                                    </div>
                                    
                                    ';
                                echo '
                                <form action="admin.inbox.php" method="post">
                                    <input type="hidden" name="uid" value="'.$row['uid'].'">
                                    <div class="form-floating mt-5">
                                        <label for="admincomment"></label>
                                        <textarea class="form-control" id="admincomment" name="admincomment"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-dark loginbtn mt-2" name="admin-comment">Skicka</button>
                                </form>
                                    ';
                            
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php
// Includes footer
require_once 'assets/includes/inc.footer.php';
?>