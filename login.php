<?php
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

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare and execute the query to check if the user exists
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row["password"])) {
            // Start the session and set the user as logged in
            session_start();
            $_SESSION["username"] = $username;
            header("Location: dashboard.php");
        } else {
            // Invalid password
            $error = "Invalid password";
        }
    } else {
        // User does not exist
        $error = "User does not exist";
    }
}
?>