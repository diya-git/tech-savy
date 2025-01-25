<?php
// Database connection variables
$servername = "localhost"; // Database server (localhost for local server)
$username = "root"; // MySQL default username in XAMPP
$password = ""; // MySQL default password in XAMPP (empty by default)
$dbname = "lost_and_found"; // Name of the database you created

// Create connection to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
