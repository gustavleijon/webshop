<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Initiate session managment
session_start();
// Connection to database
require_once 'assets/config/dp.php';
// Update posts in database
require_once 'assets/functions/user.update.php';
// Includes header
require_once 'assets/includes/inc.header.php';
?>
<?php
// Checks whether user ID is available as SESSION
if (isset($_SESSION['uid'])) {
// Gets specific post from database
$sql = 'SELECT * FROM users WHERE uid = :uid';
// Prepares a query
$stmt = $dbh->prepare($sql);
// Connects GET-variable with db containers
$stmt->bindValue(':uid', $_SESSION['uid']);
// Sends query to database
$stmt->execute();
// Adds all information about user to variable
$row = $stmt->fetch();
}
?>
<!-- Edit users name, email and password -->
<body>
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
            <div class="col-9 mt-5">
                <h4 class="mb-4 pt-4">Uppdatera konto</h4>
                <div class="row">
                    <div class="col-4">
                        <form action="edit.user.php" method="post">
                            <div class="mb-3">
                                <label for="firstname" class="form-label sr-only">Förnamn</label>
                                <input type="text" class="form-control inputfield" id="firstname" name="firstname" value="<?php echo $row['firstname'];?>">
                            </div>
                            <div class="mb-3">
                                <label for="lastname" class="form-label sr-only">Efternamn</label>
                                <input type="text" class="form-control inputfield" id="lastname" name="lastname" value="<?php echo $row['lastname'];?>">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label sr-only">E-post</label>
                                <input type="email" class="form-control inputfield" id="email" name="email" value="<?php echo $row['email'];?>">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label sr-only">Lösenord</label>
                                <input type="password" class="form-control inputfield" id="password" name="password" value="<?php echo $row['password'];?>">
                            </div>
                            <input type="submit" class="btn btn-dark loginbtn" value="Uppdatera" name="modify">
                            <input type="hidden" name="uid" value="<?php echo $row['uid'];?>">
                        </form>
                    </div>
                </div>
            </div>
        </divr>
    </div>
