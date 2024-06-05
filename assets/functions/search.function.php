<?php
    if(isset($_GET['search_data_product'])) { 
        //Gets all information from database where search data is equal with keyword
        $sql = 'SELECT * FROM products WHERE product_keywords LIKE .'%$_GET['search_data']%'.';
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
                    <div class="col-md-4 mb-2">
                        <div class="card">
                        <img src="./admin_area/product_images/'.$row['product_image1'].'" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">'.ucfirst($row['product_title']).'</h5>
                            <p class="card-text">'.ucfirst($row['product_description']).'</p>
                            <p class="card-text">Price: '.ucfirst($row['product_price']).':-</p>
                            <a href="index.php?add_to_cart='.$row['product_id'].'" class="btn btn-danger">Add to cart</a>
                            <a href="product_details.php?product_id='.$row['product_id'].'" class="btn btn-secondary">View more</a>
                        </div>
                        </div>
                    </div>  
                ';
            }
        }
    }
?>