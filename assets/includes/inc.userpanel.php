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
    <h4 class="ms-5 mb-4 pt-4">Välkommen <?php echo ucfirst($row['firstname']) ?>!</h4>
    <div class="mt-2 ms-5 me-5">
        <div class="ml-auto">
            <div class="line-container pb-3">
                <div class="solid-line"></div>
            </div>
                <div class="mb-3">
                    <a href="orderhistory.php">Orderhistorik</a>
                </div>
                <div class="mb-3">
                    <a href="#settingCollapse" class="list-group-item">Inställningar</a>
                    <div id="settingCollapse" class="collapse-container produkter-list">
                        <a href="edit.user.php" class="list-group-item">Uppdatera konto</a>
                        <a href="remove.user.php" class="list-group-item">Radera konto</a>
                    </div>
                </div>
                <div class="mb-3">
                    <a href="logout.php">Logga ut</a>
                </div>
            </form>
        </div>
    </div>