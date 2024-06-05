<?php //Checks wether insert button has been pressed
    if(isset($_POST['update_product'])){
        $product_title = strtolower($_POST['product_title']);
        $product_description = strtolower($_POST['product_description']);
        $product_keywords = strtolower($_POST['product_keywords']);
        $product_category = $_POST['product_category'];
        $product_theme = $_POST['product_theme'];
        $product_price = $_POST['product_price'];
        $product_status = $_POST['product_status'];
        $product_id = $_POST['product_id'];
    /*     //accessing the images
        $product_image = $_FILES['product_image']['name'];
        //accessing image tmp name
        $tmp_image = $_FILES['product_image']['tmp_name'];
        //Checking empty conditions */
        /*if ($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or $product_theme=='' or $product_price=='' or $product_image==''){
            echo '
            <div class="alert alert-warning">
                Du har inte fyllt i alla fält!
            </div>                  
            ';
            exit();
        }else{
            move_uploaded_file($tmp_image,"./product_images/$product_image"); */
            //Creates query to database
            $sql = '
            UPDATE products SET 
            product_title = :product_title,
            product_description = :product_description,
            product_keywords = :product_keywords,
            category_id = :category_id,
            theme_id = :theme_id,
            
            product_price = :product_price,
            product_status = :product_status
            WHERE product_id = :product_id 
            ';
            //Prepares the query
            $stmt = $dbh->prepare($sql);
            //Connects empty placeholders with form fields
            $stmt->bindValue(':product_title',$product_title);
            $stmt->bindValue(':product_description',$product_description);
            $stmt->bindValue(':product_keywords',$product_keywords);
            $stmt->bindValue(':category_id',$product_category);
            $stmt->bindValue(':theme_id',$product_theme);
          
            $stmt->bindValue(':product_price',$product_price);
            $stmt->bindValue(':product_status',$product_status);
            $stmt->bindValue(':product_id', $product_id);
            // Send query to databas
            if ($stmt->execute()) {
                header('Location: ./manage.product.php?update=true');
                exit();
           /*  // Execute the query
            if ($stmt->execute()){
                // Successful insertion
                echo '
                    <div class="alert alert-warning">
                        Produktinformationen är uppdaterad!
                    </div>';
            } */
        }
    }
//
?>