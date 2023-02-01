<?php
$coinValue = $_GET["coinvalue"];
$totalAmount = $_GET["totalamount"];
$time = date("Y-m-d H:i:s");

//connect to your database
$conn = mysqli_connect("localhost", "root", "", "coincollector");

// Insert the data into the coinlog table
$query = "INSERT INTO coinlog (tijd, coinvalue, totaal) VALUES ('$time', '$coinValue', '$totalAmount')";
$result = mysqli_query($conn, $query);

// Close the connection
mysqli_close($conn);


?>
