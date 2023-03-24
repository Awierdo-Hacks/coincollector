<?php
// Start de sessie
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['user'])) {
  // Gebruiker is niet ingelogd, stuur door naar de inlogpagina
  header("Location: inloggen.php");
  exit();
}

// Verbinding maken met de database
$conn = mysqli_connect("localhost", "root", "", "coincollector");

// Controleer of er een e-mail is gepost
if (isset($_POST['email'])) {
  // Update de e-mail in de users table
  $email=$_POST['email'];
  $user = $_SESSION['user'];
  mysqli_query($conn, "UPDATE users SET email = '$email' WHERE username = '$user'");
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Instellingen</title>
</head>
<body>
  <h1>Instellingen</h1>
  <p>Hier kun je je e-mailadres wijzigen.</p>
  <form method="post">
    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" value="">
    <button type="submit">Opslaan</button>
  </form>
</body>
</html>
