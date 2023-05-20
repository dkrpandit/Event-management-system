<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                    <h1 class="nav1">Event management system</h1>
                </li>
                <!-- <li>
                    <a class="login" href="Login.php">Login</a>
                </li> -->
            </ul>
        </nav>
    </header>
    <div class="container">
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
                header('Location: home.html');
            } else {
                echo '<div class="error">Invalid username or password</div>';
            }

            $stmt->close();
        }

        $conn->close();
        ?>
        <form action="Login.php" class="form1" method="post" id="form1">
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

    </div>
</body>

</html>