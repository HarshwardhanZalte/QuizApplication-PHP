<?php
// Database credentials
$servername = "localhost"; // Change this to your database server name if it's different
$username = "root"; // Change this to your database username
$password = "windows@14"; // Change this to your database password
$database = "quiz"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error); 
}
?>
