<?php

// Create Database 
$servername = "localhost:3309"; 
$username = "root";
$password = ""; 
$database = "bus_reservation_system"; // Database name

// Create Connection
$conn = new mysqli($servername, $username, $password, $database);


// Check Connection
if($conn->connect_error) {
    die("Connection Failed:" .$conn->connect_error);
}
// else {
//     echo("Connection Successful");
// }

?>