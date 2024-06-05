<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Initiate session managment
session_start();
// Get information from a specific user
require_once 'assets/functions/user.select.id.php';
// Connection to database
require_once 'assets/config/dp.php';
// Includes header
require_once 'assets/includes/inc.header.php';
// Insert items into cart table
require_once 'assets/functions/cart.insert.php';
// Insert items into cart table on small screen
require_once 'assets/functions/small.cart.insert.php';
?>
<div class="default-details">
    <div class="line-container pt-5">
        <div class="solid-line"></div>
    </div>
    <div class="ms-5 mt-4">
        <a href="products.php"><i class="fa-solid fa-chevron-left"></i> Alla produkter</a>
    </div>
    <div class="container product_details mt-5">
        <div class="card product_card mb-5">
            <div class="row">
            <?php
                // Getting unique product details
                if(isset($_GET['product_id'])){ 
                    //Gets all information about chosen product from databas
                    $sql = 'SELECT * FROM products WHERE product_id = :product_id';
                    //Prepare a query
                    $stmt = $dbh->prepare($sql);
                    // Binds Value
                    $stmt->bindValue(':product_id', $_GET['product_id']);
                    //Sends query to database
                    $stmt->execute();

                    //Checks wether database is empty
                    if ($stmt->rowCount()>0) {
                        //Get products from database
                        while ($row = $stmt->fetch()) {
                            //prints out the product to HTML
                            echo ' 
                                <div class="col-md-6">
                                    <img src="./admin/product_images/'.$row['product_image'].'" class="img-fluid" alt="...">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body p-0 m-0">
                                        <h5 class="mt-5 card-title fw-bolder">'.ucwords($row['product_title']).'</h5>
                                        <p class"">'.($row['product_price']).' kr</p>
                                        <p>'.ucfirst($row['product_description']).'</p>
                                            <div class="input-group mb-3 add-button">
                                                <span class="input-group-text"><i class="fa-solid fa-minus"></i></span>
                                                    <input type="text" class="form-control" value="1">
                                                <span class="input-group-text"><i class="fa-solid fa-plus"></i></span>
                                            </div>
                                        <a href="products.php?add_to_cart='.$row['product_id'].'" class="btn btn-dark productbtn rounded-0 mx-auto mt-2 mb-5 text-light">Lägg till i varukorgen</a>  
                                    </div>
                                </div>
                                ';
                            }
                        }
                    }
                ?>
            </div>    
        </div>     
        <div class="row mt-5">
            <div class="col-4 mt-5">
                    <h5 class="text-uppercase">Tillverkning</h5>
                    <p>Från materialval till detaljerad handarbete och kvalitetskontroll strävar vi efter att skapa varje produkt med precision och omsorg. Vår tillverkningsprocess kombinerar skicklighet och noggrannhet för att leverera högkvalitativa, handgjorda produkter som berikar ditt liv med skönhet och funktionalitet.</p>
            </div>
            <div class="col-4 mt-5 info_line">
                    <h5 class="text-uppercase">Returer & Betalning</h5>
                    <p>Vi strävar efter att göra din köpupplevelse smidig. Vid eventuella returer hanterar vi dem effektivt och med fokus på din tillfredsställelse. Betalningar behandlas säkert och enkelt, vilket ger dig trygghet och bekvämlighet under hela processen. Hos oss är kundnöjdhet vår högsta prioritet.</p>
            </div>
            <div class="col-4 mt-5">
                    <h5 class="text-uppercase">Leveransinfo</h5>
                    <p>Vi värdesätter din tid och strävar efter att göra leveransprocessen så smidig som möjligt. Vår effektiva hantering och spårning av leveranser garanterar att ditt paket når dig på ett säkert och snabbt sätt. Vi prioriterar trygghet och pålitlighet för att ge dig en problemfri leveransupplevelse varje gång du handlar hos oss.</p>
            </div>
        </div>         
    </div>
</div>
<div class="small-details">
    <div class="line-container pt-5">
        <div class="solid-line"></div>
    </div>
    <div class="m-3">
        <a href="products.php"><i class="fa-solid fa-chevron-left"></i> Alla produkter</a>
    </div>
    <div class="container mt-5">
        <div class="card product_card mb-5">
            <div class="row">
            <?php
                // Getting unique product details
                if(isset($_GET['product_id'])){ 
                    //Gets all information about chosen product from database
                    $sql = 'SELECT * FROM products WHERE product_id = :product_id';
                    //Prepare a query
                    $stmt = $dbh->prepare($sql);
                    // Binds Value
                    $stmt->bindValue(':product_id', $_GET['product_id']);
                    //Sends query to database
                    $stmt->execute();

                    //Checks wether database is empty
                    if ($stmt->rowCount()>0) {
                        //Get product from database
                        while ($row = $stmt->fetch()) {
                            //prints out product to HTML
                            echo ' 
                                <div>
                                    <img src="./admin/product_images/'.$row['product_image'].'" class="img-fluid" alt="...">
                                </div>
                                <div>
                                    <div class="card-body p-0 m-0">
                                        <h5 class="mt-5 card-title fw-bolder">'.ucwords($row['product_title']).'</h5>
                                        <p class"">'.($row['product_price']).' kr</p>
                                        <p>'.ucfirst($row['product_description']).'</p>
                                        <a href="../../cart.php?add_to_cart_small='.$row['product_id'].'" class="btn btn-dark productbtn rounded-0 mb-3 text-light">Lägg till i varukorg och gå till kassan</a>
                                    </div>
                                </div>
                                ';
                            }
                        }
                    }
                ?>
            </div>    
        </div>     
        <div class="mt-5">
            <div class="mt-5">
                    <h5 class="text-uppercase">Tillverkning</h5>
                    <p>Från materialval till detaljerad handarbete och kvalitetskontroll strävar vi efter att skapa varje produkt med precision och omsorg. Vår tillverkningsprocess kombinerar skicklighet och noggrannhet för att leverera högkvalitativa, handgjorda produkter som berikar ditt liv med skönhet och funktionalitet.</p>
            </div>
            <div class="mt-5">
                    <h5 class="text-uppercase">Returer & Betalning</h5>
                    <p>Vi strävar efter att göra din köpupplevelse smidig. Vid eventuella returer hanterar vi dem effektivt och med fokus på din tillfredsställelse. Betalningar behandlas säkert och enkelt, vilket ger dig trygghet och bekvämlighet under hela processen. Hos oss är kundnöjdhet vår högsta prioritet.</p>
            </div>
            <div class="mt-5 mb-4">
                    <h5 class="text-uppercase">Leveransinfo</h5>
                    <p>Vi värdesätter din tid och strävar efter att göra leveransprocessen så smidig som möjligt. Vår effektiva hantering och spårning av leveranser garanterar att ditt paket når dig på ett säkert och snabbt sätt. Vi prioriterar trygghet och pålitlighet för att ge dig en problemfri leveransupplevelse varje gång du handlar hos oss.</p>
            </div>
        </div>            
    </div>
</div>
<?php
// Includes footer
require_once 'assets/includes/inc.footer.php';
?>