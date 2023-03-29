<?php


session_start();
require "mailsender.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get input values
    $username = $_POST['username'];
    $pass = $_POST['pass'];

    // Validate input
    if(empty($username) || empty($pass)) {
        $error = "Please enter both username and password";
    } else {
        // Check if username and password match in database
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "coincollector";

        $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM users WHERE username='$username' AND pass='$pass'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1) {
            // Login successful
            $_SESSION['loggedin'] = true;     
            $_SESSION['user'] = $username;

			$query = "SELECT * FROM users WHERE username = '$gebruiker' AND email IS NOT NULL";
			$result = mysqli_query($conn, $query);

			// Als de gebruiker is gevonden, start dan een sessie en sla gebruikersgegevens op
			if (mysqli_num_rows($result) == 0)
			{
				header("Location: index.php");
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
						header("Location: index.php");
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
						header("Location: index.php");
						exit;
					}
				}
				// Verbinding met de database sluiten
			}
            exit();
        } else {
            $error = "Invalid username or password";
        }
        mysqli_close($conn);
    }

	
}




?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="login_styling.css">

</head>
<body>
<div class="login-box">
  <h2>Login</h2>
  <form action="" method="post">
    <div class="user-box">
      <input type="text" name="username" required="">
      <label>Username</label>
    </div>
    <div class="user-box">
      <input type="password" name="pass" required="">
      <label>Password</label>
    </div>
    <p>
    <?php
if(isset($error)) {
  echo $error;
}
    ?>
    </p>
    <a href="#">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
<button type="submit" class="button">inloggen </button></a>
   
    
  </form>
</div>
</body>
</html>
