<?php

$host = "localhost";
$dbname = "db1";
$username = "root";
$password = "";

// Connect to DB
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Check users table
    $query = "SELECT * FROM user WHERE phoneNumber='$username'";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_type'] = 'user';
            $_SESSION['phoneNumber'] = $row['phoneNumber'];
            $_SESSION['full_name'] = $row['full_name']; // ✅ Store user's full name
            header("Location: patientdashboard.html");
            exit();
        }
    }

    // Check doctors table
    $query = "SELECT * FROM doctor WHERE user_name='$username'";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_type'] = 'doctor';
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['full_name'] = $row['full_name']; // ✅ Store doctor's full name
            header("Location: doctor-interface.html");
            exit();
        }
    }

    // Check admins table
    $query = "SELECT * FROM admin WHERE userName='$username'";
    $result = mysqli_query($conn, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_type'] = 'admin';
            $_SESSION['userName'] = $row['userName'];
            $_SESSION['full_name'] = $row['full_name']; // ✅ Store admin's full name
            header("Location: admindashboard.php"); // ← make this a PHP page so you can echo the name
            exit();
        } else {
            echo "Wrong password.";
        }
    } else {
        echo "Admin user not found.";
    }

    echo "Invalid username or password.";
}
?>
