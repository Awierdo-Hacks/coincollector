<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
session_start();

// Verbinding maken met de database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coicollector";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verbinding maken met de database
$conn = mysqli_connect("$servername", "$username", "$password", "$dbname");

// Controleren of de verbinding is geslaagd
if (!$conn) {
    die("Verbinding mislukt: " . mysqli_connect_error());
}

// Gebruikersgegevens
$gebruikersnaam = $_SESSION['user'] = $username;
$email = $_POST['email'];

// Query om te controleren of er al een e-mailadres is voor de gebruiker
$sql = "SELECT * FROM users WHERE gebruikersnaam='$gebruikersnaam'";

$resultaat = mysqli_query($conn, $sql);

// Controleren of de query is geslaagd
if (!$resultaat) {
    die("Query mislukt: " . mysqli_error($conn));
}

// Als er een rij wordt gevonden, het e-mailadres bijwerken, anders een nieuw e-mailadres toevoegen
if (mysqli_num_rows($resultaat) > 0) {
    $sql = "UPDATE gebruikers SET email='$email' WHERE gebruikersnaam='$gebruikersnaam'";
} else {
    $sql = "INSERT INTO gebruikers (gebruikersnaam, email) VALUES ('$gebruikersnaam', '$email')";
}

// Query uitvoeren
if (mysqli_query($conn, $sql)) {
    echo "email bijgewerkt/toegevoegd.";
} else {
    echo "Fout bij het bijwerken/toevoegen van email: " . mysqli_error($conn);
}






// Controleren of er een verbinding is gemaakt
if ($conn->connect_error) {
	die("Kan geen verbinding maken met de database: " . $conn->connect_error);
}

// Gegevens uit het formulier ophalen
$email = $_POST['email'];
$meldingen = $_POST['meldingen'];

// SQL-query uitvoeren om te controleren of er vandaag munten zijn toegevoegd
$sql = "SELECT COUNT(*) AS aantal FROM coinlog WHERE DATE(tijd) = CURDATE()";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	// Munten zijn toegevoegd, e-mail verzenden met het bedrag dat nog moet worden gespaard
	$row = $result->fetch_assoc();
	$aantal_munten = $row['aantal'];
	$sql = "SELECT doelbedrag FROM spaardata";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	$doelbedrag = $row['doelbedrag'];
	$bedrag_te_gaan = $doelbedrag - $aantal_munten;
	$onderwerp = "Je hebt vandaag al gespaard!";
	$bericht = "Goed gedaan! Je hebt vandaag al $aantal_munten munten gespaard. Nog $bedrag_te_gaan euro te gaan om je doel te bereiken.";
} else {
	// Geen munten toegevoegd, e-mail verzenden om aan te moedigen om te sparen
	$onderwerp = "Je hebt nog niet gespaard vandaag";
	$bericht = "Probeer wat munten te sparen vandaag. Het kan je helpen om je doel te bereiken!";
}


// E-mail verzenden als meldingen zijn ingeschakeld
if ($meldingen == 1) {
	
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
    $mail->Password = "muhzlfkkqraqmdqe";
    $mail->Subject = "$onderwerp";//
    $mail->setFrom('pieter.afr@gmail.com');
    $mail->isHTML(true);
    $mail->Body = "$bericht";//
    $mail->addAddress("pieter.afr@gmail.com");
    if ( $mail->send() ) {
        echo   "gelukt";//

    }else{
        echo $mail->ErrorInfo;
    }




    } else {
    echo "Meldingen zijn niet ingeschakeld voor $email";
    }
    
    // Verbinding met de database sluiten
    $conn->close();
    ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>E-mail instellingen</title>
</head>
<body>
	<h1>E-mail instellingen</h1>
	<form method="post" action="">
		<label for="email">E-mailadres:</label>
		<input type="email" name="email" id="email">
		<br><br>
		<label for="meldingen">Meldingen inschakelen:</label>
		<input type="checkbox" name="meldingen" id="meldingen" value="1">
		<br><br>
		<input type="submit" name="submit" value="Verzenden">
	</form>
</body>
</html>