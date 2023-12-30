<?php
$host = 'localhost'; // e.g., 'localhost'
$username = 'localhost_username';
$password = 'localhost_password';
$database = 'localhost_dbname'; // Database name

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
