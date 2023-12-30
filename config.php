<?php
$host = 'localhost'; // e.g., 'localhost'
$username = 'betawebc_greetings';
$password = 'Userpass@12345';
$database = 'betawebc_greetings'; // Database name

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
