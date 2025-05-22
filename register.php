<?php
$host = "localhost";
$dbname = "db1";
$username = "root";
$password = "";

$firstName = $_POST['firstName'] ?? '';
$lastName = $_POST['lastName'] ?? '';
$age = $_POST['age'] ?? '';
$sex = $_POST['sex'] ?? '';
$phoneNumber = $_POST['phoneNumber'] ?? '';
$password_raw = $_POST['password'] ?? '';

if (empty($firstName) || empty($lastName) || empty($age) || empty($sex) || empty($phoneNumber) || empty($password_raw)) {
    die("Please fill out all required fields.");
}

$password_hashed = password_hash($password_raw, PASSWORD_DEFAULT);

// Connect to database
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute statement
$stmt = $conn->prepare("INSERT INTO user (firstName, lastName, age, sex, phoneNumber, password) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssisss", $firstName, $lastName, $age, $sex, $phoneNumber, $password_hashed);

if ($stmt->execute()) {
    // Show confirmation page
    echo '
    <!DOCTYPE html>
    <html>
    <head>
        <title>Registration Successful</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                text-align: center;
                padding-top: 100px;
            }
            .container {
                background: #fff;
                padding: 40px;
                border-radius: 10px;
                display: inline-block;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }
            .btn {
                padding: 10px 20px;
                font-size: 16px;
                margin-top: 20px;
                background-color: #28a745;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                text-decoration: none;
            }
            .btn:hover {
                background-color: #218838;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Registration Successful!</h2>
            <p>Your account has been created successfully.</p>
            <a href="login.php" class="btn">Continue to Login</a>
        </div>
    </body>
    </html>';
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();

header("Location: sign-in.html?registered=1");
exit();

?>
