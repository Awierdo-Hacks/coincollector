<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Login</title>
  <link rel="stylesheet" href="style_login.css">
</head>
<body>
  
	<a href="#" class="logo" target="_blank">
		<img src="image\logofulltrans.png" alt="">
	</a>

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
											<form action="" method="post">
                      <input type="email" name="logemail" class="form-style" placeholder="Your Email" id="logemail" autocomplete="off" required>
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="logpass" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off" required >
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<input type="submit" value="inloggen" class="btn mt-4"> 
                            			
				      					</div>
			      					</div>
			      				</div>
                    </form>	
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Sign Up</h4>
											<form action="" method="post">
                      <div class="form-group">
												<input type="text" name="logname" class="form-style" placeholder="Uw volledige naam" id="logname" autocomplete="off"required>
												<i class="input-icon uil uil-user"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="email" name="logemail" class="form-style" placeholder="Uw Email" id="logemail" autocomplete="off"required>
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="logpass" class="form-style" placeholder="Uw wachtwoord" id="logpass" autocomplete="off"required>
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
                      <input type="submit" value="Registreer" class="btn mt-4">                     
                      </form>
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