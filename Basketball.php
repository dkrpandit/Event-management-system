<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Basketball</title>
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="CSS/login.css">
    <script src="JavaScript/login.js"></script>
</head>

<body>
    <a href="https://www.isquareit.edu.in/" target="_blank"> <img class="head12" src="images/i2it.png" alt=""></a>
    <header>
        <nav class="navbar">
            <ul>
                <li>
                    <a href="home.html">Home</a>
                </li>
                <li>
                    <a href="About.html">About</a>
                </li>
                <li>
                    <h1 class="nav1">Event management system</h1>`
                </li>
                <!-- <li>
                    <a class="login" href="Login.php">Login</a>
                </li> -->
            </ul>
        </nav>
    </header>
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] != "POST" || isset($_POST['Username']) && isset($_POST['Password2'])) {
            // Display the login form
            ?>
            <form action="Basketball.php" class="form1" method="post" id="form1">
                <h1>Join as</h1>
                <input type="text" id="username" name="Username" placeholder="Username">
                <br>
                <input type="password" id="password" name="Password2" placeholder="Password">
                <br>
                <button class="loginb" type="submit">Join</button>
            </form>
            <div class="create">
                <small>New to I2IT ? <a href="Registration.php">create an account</a></small>
            </div>
        <?php } ?>
        <div id="message">
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
                    // Retrieve user data
                    $userData = $result->fetch_assoc();
                
                    // Close the statement
                    $stmt->close();
                
                    // Check if the user is already joined in Basketball events
                    $checkStmt = $conn->prepare("SELECT * FROM Basketball WHERE Username = ?");
                    $checkStmt->bind_param("s", $userData['Username']);
                    $checkStmt->execute();
                    $checkResult = $checkStmt->get_result();
                
                    if ($checkResult->num_rows > 0) {
                        echo '<div class="error">You have already joined the Basketball events.</div>';
                    } else {
                        // Prepare the insert statement for the Basketball table
                        $insertStmt = $conn->prepare("INSERT INTO `pbl`.`Basketball` (`Username`, `FirstName`, `LastName`, `Branch`, `Year`, `Password2`, `Email`, `ContactNo`, `DateTime`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");
                        $insertStmt->bind_param("ssssssss", $userData['Username'], $userData['FirstName'], $userData['LastName'], $userData['Branch'], $userData['year'], $userData['Password2'], $userData['email'], $userData['contactNo']);
                        $insertStmt->execute();
                
                        // Close the insert statement
                        $insertStmt->close();
                
                        echo '<div class="success">You have joined the Basketball events successfully.</div>';
                    }
                } else {
                    echo '<div class="error">Invalid username or password</div>';
                } 
            }
             $conn->close();
            ?>
        </div>
    </div>
</body>
</html>