<?php
// Connection to database
require_once 'assets/config/dp.php';
// Get posts from database
require_once 'assets/functions/user.insert.php';
// Get information from a specific user
require_once 'assets/functions/user.select.id.php';
// Includes header
require_once 'assets/includes/inc.header.php';
?>
<!-- Create an account -->
<body>
    <header>
        <div class="line-container pt-5">
            <div class="solid-line"></div>
        </div>
        <main class="ps-5">
            <h4 class="mb-4 pt-4">Skapa konto</h4>
            <div class="row">
                <div class="col-3">
                    <form action="add.user.php" method="post">
                        <div class="mb-3">
                            <label for="firstname" class="form-label sr-only">Förnamn</label>
                            <input type="text" class="form-control inputfield" id="firstname" name="firstname" placeholder="Förnamn">
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label sr-only">Efternamn</label>
                            <input type="text" class="form-control inputfield" id="lastname" name="lastname" placeholder="Efternamn">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label sr-only">E-post</label>
                            <input type="email" class="form-control inputfield" id="email" name="email" placeholder="E-post">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label sr-only">Lösenord</label>
                            <input type="password" class="form-control inputfield" id="password" name="password" placeholder="Lösenord">
                        </div>
                        <button type="submit" class="btn btn-dark loginbtn" name="register">Registrera</button>
                        <p class="text-center mt-2">Har du redan ett konto?
                        <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            logga in här
                        </a>
                        </p>
                    </form>
                </div>
            </div>
        </main>
    </header>
</body>
</html>
