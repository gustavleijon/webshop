<!--Links for Javascript-->
<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<!-- JCrop JS -->
<script src="assets/js/jcrop.min.js"></script> 
<script src="assets/js/resize.js"></script> 
<!-- Default footer -->
<footer class="pt-5 default-footer">
    <div class="footerholder mx-auto text-center mt-2 mb-5">
        <div class="container text-center footer-list">
            <ul class="pt-5">
                <li>
                    <h4>YOURSTON DESIGN</h4>
                </li>
                <li>
                    <a href="#"> yourston@design.se</a>
                </li>
                <li class="mt-2">
                    <a href="#">+46707949807</a>
                </li>
                <li class="mt-2">
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-facebook"></i>
                </li>
            </ul>
        </div>
        <!-- Detta är koden för inloggningen till admin sidan, den ska vara någonstans i footer -->
    <?php
    if (!isset($_SESSION['adminid']) || empty($_SESSION['adminid'])) {
        echo '
        <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2">
            <i class="fa-solid fa-circle-user"></i> Admin
        </a>
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-content modal-dialog login">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Mina sidor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="index.php" method="post" class="px-4 py-3">
                        <div class="mb-3">
                            <input type="email" class="form-control inputfield" id="email" name="email" placeholder="E-post">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control inputfield" id="password" name="password" placeholder="Lösenord">
                        </div>
                        <button type="submit" class="btn btn-dark loginbtn" name="adminlogin">Logga in</button>
                    </form>
                </div>
                </div>
            </div>
        </div>
        ';
        } else {
        echo '
        <div>
            <a class="nav-link" href="admin/admin.php">
                <i class="fa-solid fa-circle-user"></i> Admin konto
            </a>
        </div>
        ';
    }
    ?>
    </div>
</footer>
<!-- The footer on smaller devices, on link to admin page -->
<footer class="small-footer ms-3">
    <div class="mx-auto text-center mt-2">
        <div class="container text-center footer-list">
            <ul class="pt-5">
                <li>
                    <h4>YOURSTON DESIGN</h4>
                </li>
                <li>
                    <a href="#"> yourston@design.se</a>
                </li>
                <li class="mt-2">
                    <a href="#">+46707949807</a>
                </li>
                <li class="mt-2">
                    <i class="fa-brands fa-instagram"></i>
                    <i class="fa-brands fa-facebook"></i>
                </li>
            </ul>
        </div>
    </div>
</footer>
</body>
</html>