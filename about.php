<?php
// Initiate session managment
session_start();
// Connection to database
require_once 'assets/config/dp.php';
// Get information from a specific user
require_once 'assets/functions/user.select.id.php';
// Includes header
require_once 'assets/includes/inc.header.php';
?>
<!-- text and img for about the artist page -->
<section class="default-about">
    <div class="mx-auto about-bg text-center mt-2">
        <div class="pt-5">
            <h4 class="mt-5 pb-4">OM KONSTNÄREN</h4>
            <div class="about-text mx-auto">
                <p class="mb-3">Jag är konstnären bakom verken, och mitt uppdrag sträcker sig bortom penselstråk och färger. Min passion är att skapa 
                konst som inte bara är visuellt tilltalande utan även bär en känsla av närhet och personlighet.</p>

                <p class="mb-3">Varje handgjord skatt jag skapar är en manifestation av min kreativitet och känslighet. Genom mitt arbete strävar jag efter att 
                skapa en nära och personlig kontakt med mina kunder. Varje konstverk bär på en unik själ och berättar en speciell historia.</p>

                <p class="mb-3">Jag strävar efter att leverera konst som inte bara dekorerar utan också skapar en känslomässig upplevelse. 
                Genom att dela mitt skapande öppet och ärligt, hoppas jag att min konst kan bli en del av ditt liv och skapa minnesvärda stunder.</p>

                <p class="mb-5">Tack för att du är en del av min konstnärliga resa. Det är min ära att dela dessa skapelser med dig och 
                bygga en gemenskap där varje konstverk blir en personlig upplevelse</p>
            </div>
            <img src="photos/aboutimage.png" alt="PictureOfYourston" class="about-img">
        </div>
    </div>
</section>
<section class="small-about ms-3">
    <div class="mx-auto text-center mt-2">
        <div class="pt-5">
            <h4 class="mt-5 pb-4">OM KONSTNÄREN</h4>
            <div class="about-text mx-auto">
                <p class="mb-3">Jag är konstnären bakom verken, och mitt uppdrag sträcker sig bortom penselstråk och färger. Min passion är att skapa 
                konst som inte bara är visuellt tilltalande utan även bär en känsla av närhet och personlighet.</p>

                <p class="mb-3">Varje handgjord skatt jag skapar är en manifestation av min kreativitet och känslighet. Genom mitt arbete strävar jag efter att 
                skapa en nära och personlig kontakt med mina kunder. Varje konstverk bär på en unik själ och berättar en speciell historia.</p>

                <p class="mb-3">Jag strävar efter att leverera konst som inte bara dekorerar utan också skapar en känslomässig upplevelse. 
                Genom att dela mitt skapande öppet och ärligt, hoppas jag att min konst kan bli en del av ditt liv och skapa minnesvärda stunder.</p>

                <p class="mb-5">Tack för att du är en del av min konstnärliga resa. Det är min ära att dela dessa skapelser med dig och 
                bygga en gemenskap där varje konstverk blir en personlig upplevelse</p>
            </div>
            <img src="photos/aboutimage.png" alt="PictureOfYourston" class="about-img pb-4">
        </div>
    </div>
</section>
<?php
// Includes footer
require_once 'assets/includes/inc.footer.php';
?>