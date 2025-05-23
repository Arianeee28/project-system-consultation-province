<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Change as needed
$password = ""; // Change as needed
$dbname = "db1"; // Replace with your DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get and sanitize POST data
$user_name = $_POST['user_name'];
$fullName = $_POST['fullName'];
$specialization = $_POST['specialization'];
$raw_password = $_POST['password'];

// Hash the password
$hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);

// Prepare the SQL statement
$stmt = $conn->prepare("INSERT INTO doctor (user_name, fullName, specialization, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $user_name, $fullName, $specialization, $hashed_password);

// Execute and check result
if ($stmt->execute()) {
  echo "Account created successfully!";
} else {
  echo "Error: " . $stmt->error;
}

// Close connections
$stmt->close();
$conn->close();
?>
