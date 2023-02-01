<?php



//connect to your database
$conn = mysqli_connect("localhost", "root", "", "coincollector");

// Insert the data into the coinlog table
$query = "SELECT goal FROM coinlog ORDER BY id DESC LIMIT 1";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
 $goal = $row["goal"];
 echo $goal; 
// Close the connection
mysqli_close($conn);


?>
