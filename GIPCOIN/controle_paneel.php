<?php

if (isset($_POST["goal"])) {
  $goal = $_POST["goal"];
  //connect to your database
  $conn = mysqli_connect("localhost", "root", "", "coincollector");
  //update the data in your database
  $query = "UPDATE spaardata SET doelbedrag = $goal, doelnaam= $goalname";
  $result = mysqli_query($conn, $query);
  //close the connection
  mysqli_close($conn);
  //redirect to the home page
  header("Location:controle_paneel.php");
}

//connect to your database
$conn = mysqli_connect("localhost", "root", "", "coincollector");

//voor totaal
$query = "SELECT totaal FROM spaardata ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$totalAmount = $row["totaal"];

//voor doelnaam+bedrag
$query = "SELECT doelbedrag, doelnaam FROM spaardata ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$goalname = $row["doelnaam"];
$goal = $row["doelbedrag"];

$percentage1 = intval($totalAmount / $goal * 100);
$percentage2 = 100 - $percentage1;

mysqli_close($conn);

?>
<!DOCTYPE html>
<html>

<head>
  <title>Cashwave</title>

  <link rel="stylesheet" href="controle_paneel_styling.css">
  <link rel="stylesheet" href="menu_styling.css">
  <script src="menu.js" defer></script>

  <!-- <script defer>
    document.querySelector(".section-col-1 .income").style.width = "90%";
    document.querySelector(".section-col-1 .expense").style.width = "10%";
    </script> -->
</head>
<body>
  <input class="dark-light" type="checkbox" id="dark-light" name="dark-light" />
  <label for="dark-light"></label>

  <div class="light-back"></div>

  <div class="section-fluid-main">
    <div class="section-row">
      <div class="section-col-2">
        <div class="section">
          <p class="color-blue"> Uw totaal</p>
          <h3><span class="font-weight-500"><?php echo "€" . $totalAmount; ?></span> </h3>
        </div>
      </div>

      <div class="section-col-2">
        <div class="section">
          <p class="color-yellow"> <?php echo $goalname; ?></p>
          <h3><span class="font-weight-500"><?php echo $goal; ?></span></h3>
        </div>
      </div>
      <input hidden class="date-btn" type="radio" id="date-1" name="date-btn" checked />
      <label hidden for="date-1"><span>30 days</span></label>
      <div class="section-col-1">
        <div class="section">
          <div class="section-progress">
            <div class="income days-30" style="width: <?php echo $percentage1; ?>%;">
              <div class="income-tooltip">
                <p>Totaalbedrag</p>
                <h6><?php echo "€" . $totalAmount; ?></h6>
              </div>
            </div>
            <div class="expense days-30" style="width: <?php echo $percentage2; ?>%;left: <?php echo $percentage1; ?>%;">
              <div class="expense-tooltip">
                <p> <?php echo $goalname; ?></p>
                <h6><?php echo $goal; ?></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
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
				<li class="nav__list-item active-nav"><a href="controle_paneel.php" class="hover-target">Controle Paneel</a></li>
				<li class="nav__list-item"><a href="login.php" class="hover-target">Login</a></li>
				<li class="nav__list-item"><a href="#" class="hover-target">Statistieken</a></li>
				<li class="nav__list-item"><a href="#" class="hover-target">Zakgeld maker</a></li>
				<li class="nav__list-item"><a href="#" class="hover-target">Contact</a></li>
			</ul>
		</div>
	</div>		
  <a href="#" class="link-to-portfolio hover-target" target="”_blank”"></a>
 
    
  </a>
  </div>

  <!-- ---------------------------------------------
  <div class="container pt-5">
      <h1 class="text-center">Coin Acceptor Status</h1>
      <div id="status-display" class="text-center">
        <p>Totaal bedrag: <span id="total-amount"><?php
          echo $totalAmount;
          ?></span></p>
        <p><span id="goal"><?php
          echo $goalname .": ". $goal ;
          ?></span></p>
      </div>
      <h2 class="text-center">Configure Coin Acceptor</h2>
      <form method="post" action="" class="form-group mx-auto">
      <label for="goalname">Goalname:</label>
      <input type="text" class="form-control" id="goalname" name="goalname" value="<?php echo $goalname; ?>" required>
      <label for="goal">Goal:</label>
      <input type="number" class="form-control" id="goal" name="goal" value="<?php echo $goal; ?>" required>
      <button type="submit" class="btn btn-primary mt-3" name="submit">Update</button>
    </form>
  </div>

 
  </body>
</html>

