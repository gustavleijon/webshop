<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Initiate session managment
session_start();
// Checks whether user is logged in
require_once 'assets/functions/session.check.php';
// Connection to database
require_once 'assets/config/dp.php';
// Connection to special header, did not work with ordenary header
require_once 'assets/includes/inc.special.header.php';
// Sends out the error messages
require_once 'assets/includes/notification.index.php';
// Process insert special products
require_once 'assets/functions/special.order.insert.php';
?>
<!-- Page for special orders -->
<div class="text-center mt-2">
    <img src="photos/index-image.png" alt="Bild på produkter" class="productimage">
</div>
<div class="mx-auto headerbg text-center mt-3">
  <div class="row">
    <h1 class="mt-5">BÖRJA DESIGNA</h1>
    <p class="mt-2">Följ stegen och skapa din egna design!</p>
  </div>                  
</div>
<div class="pt-5 ms-5">
    <h4>Steg 1: Välj produkt</h4>
    <div class="row">
        <div class="col me-5">
            <div class="productholder">
                <img src="photos/specialcart.png" alt="Kort">
                <h5 class="mt-2">Kort</h5>
            </div>
        </div>
        <div class="col ms-5 me-5">
            <div class="productholder">
                <img src="photos/lergubbe2.jpg" alt="Lergubbe" class="imgsize">
                <h5 class="mt-2">Lergubbe</h5>
            </div>
        </div>
        <div class="col ms-5">
            <div class="productholder">
                <img src="photos/specialstuffed.png" alt="Gosedjur">
                <h5 class="mt-2">Gosedjur</h5>
            </div>
        </div>
    </div>
    <div class="pt-3 col-4">
        <!-- Form that gets picked up by special.products.insert.php. Includes special product, comment choices and image -->
        <form action="special.products.php" method="post" enctype="multipart/form-data">
            <select class="form-select loginbtn" aria-label="Default select example" name="specialproduct">
                <option selected>Välj produkt</option>
                <option value="Kort">Kort</option>
                <option value="Lergubbe">Lergubbe</option>
                <option value="Gosedjur">Gosedjur</option>
            </select>
            <div class="pt-5">
            <h4>Steg 2: Skriv en kort text för att beskriva vad du vill ha</h4>
                <label for="comment">Kommentar:</label>
                <textarea id="comment" name="comment" rows="2" cols="50"></textarea>
            </div>
    </div>
</div>
<div class="pt-5 ps-5 col-4">
<h4>Steg 3: Skicka med en bild på motiv</h4>
        <div>
            <label for="customFile" class="form-label">Välj bild (jpg, png, gif)</label>
            <input class="form-control loginbtn" type="file" id="customFile" name="photo">
        </div>
        <button type="submit" class="btn btn-dark loginbtn mt-3" name="upload">Ladda upp</button>
    </form>
</div>
<?php
// Includes footer
require_once 'assets/includes/inc.footer.php';
?>