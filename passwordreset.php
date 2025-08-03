<?php
session_start(); // PHP-Session starten

$title = "New Password";
include_once 'include/header.php';

// Funktion zur Erstellung eines Salts
function ospswdsalt() {
    return md5(uniqid(mt_rand(), true));
}

// Funktion zur Erstellung des Passwort-Hashes
function ospswdhash($osPasswd, $osSalt) {
    return md5(md5($osPasswd) . ":" . $osSalt);
}

// include/verification_functions.php

function generateActivationCode() {
    return bin2hex(random_bytes(16));
}

function sendVerificationEmail($email, $vorname, $nachname, $activationCode) {
    $subject = "Your activation code for " . SITE_NAME;
    $message = "Hello $vorname $nachname,\n\n";
    $message .= "Your activation code is: $activationCode\n\n";
    $message .= "Please use this code to complete your registration.\n\n";
    $message .= "Welcome to the grid!  Sincerely,\n";
    $message .= SITE_NAME;

    $headers = "From: noreply@" . parse_url(BASE_URL, PHP_URL_HOST) . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    return mail($email, $subject, $message, $headers);
}

function generateUUID() {
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}

$showCard1 = true; // Standardmäßig Card1 anzeigen
$showCard2 = false; // Card2 standardmäßig ausblenden

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["generateCode"])) {
        // Generate verification code and send it by email
        $osVorname = trim($_POST["osVorname"]);
        $osNachname = trim($_POST["osNachname"]);

        // Save values in the session
        $_SESSION['osVorname'] = $osVorname;
        $_SESSION['osNachname'] = $osNachname;

        try {
            // Establish database connection
            $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Retrieve users by first name and last name
            $statement = $pdo->prepare("SELECT PrincipalID, Email FROM UserAccounts WHERE FirstName = :FirstName AND LastName = :LastName");
            $statement->execute(['FirstName' => $osVorname, 'LastName' => $osNachname]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                echo "User not found.";
                exit;
            }

            $email = $user['Email'];
            $principalID = $user['PrincipalID'];

            // Generate verification code (as a variable, not stored in the database)
            $activationCode = generateActivationCode();

            // Send email to user
            $subject = "Your activation code for " . SITE_NAME;
            $message = "Hello $osVorname $osNachname,\n\n";
            $message .= "Your activation code is: $activationCode\n\n";
            $message .= "Please use this code to reset your password on " . BASE_URL . ".\n\n";
            $message .= "Best regards\n";
            $message .= SITE_NAME;

            $headers = "From: noreply@" . parse_url(BASE_URL, PHP_URL_HOST) . "\r\n";
            $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

            if (mail($email, $subject, $message, $headers)) {
                echo "The email was sent to $email. Please check your email account.";
                $showCard1 = false; // Card1 ausblenden
                $showCard2 = true;  // Card2 anzeigen
            } else {
                echo "Error sending email.";
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        // Passwort ändern
        $osVorname = $_SESSION['osVorname']; // Werte aus der Session abrufen
        $osNachname = $_SESSION['osNachname'];
        $activationCode = trim($_POST["activationCode"]);
        $newPassword = trim($_POST["newPassword"]);

        if (empty($osVorname) || empty($osNachname) || empty($activationCode) || empty($newPassword)) {
            echo "Please fill in all fields.";
            exit;
        }

        try {
            // Datenbankverbindung herstellen
            $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Benutzer anhand des Vor- und Nachnamens suchen
            $statement = $pdo->prepare("SELECT PrincipalID FROM UserAccounts WHERE FirstName = :FirstName AND LastName = :LastName");
            $statement->execute(['FirstName' => $osVorname, 'LastName' => $osNachname]);
            $user = $statement->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                echo "User not found.";
                exit;
            }

            $principalID = $user['PrincipalID'];

            // Generiere ein neues Salt und Hash für das neue Passwort
            $newSalt = ospswdsalt(); // Funktion aufrufen
            $newHash = ospswdhash($newPassword, $newSalt); // Funktion aufrufen

            // Passwort in der Tabelle `auth` aktualisieren
            $updateStatement = $pdo->prepare("UPDATE auth SET passwordHash = :passwordHash, passwordSalt = :passwordSalt WHERE UUID = :UUID");
            $updateStatement->execute([
                'passwordHash' => $newHash,
                'passwordSalt' => $newSalt,
                'UUID' => $principalID
            ]);

            echo "Password successfully changed.";

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        // Datenbankverbindung schließen
        $pdo = null;
    }
}
?>

<html>
<head>
    <meta charset="utf-8">
    <title>Change Password</title>
    <style>
        htmlBody {font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;} 
        .card1, .card2 {
            width: 50%; 
            margin: 2em auto; 
            padding: 2em; 
            background-color: #ffffff; 
            border: 1px solid #ccc; 
            border-radius: 15px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {color: #333;} 
        form label {display: block; margin-bottom: 0.5em; color: #333;} 
        form input[type="text"], form input[type="password"], form input[type="email"] {
            width: 100%; 
            padding: 0.5em; 
            margin-bottom: 1em; 
            border: 1px solid #ccc; 
            border-radius: 4px;
        } 
        form input[type="submit"] {
            padding: 0.7em 2em; 
            background-color: #007BFF; 
            color: #ffffff; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer;
        } 
        form input[type="submit"]:hover {background-color: #0056b3;}
    </style>
</head>
<body>
<main>
    <!-- Show Card1 first -->
    <div class="card1" style="display: <?php echo $showCard1 ? 'block' : 'none'; ?>;">
        <h2>New Password verify</h2> 
        <form action="" method="post">
            <label for="osVorname">Frist Name:</label>
            <input type="text" name="osVorname" required><br>
            <label for="osNachname">Last Name:</label>
            <input type="text" name="osNachname" required><br>
            <input type="submit" name="generateCode" value="Send activation code"><br><br>
        </form>
    </div>

    <!-- Show Card2 after sending the activation code -->
    <div class="card2" style="display: <?php echo $showCard2 ? 'block' : 'none'; ?>;">
        <h2>New Password now</h2>
        <form action="" method="post">
            <label for="activationCode">Activation code from the sent email:</label>
            <input type="text" name="activationCode" required><br>
            <label for="newPassword">New Password:</label>
            <input type="password" name="newPassword" required><br>
            <input type="submit" value="Change Password">
        </form>
    </div>
</main>
</body>
</html>
