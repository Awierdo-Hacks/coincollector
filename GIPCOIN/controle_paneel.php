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
    <link rel="stylesheet" href="./Style.css">
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
    
    <input class="date-btn" type="radio" id="date-1" name="date-btn" checked />
    <label for="date-1"><span>30 days</span></label>
    <input class="date-btn" type="radio" id="date-2" name="date-btn" />
    <label for="date-2"><span>90 days</span></label>
    <input class="date-btn" type="radio" id="date-3" name="date-btn" />
    <label for="date-3"><span>180 days</span></label>
    <input class="date-btn" type="radio" id="date-4" name="date-btn" />
    <label for="date-4"><span>365 days</span></label>
    <div class="section-col-1">
      <div class="section">
        <div class="section-progress">
          <div class="income days-30">
            <div class="income-tooltip">
              <p>Income</p>
              <h6>$ 2,501.57</h6>
            </div>
          </div>
          <div class="expense days-30">
            <div class="expense-tooltip">
              <p> </p>
              <h6>$ 1,347.00</h6>
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
      <input type="text" id="goalname" name="goalname"  class="form-control">  
      <label for="goal">Goal:</label>
        <input type="number" id="goal" name="goal" min="0" step="0.5" value="<?php 
          if (isset($goal)) {
              echo $goal; 
          } else {
              echo "0.00";
          }
          ?>" class="form-control">
        <br>
        <button class="button" type="submit">
  <span class="button__text">
    <span>Update</span>
  
  <svg class="button__svg" role="presentational" viewBox="0 0 600 600">
    <defs>
      <clipPath id="myClip">
        <rect x="0" y="0" width="100%" height="50%" />
      </clipPath>
    </defs>
    <g clip-path="url(#myClip)">
      <g id="money">
        <path d="M441.9,116.54h-162c-4.66,0-8.49,4.34-8.62,9.83l.85,278.17,178.37,2V126.37C450.38,120.89,446.56,116.52,441.9,116.54Z" fill="#699e64" stroke="#323c44" stroke-miterlimit="10" stroke-width="14" />
        <path d="M424.73,165.49c-10-2.53-17.38-12-17.68-24H316.44c-.09,11.58-7,21.53-16.62,23.94-3.24.92-5.54,4.29-5.62,8.21V376.54H430.1V173.71C430.15,169.83,427.93,166.43,424.73,165.49Z" fill="#699e64" stroke="#323c44" stroke-miterlimit="10" stroke-width="14" />
      </g>
      <g id="creditcard">
        <path d="M372.12,181.59H210.9c-4.64,0-8.45,4.34-8.58,9.83l.85,278.17,177.49,2V191.42C380.55,185.94,376.75,181.57,372.12,181.59Z" fill="#a76fe2" stroke="#323c44" stroke-miterlimit="10" stroke-width="14" />
        <path d="M347.55,261.85H332.22c-3.73,0-6.76-3.58-6.76-8v-35.2c0-4.42,3-8,6.76-8h15.33c3.73,0,6.76,3.58,6.76,8v35.2C354.31,258.27,351.28,261.85,347.55,261.85Z" fill="#ffdc67" />
        <path d="M249.73,183.76h28.85v274.8H249.73Z" fill="#323c44" />
      </g>
    </g>
    <g id="wallet">
      <path d="M478,288.23h-337A28.93,28.93,0,0,0,112,317.14V546.2a29,29,0,0,0,28.94,28.95H478a29,29,0,0,0,28.95-28.94h0v-229A29,29,0,0,0,478,288.23Z" fill="#a4bdc1" stroke="#323c44" stroke-miterlimit="10" stroke-width="14" />
      <path d="M512.83,382.71H416.71a28.93,28.93,0,0,0-28.95,28.94h0V467.8a29,29,0,0,0,28.95,28.95h96.12a19.31,19.31,0,0,0,19.3-19.3V402a19.3,19.3,0,0,0-19.3-19.3Z" fill="#a4bdc1" stroke="#323c44" stroke-miterlimit="10" stroke-width="14" />
      <path d="M451.46,435.79v7.88a14.48,14.48,0,1,1-29,0v-7.9a14.48,14.48,0,0,1,29,0Z" fill="#a4bdc1" stroke="#323c44" stroke-miterlimit="10" stroke-width="14" />
      <path d="M147.87,541.93V320.84c-.05-13.2,8.25-21.51,21.62-24.27a42.71,42.71,0,0,1,7.14-1.32l-29.36-.63a67.77,67.77,0,0,0-9.13.45c-13.37,2.75-20.32,12.57-20.27,25.77l.38,221.24c-1.57,15.44,8.15,27.08,25.34,26.1l33-.19c-15.9,0-28.78-10.58-28.76-25.93Z" fill="#7b8f91" />
      <path d="M148.16,343.22a6,6,0,0,0-6,6v92a6,6,0,0,0,12,0v-92A6,6,0,0,0,148.16,343.22Z" fill="#323c44" />
    </g>

  </svg>
</button>
      </form>
    </div>
     </body>
</html>
