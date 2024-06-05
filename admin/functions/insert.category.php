<?php
if(isset($_POST['insert_cat'])){
    $cat_title = strtolower($_POST['cat_title']);
    //obs har inte gjort en avgränsning för om kategorin redan finns. PT 10
    //Creates query to database
    $sql = '
        INSERT INTO categories (category_title)
        VALUES (:cat_title)
        ';
    //Prepares the query
    $stmt = $dbh->prepare($sql);
    //Connects empty placeholders with form fields
    $stmt->bindValue(':cat_title',$cat_title);
    // Execute the query
    if ($stmt->execute()){
        // Redirect to index.php after successful insertion
        header('Location: manage.category.php');
        exit();
    }
}
?>