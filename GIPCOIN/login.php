<html>
  <head>
    <title>Login</title>
    <link rel="stylesheet" href="style_login.css">
  </head>
  <body>
    <div class="container">
      <form action="login.php" method="post" class="form-group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" class="form-control">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" class="form-control">
        <br>
        <input type="submit" value="Login" class="btn btn-danger">
      </form>
    </div>
  </body>
</html>

<?php
   session_start();
   if($_SERVER["REQUEST_METHOD"] == "POST"){
       $username = $_POST["username"];
       $password = $_POST["password"];
       if ($username == "bankier" && $password == "geld") {
           $_SESSION["logged_in"] = true;
           header("Location: controle_paneel.php");
       } else {
           $_SESSION["logged_in"] = false;
           echo "Incorrect username or password. Please try again.";
       }
   }
?>
    