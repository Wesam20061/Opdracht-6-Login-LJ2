<?php
require_once('./classes/user.php');
require_once('database.php'); 

$user = new User($pdo);
$errors = [];

if (isset($_POST['register-btn'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']); // Nieuw toegevoegd
    $password = trim($_POST['password']);

    // Validatie
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Ongeldig e-mailadres.";
    }
    if (strlen($username) < 3 || strlen($username) > 50) {
        $errors[] = "Gebruikersnaam moet tussen 3 en 50 tekens lang zijn.";
    }
    if (strlen($password) < 3 || strlen($password) > 50) {
        $errors[] = "Wachtwoord moet tussen 3 en 50 tekens lang zijn.";
    }

    if (empty($errors)) {
        $user->username = $username;
        $user->email = $email; // Nieuw toegevoegd
        $user->SetPassword($password);
        $errors = $user->RegisterUser();

        if (count($errors) == 0) {
            echo "<script>alert('Gebruiker geregistreerd!');</script>";
            echo "<script>window.location = 'login_form.php';</script>";
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <title>Registratie</title>
</head>
<body>

    <h3>Registreren</h3>

    <?php
    if (!empty($errors)) {
        echo "<ul style='color: red;'>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
    ?>

    <form action="" method="POST">    
        <label>Gebruikersnaam</label>
        <input type="text" name="username" required />
        <br>
        
        <label>E-mail</label> <!-- Nieuw veld -->
        <input type="email" name="email" required />
        <br>

        <label>Wachtwoord</label>
        <input type="password" name="password" required />
        <br>

        <button type="submit" name="register-btn">Registreren</button>
        <br>
        <a href="login_form.php">Heb je al een account? Log in</a>
    </form>

</body>
</html>
