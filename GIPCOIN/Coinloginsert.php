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
$time = date("Y-m-d H:i:s", 1678360283
);
$coinvalue = $_GET['coinvalue'];
// Prepare SQL statement
$sql = "INSERT INTO coinlog ( tijd,coinvalue   ) VALUES ( '$time', '$coinvalue' )";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
