<?php

if(isset($_POST["goal"])) {
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


mysqli_close($conn);

?>
<!DOCTYPE html>
<html>
  <head>
    <title>CoinCollector</title>
    
    <link rel="stylesheet" href="controle_paneel_styling.css">
  </head>
  <body>
    ------------------------------------------------------
    <input class="dark-light" type="checkbox" id="dark-light" name="dark-light" />
<label for="dark-light"></label>

<div class="light-back"></div>

<div class="section-fluid-main">
  <div class="section-row">
    <div class="section-col-2">
      <div class="section">
        <p class="color-blue"> Uw totaal</p>
      </div>
      <h3><span class="font-weight-500"><?php echo "€".$totalAmount; ?></span> </h3>
    </div>
    
    <div class="section-col-2">
      <div class="section">
        <p class="color-yellow"> <?php echo $goalname;?></p>
        <h3><span class="font-weight-500"><?php echo $goal;?></span></h3>
      </div>
    </div>
    
    <div class="section-col-1">
      <div class="section">
        <div class="section-progress">
          <div class="income">
            <div class="income-tooltip">
              <p>Totaalbedrag</p>
              <h6><?php echo "€".$totalAmount; ?></h6>
            </div>
          </div>
          <div class="expense">
            <div class="expense-tooltip">
              <p><?php echo $goalname;?></p>
              <h6><?php echo $goal;?></h6>
            </div>
          </div>
          
          </div>
        </div>
      </div>
    </div>
  </div>

  <a href="https://front.codes/" class="logo" target="_blank">
    <img src="https://assets.codepen.io/1462889/fcy.png" alt="">
  </a>
</div>

  ---------------------------------------------
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

