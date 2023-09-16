<?php
$servername = "localhost"; // Replace with your MySQL server hostname or IP address
$username = "voorivex"; // Replace with your MySQL username
$password = "mamad123"; // Replace with your MySQL password
$database = "voorivex_weblog"; // Replace with the name of your MySQL database

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// echo "Connected successfully";
?>