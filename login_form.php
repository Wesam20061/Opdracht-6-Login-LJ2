<?php
require_once('./classes/user.php');
require_once('database.php'); 

$user = new User($pdo);
$errors = [];

if (isset($_POST['login-btn'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validatie
    if (strlen($username) < 3 || strlen($username) > 50) {
        $errors[] = "Gebruikersnaam moet tussen 3 en 50 tekens lang zijn.";
    }
    if (strlen($password) < 3 || strlen($password) > 50) {
        $errors[] = "Wachtwoord moet tussen 3 en 50 tekens lang zijn.";
    }

    if (empty($errors)) {
        if ($user->LoginUser($username, $password)) {
            // Inloggen succesvol
            header('Location: index.php');
            exit();
        } else {
            $errors[] = "Inloggen mislukt. Controleer je gebruikersnaam en wachtwoord.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Login</title>
</head>
<body>

    <h3>Inloggen</h3>

    <?php
    if (!empty($errors)) {
        echo "<ul style='color: red;'>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
    ?>

    <form method="POST">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" name="username" required />
        <br>

        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" required />
        <br>

        <button type="submit" name="login-btn">Inloggen</button>
        <br>
        <a href="register_form.php">Heb je nog geen account? Registreer hier</a>
    </form>

</body>
</html>
