<?php //Checks wether insert button has been pressed
    if(isset($_POST['insert_product'])){
        $product_title = strtolower($_POST['product_title']);
        $product_description = strtolower($_POST['product_description']);
        $product_keywords = strtolower($_POST['product_keywords']);
        $product_category = $_POST['product_category'];
        $product_theme = $_POST['product_theme'];
        $product_price = $_POST['product_price'];
        $product_status = $_POST['product_status'];
        //accessing the images
        $product_image = $_FILES['product_image']['name'];
        //accessing image tmp name
        $tmp_image = $_FILES['product_image']['tmp_name'];
        //Checking empty conditions
        if ($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or $product_theme=='' or $product_price=='' or $product_image==''){
            echo '
            <div class="alert alert-warning">
                Du har inte fyllt i alla fält!
            </div>                  
            ';
            exit();
        }else{
            move_uploaded_file($tmp_image,"./product_images/$product_image");
            //Creates query to database
            $sql = '
            INSERT INTO products (product_title, product_description, product_keywords, category_id, theme_id, product_image, product_price, date, product_status)
            VALUES (:product_title, :product_description, :product_keywords, :category_id, :theme_id, :product_image, :product_price, NOW(), :product_status)
            ';
            //Prepares the query
            $stmt = $dbh->prepare($sql);
            //Connects empty placeholders with form fields
            $stmt->bindValue(':product_title',$product_title);
            $stmt->bindValue(':product_description',$product_description);
            $stmt->bindValue(':product_keywords',$product_keywords);
            $stmt->bindValue(':category_id',$product_category);
            $stmt->bindValue(':theme_id',$product_theme);
            $stmt->bindValue(':product_image',$product_image);
            $stmt->bindValue(':product_price',$product_price);
            $stmt->bindValue(':product_status',$product_status);
            // Execute the query
            if ($stmt->execute()){
                // Redirect to index.php after successful insertion
                header('Location: manage.product.php');
                exit();
            }
        }
    }
?>