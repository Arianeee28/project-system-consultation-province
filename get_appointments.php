<?php
session_start();
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db1";

// Connect to DB
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// ✅ FIX: Check if 'date' and 'doctor' are passed in the URL
$date = isset($_GET['date']) ? $_GET['date'] : null;
$doctorName = isset($_GET['doctor']) ? $_GET['doctor'] : null;

// If missing, stop execution
if (!$date || !$doctorName) {
  http_response_code(400);
  echo json_encode(["error" => "Missing required parameters: date or doctor"]);
  exit;
}

// ✅ FIX: Make sure the field names match your table structure.
// You got an error for 'firstName'. Change it to the correct column name:
$sql = "SELECT name, status, time 
        FROM appointment 
        WHERE doctor = ? AND DATE(time) = ? 
        ORDER BY time ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $doctorName, $date);
$stmt->execute();
$result = $stmt->get_result();

$appointments = [];
while ($row = $result->fetch_assoc()) {
  $appointments[] = [
    'title' => $row['name'] . ' (' . $row['status'] . ')',
    'start' => $row['time'],
  ];
}

echo json_encode($appointments);
$conn->close();
?>
