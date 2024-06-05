<?php
// Checks if an action is set
if (isset($_GET['login'])) {
    // Checks which action is set
    switch ($_GET['login']) {
    case 'empty':
        echo '
        <div class="alert alert-warning">
        Du har inte angett något användarnamn eller lösenord!
        </div>
    ';
    break;
    case 'error':
        echo '
        <div class="alert alert-danger">
        Du har angett felaktigt användarnamn eller lösenord!
        </div>
    ';
    break;
    case 'logout':
        echo '
        <div class="alert alert-success">
        Du har lyckats logga ut!
        </div>
    ';
    break;
    }
}

// Checks if an action is set
if (isset($_GET['upload'])) {
    // Checks which action is set
    switch ($_GET['upload']) {
        case 'empty':
            echo '
            <div class="alert alert-warning">
            Du har inte valt någon bild!
            </div>
            ';
        break;
        case 'overload':
            echo '
            <div class="alert alert-danger">
            Filstorlek överskriden (1 MB)
            </div>
            ';
        break;
        case 'type':
            echo '
            <div class="alert alert-warning">
            Ej giltig filtyp!
            </div>
            ';
        break;
        case 'error':
            echo '
            <div class="alert alert-warning">
            Fel inträffade vid uppladdning av fil
            </div>
            ';
            break;
    }
}
?>