<?php 
    // Function to get cart item number
    function cart_item(){ 
    if(isset($_GET['add_to_cart'])){
        $get_ip = getIPAddress();
        global $dbh;
            $sql = "SELECT * FROM cart_details WHERE ip_address = :ip_address";
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':ip_address', $get_ip);
            $stmt->execute();
            $rowCount = $stmt->rowCount();
            } else {
                $get_ip = getIPAddress();
                global $dbh;
                $sql = "SELECT * FROM cart_details WHERE ip_address = :ip_address";
                $stmt = $dbh->prepare($sql);
                $stmt->bindValue(':ip_address', $get_ip);
                $stmt->execute();
                $rowCount = $stmt->rowCount();
                }
                echo "$rowCount";
            }  
        // Function to get total price 
        function total_cart_price(){
            $get_ip = getIPAddress();
            global $dbh;
            $total = 0;
            $sql = 'SELECT * FROM cart_details WHERE ip_address = :ip_address';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':ip_address', $get_ip);
            $stmt->execute();
            while($row_cart = $stmt->fetch(PDO::FETCH_ASSOC)){
                $product_id = $row_cart['product_id'];
                $sql_product = 'SELECT * FROM products WHERE product_id = :product_id';
                $stmt_product = $dbh->prepare($sql_product);
                $stmt_product->bindValue(':product_id', $product_id);
                $stmt_product->execute();
                while($row_price = $stmt_product->fetch(PDO::FETCH_ASSOC)){
                    $product_price = array($row_price['product_price']);
                    $product_values = array_sum($product_price);
                    $total += $product_values; 
                } 
            }
        echo "$total";
    } 
?>