<?php
    // Checks whether user has pressed post button
    if (isset($_POST['upload'])) {
        // Get user id
        $uid = $_SESSION['uid'];
        $specialproduct = strtolower($_POST['specialproduct']);
        $comment = strtolower($_POST['comment']);

        // Checks if user uploads a picture 
        if (is_uploaded_file($_FILES['photo']['tmp_name'])) {

            // Sets max filesize (1 MB = 1048576 bytes)
            $max_file_size = 1048576;
            // Sets accepted image files
            $file_types = array('gif', 'jpg', 'jpeg', 'png'); 
            // Sets folder for upload
            $upload_dir = 'user.photos/';
            // Creates array for storing error messages
            $errors = array();
            // Sets information of uploaded file
            $file_tmp = $_FILES['photo']['tmp_name'];
            // File name
            $file_name = $_FILES['photo']['name'];
            // Gets the size of the image 
            $file_size = $_FILES['photo']['size'];
            // Gives the file an unique id         
            $file_uniq = uniqid();
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            // Sets path to save uploaded file
            $file_save = $upload_dir . $file_uniq . '-original.' . $file_ext;
            // Checks if file is a photo
            if (!getimagesize($file_tmp)) {
            header('Location: ../../special.products.php?upload=empty');
            exit();
            }
            // Checks photo filesize
            if ($file_size > $max_file_size) {
            header('Location: ../../special.products.php?upload=overload');
            exit();
            }
            // Checks if uploaded file is an accepted type
            if (!in_array($file_ext, $file_types)) {
            header('Location: ../../special.products.php?upload=type');
            exit();
            }
            // Checks if errors has been set
            if (count($errors) == 0) {
                // Saves uploaded file to folder
                if (move_uploaded_file($file_tmp, $file_save)) {  
                    // Creates session for orginal name
                    $_SESSION['photo'] = $file_uniq . '-original.' . $file_ext;

                    // Creates query to database
                    $sql = 'INSERT INTO photos (uid, specialproduct, comment, photo, senddate) VALUES (:uid, :specialproduct, :comment, :photo,
                    NOW())';
        
                    // Prepares the query
                    $stmt = $dbh->prepare($sql);
        
                    // Connects empty placeholders with form fields 
                    $stmt->bindValue(':uid', $uid);
                    $stmt->bindValue(':specialproduct', $specialproduct);
                    $stmt->bindValue(':comment', $comment);
                    $stmt->bindValue(':photo', $_SESSION['photo']);
                    // Sends query to database
                    if ($stmt->execute()) {
        
                        unset($_SESSION['photo']);
        
                        // 
                        header('Location: ../../orderhistory.php');
                        exit();
                    }
                   
                } else {
                $errors[] = 'Something went wrong';  
                }
            }
        }
        else {
             // Creates query to database
             $sql = 'INSERT INTO photos (uid, specialproduct, comment, regdate, senddate) VALUES (:uid, :specialproduct, :comment,
             NOW())';

            // Prepares the query
            $stmt = $dbh->prepare($sql);
        
            // Connects empty placeholders with form fields 
            $stmt->bindValue(':uid', $uid);
            $stmt->bindValue(':specialproduct', $specialproduct);
            $stmt->bindValue(':comment', $comment);

            // Sends query to database
            if ($stmt->execute()) {

                // Adds all information about board to variable and redirects user to the board
                header('Location: ../../orderhistory.php');
                exit();
            }      
        }
    }
?>