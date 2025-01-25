<?php
// Database connection variables
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "lost_and_found"; 

// Create connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
