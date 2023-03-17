<?php
// Start de sessie
session_start();

// Verbinding maken met de database
$conn = new mysqli("localhost", "username", "password", "databasename");

// Gebruikersinvoer valideren en schoonmaken
$email = $conn->real_escape_string($_POST['email']);
$wachtwoord = $conn->real_escape_string($_POST['wachtwoord']);

// Query uitvoeren om gebruikersgegevens te controleren
$resultaat = $conn->query("SELECT * FROM gebruikers WHERE email = '$email' AND wachtwoord = '$wachtwoord'");

// Als de gebruiker is gevonden, start dan een sessie en sla gebruikersgegevens op
if ($resultaat->num_rows == 1) {
  // Gebruikersgegevens ophalen en opslaan in de sessie
  $gebruiker = $resultaat->fetch_assoc();
  $_SESSION['gebruiker'] = $gebruiker;

  // Redirect naar de pagina waarop de muntenteller staat
  header("Location: muntenteller.php");
  exit();
} else {
  // Als de gebruiker niet is gevonden, redirect terug naar het inlogformulier
  header("Location: index.php?fout=1");
  exit();
}

// Verbinding met de database sluiten
$conn->close();
?>
