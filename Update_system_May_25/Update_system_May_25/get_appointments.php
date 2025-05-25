<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db1"; // Replace with your actual DB name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$date = $_GET['date'];         // Format: YYYY-MM-DD
$doctorName = $_GET['doctor']; // e.g., "Dr. Justin"

$sql = "SELECT firstName, status, time 
        FROM appointment 
        WHERE doctor = ? AND DATE(time) = ? 
        ORDER BY time ASC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $doctorName, $date);
$stmt->execute();
$result = $stmt->get_result();

$appointment = [];
while ($row = $result->fetch_assoc()) {
  $appointment[] = $row;
}

echo json_encode($appointment);
$conn->close();
?>
