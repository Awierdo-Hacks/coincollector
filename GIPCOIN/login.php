<?php


session_start();

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
     
            header("Location: mailvalidator.php");
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
<link rel="stylesheet" href="test.css">
    
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>



    
    
<body>
  


    
 

	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"><span>Log In </span><span>Sign Up</span></h6>
			          	<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
			          	<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Log In</h4>
											<div class="form-group">
												<input type="email" name="logemail" class="form-style" placeholder="Your Email" id="logemail" autocomplete="off">
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="logpass" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<a href="#" class="btn mt-4">submit</a>
                            				<p class="mb-0 mt-4 text-center"><a href="#0" class="link">Forgot your password?</a></p>
				      					</div>
			      					</div>
			      				</div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Sign Up</h4>
											<div class="form-group">
												<input type="text" name="logname" class="form-style" placeholder="Your Full Name" id="logname" autocomplete="off">
												<i class="input-icon uil uil-user"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="email" name="logemail" class="form-style" placeholder="Your Email" id="logemail" autocomplete="off">
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="logpass" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off">
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<a href="#" class="btn mt-4">submit</a>
				      					</div>
			      					</div>
			      				</div>
			      			</div>
			      		</div>
			      	</div>
		      	</div>
	      	</div>
	    </div>
	</div>
  </body>
  </html>