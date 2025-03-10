<?php

// auteur: Wesam Ali

// Zorg ervoor dat de sessie is gestart
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check of de gebruiker is ingelogd
if (!isset($_SESSION['username'])) {
    echo "U bent niet ingelogd. <br><a href='login_form.php'>Login</a>";
    exit();
}

// Verkrijg de gebruikersnaam uit de sessie
$username = $_SESSION['username'];

?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Welkom</title>
</head>
<body>

    <h1>Welkom op de homepagina!</h1>
    <h2>Het spel kan beginnen!</h2>
    <h2>Je bent ingelogd met de gebruikersnaam: <?php echo $_SESSION['username']; ?></h2>
    <!-- We tonen GEEN wachtwoord! -->

    <a href="logout.php">Uitloggen</a>

</body>
</html>

