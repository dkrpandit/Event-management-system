<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Retrieve database credentials
$server = "localhost";
$username = "pandit";
$password = "DharmP1234$";
$dbname = "pbl";

// Create connection
$conn = new mysqli($server, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from login form
    $user = $_POST['Username'];
    $pass = $_POST['Password2'];

    // Prepare SQL statement to check if username and password are correct
    $stmt = $conn->prepare("SELECT * FROM Registration WHERE Username = ? AND Password2 = ?");
    $stmt->bind_param("ss", $user, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

    // If user exists and password is correct, log them in
    if ($result->num_rows == 1) {
        // Start session and set user ID
        session_start();
        // $row = $result->fetch_assoc();
        // $_SESSION['user_id'] = $row['id'];
        // Redirect to home page
        header('Location: home.html');
    } else {
        // Invalid username or password
        echo "Invalid username or password";
    }

    $stmt->close();
}

$conn->close();
?>
