<?php
// Zorg ervoor dat de sessie is gestart
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verwijder sessiegegevens en log de gebruiker uit
session_unset();
session_destroy();

// Stuur de gebruiker naar de loginpagina
header("Location: login_form.php");
exit();
?>
