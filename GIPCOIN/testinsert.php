<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coincollector";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare data for insertion
$time = date("Y-m-d H:i:s");
$coinvalue = 0;
$totaal = 0;
$goal= 0;
$goalname= 'uw doel'
// Prepare SQL statement
$sql = "INSERT INTO spaardata ( totaal, doelbedrag, doelnaam) VALUES (  '$totaal', '$goal', '$goalname'  )";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
