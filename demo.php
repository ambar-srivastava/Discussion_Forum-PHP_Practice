<?php
// Database connection
include(db . php);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => "Database connection failed."]));
}

// Set header
header("Content-Type: application/json");

// Get JSON POST data
$data = json_decode(file_get_contents("php://input"), true);

// Validate required fields
if (empty($data['name']) || empty($data['email']) || empty($data['password'])) {
    echo json_encode(["status" => "error", "message" => "All fields are required."]);
    exit;
}

$name = $conn->real_escape_string($data['name']);
$email = $conn->real_escape_string($data['email']);
$password = password_hash($data['password'], PASSWORD_BCRYPT);

// Check if email already exists
$sqlCheck = "SELECT id FROM users WHERE email = '$email'";
$result = $conn->query($sqlCheck);
if ($result->num_rows > 0) {
    echo json_encode(["status" => "error", "message" => "Email already exists."]);
    exit;
}

// Insert user
$sqlInsert = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
if ($conn->query($sqlInsert)) {
    echo json_encode(["status" => "success", "message" => "User registered successfully."]);
} else {
    echo json_encode(["status" => "error", "message" => "Registration failed."]);
}

$conn->close();
