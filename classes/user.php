<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once "database.php"; // Zorg ervoor dat dit bestand de juiste databaseverbinding bevat

class User {
    private $pdo;
    public $username;
    private $password;
    public $email; // Nieuw toegevoegd

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Wachtwoord instellen en hashen
    public function SetPassword($password) {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    // Gebruiker registreren
    public function RegisterUser() {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE username = :username OR email = :email");
        $stmt->execute(['username' => $this->username, 'email' => $this->email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return ["De gebruikersnaam of e-mail bestaat al!"];
        } else {
            $stmt = $this->pdo->prepare("INSERT INTO user (username, password, email) VALUES (:username, :password, :email)");
            $stmt->execute([
                'username' => $this->username,
                'password' => $this->password,
                'email'    => $this->email
            ]);
            return [];
        }
    }

    // Gebruiker inloggen met gebruikersnaam of e-mail
    public function LoginUser($usernameOrEmail, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE username = :input OR email = :input");
        $stmt->execute(['input' => $usernameOrEmail]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $user['username'];
            return true;
        } else {
            return false;
        }
    }

    // Controleren of de gebruiker is ingelogd
    public function IsLoggedin() {
        return isset($_SESSION['username']);
    }

    // Gebruiker uitloggen
    public function Logout() {
        session_unset();
        session_destroy();
        header("Location: login_form.php");
        exit();
    }
}
?>
