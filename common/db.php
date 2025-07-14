<?php
$host = "localhost";
$username = "root";
$password = ""; // null can be used too, but "" is preferred for no password
$database = "discuss";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("❌ Database connection failed: " . $conn->connect_error);
}
?>
