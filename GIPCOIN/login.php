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
 header("mailvalidator.php");
       
	
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
    

<button class="btnlogin" type="submit">inloggen</button>

    
  </form>
</div>
</body>
</html>
