<?php
if(isset($_POST['insert_theme'])){
    $theme_title = strtolower($_POST['theme_title']);
    //Creates query to database
    $sql = '
        INSERT INTO theme (theme_title)
        VALUES (:theme_title)
        ';
    //Prepares the query
    $stmt = $dbh->prepare($sql);
    //Connects empty placeholders with form fields
    $stmt->bindValue(':theme_title',$theme_title);
    // Execute the query
    if ($stmt->execute()){
        // Redirect to index.php after successful insertion
        header('Location: manage.theme.php');
        exit();
    }
}
?> 