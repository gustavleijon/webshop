<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Initiate session managment
session_start();
// Connection to database
require_once 'assets/config/dp.php';
// Deletes from table in database
require_once 'assets/functions/user.delete.php';
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
<!-- delete account -->
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
                <h4 class="mb-4 pt-4">Radera konto</h4>
                <div class="row">
                    <div class="col-4">
                        <form action="remove.user.php" method="post">
                            <div class="row">
                                <p>Är du säker på att du vill radera följande konto?</p>
                                <p><?php echo ucfirst($row['firstname']) . ' ' . ucfirst($row['lastname']); ?></p>
                            </div>
                            <div>
                                <input type="submit" class="btn btn-success loginbtn" value="Avbryt" name="cancel">  
                            </div>
                            <div class="mt-2">
                                <input type="submit" class="btn btn-danger loginbtn" value="Radera" name="delete">  
                            </div>                      
                            <input type="hidden" name="uid" value="<?php echo $row['uid']; ?>">            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>