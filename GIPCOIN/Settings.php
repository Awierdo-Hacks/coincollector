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



  if (isset($_POST["clearCoinLog"])) {
    // Maak verbinding met de database
    
    // Controleer of de verbinding is geslaagd
    if (!$conn) {
      die("Verbinding mislukt: " . mysqli_connect_error());
    }
  
    // Voer het SQL-statement uit om de tabel leeg te maken
    $sql = "TRUNCATE TABLE coinlog";
    if (mysqli_query($conn, $sql)) {
      header("Location:index.php");

    } else {
      echo "Er is een fout opgetreden: " . mysqli_error($conn);
    }
   
  }
 // Sluit de verbinding met de database
 mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="Settings_styling.css">
  <link rel="stylesheet" href="menu_styling.css">
  <script src="menu.js" defer></script>
  
<title>Instellingen</title>

</head>
<body>
<div class="boxes">  
<h1>Settings</h1>
  <p>Hier kun je je e-mailadres wijzigen.</p>
  <form method="post">
    <label for="email">E-mail:</label>
    <input type="email" name="email" id="email" value="">
    <button type="submit">Opslaan</button>
  </form>
  </div>
  
  <form method="post">
  <button type="submit"  class="button1"><span class='text'>Uw kluis legen</span><span class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg></span></button>
</form>
 
 
 
 
  <header class="cd-header">
		<div class="header-wrapper">
			<div class="logo-wrap">
				<a href="#" class="hover-target"><span>	<img src="image\cashwave-low-resolution-logo-color-on-transparent-background (1).png" alt=""></span></a>
			</div>
			<div class="nav-but-wrap">
				<div class="menu-icon hover-target">
					<span class="menu-icon__line menu-icon__line-left"></span>
					<span class="menu-icon__line"></span>
					<span class="menu-icon__line menu-icon__line-right"></span>
				</div>					
			</div>					
		</div>				
	</header>

	<div class="nav">
		<div class="nav__content">
      <ul class="nav__list">
        <li class="nav__list-item active-nav"><a href="Settings.php" class="hover-target">Settings</a></li>
				<li class="nav__list-item"><a href="index.php" class="hover-target">Overzicht</a></li>
				<li class="nav__list-item"><a href="Statistieken.php" class="hover-target">Statistieken</a></li>
				<li class="nav__list-item"><a href="Doelen.php" class="hover-target">Doelen</a></li>
				<li class="nav__list-item"><a href="uitlog.php" class="hover-target">Uitloggen</a></li>
			</ul>
		</div>
	</div>		


</body>
</html>
