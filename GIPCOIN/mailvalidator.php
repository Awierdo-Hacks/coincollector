<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendMail(string $message, string $address) {
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = "smtp.gmail.com";
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = "tls";
	$mail->Port = "587";
	$mail->Username = "pieter.afr@gmail.com";
	$mail->Password = "nrhndttrekelpgke";
	$mail->Subject = "titel test";//
	$mail->setFrom('pieter.afr@gmail.com');
	$mail->isHTML(true);
	$mail->Body = $message;//
	$mail->addAddress($address);

	return $mail->send();

}

// Start de sessie
session_start();

// controleer of de gebruiker is ingelogd, zo niet, geef een melding weer
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true)
{
    header("Location:login.php");
    exit();
}

// Verbinding maken met de database
$conn = mysqli_connect("localhost", "root", "", "coincollector");
// Gebruikersnaam ophalen
$gebruiker = $_SESSION['username'];

// Query uitvoeren om gebruikersgegevens te controleren
$query = "SELECT * FROM users WHERE username = '$gebruiker' AND email IS NOT NULL";
$result = mysqli_query($conn, $query);

// Als de gebruiker  niet gevonden is, start dan een sessie en sla gebruikersgegevens op
if (mysqli_num_rows($result) == 0)
{
    header("Location: main.php");
    exit();
}
elseif (mysqli_num_rows($result) == 1)
{
    $query = "SELECT * FROM mail WHERE username = '$gebruiker' AND bericht IS NOT NULL AND DAY(tijd) = DAY(NOW()) ";
    $result1 = mysqli_query($conn, $query);
    if (mysqli_num_rows($result1) == 0)
    {
        $resultaat2 = mysqli_query($conn, "SELECT * FROM coinlog WHERE coinvalue IS NOT NULL AND DAY(tijd) = DAY(NOW())");

        if (mysqli_num_rows($resultaat2) == 0)
        {
            // Als er nog geen e-mail is verzonden vandaag, stuur dan een e-mail
            // Query uitvoeren om de nieuwe e-mail op te slaan in de database
            mysqli_query($conn, "INSERT INTO mail (tijd, bericht, username) VALUES (NOW(), 'Positief', '$gebruiker')");
            $_SESSION['message'] = 'Je hebt vandaag al gespaard. Goed gedaan!';
            // stuurt de mail
            sendMail($_SESSION['message'], "pieter.afr@gmail.com");
            header("Location: main.php");
            exit;
        }
        else
        {
            // Als er nog niet is gespaard vandaag, stuur dan een andere e-mail
            // Query uitvoeren om de nieuwe e-mail op te slaan in de database
            mysqli_query($conn, "INSERT INTO  mail (tijd, bericht, username ) VALUES (NOW(), 'Negatief', '$gebruiker'))");
            $_SESSION['message'] = 'Je hebt nog niet gespaard vandaag. Probeer wat te sparen.';
            // stuurt de mail
            sendMail($_SESSION['message'], "pieter.afr@gmail.com");
            header("Location:main.php");
            exit;
        }
    }
    // Verbinding met de database sluiten
}

mysqli_close($conn);

?>