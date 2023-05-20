<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$insert = false;
$usernameTaken = false; // Add a new variable to track if the username is already taken

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form has been submitted
    $server = "localhost";
    $username = "pandit";
    $password = "DharmP1234$";
    $dbname = "pbl";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password, $dbname);

    // Check for connection success
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Prepare the SQL statement to check if the username already exists
    $checkStmt = mysqli_prepare($con, "SELECT * FROM `Registration` WHERE `Username` = ?");
    mysqli_stmt_bind_param($checkStmt, "s", $_POST['Username']);
    mysqli_stmt_execute($checkStmt);

    // Check if the username already exists
    if (mysqli_stmt_fetch($checkStmt)) {
        $usernameTaken = true;
    } else {
        // Prepare the SQL statement for inserting the new user
        $insertStmt = mysqli_prepare($con, "INSERT INTO `pbl`.`Registration` (`Username`, `FirstName`, `LastName`, `Branch`,`year`, `Password2`, `email`, `contactNo`,`DateTime`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");

        // Bind the parameters
        $username = isset($_POST['Username']) ? $_POST['Username'] : '';
        $firstName = isset($_POST['FirstName']) ? $_POST['FirstName'] : '';
        $lastName = isset($_POST['LastName']) ? $_POST['LastName'] : '';
        $branch = isset($_POST['Branch']) ? $_POST['Branch'] : '';
        $year = isset($_POST['year']) ? $_POST['year'] : '';
        $password2 = isset($_POST['Password2']) ? $_POST['Password2'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $contactNo = isset($_POST['contactNo']) ? $_POST['contactNo'] : '';

        mysqli_stmt_bind_param($insertStmt, "ssssssss", $username, $firstName, $lastName, $branch, $year, $password2, $email, $contactNo);

        // Execute the statement
        if (mysqli_stmt_execute($insertStmt)) {
            $insert = true;
        }

        // Close the insert statement
        mysqli_stmt_close($insertStmt);
    }

    // Close the check statement and the database connection
    mysqli_stmt_close($checkStmt);
    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Head content -->
    <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration</title>
  <link rel="stylesheet" href="CSS/home.css">
  <link rel="stylesheet" href="CSS/Registration.css">
  <script src="JavaScript/Registration.js"></script>
</head>

<body>
    <!-- HTML body content -->
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
        <li>
          <a class="login" href="Login.php">Login</a>
        </li>
      </ul>
    </nav>
  </header>
  <div class="container">
    <?php
    if ($insert == true) {
        echo '<div class="success">Registration is successful. Please go back to the home page and join respective events.</div><br>';
    } elseif ($usernameTaken) {
        echo '<div class="error">Username is already taken. Please choose a different username.</div><br>';
    }
    ?>

    <!-- Rest of the HTML content -->
    <form action="Registration.php" method="post" id="contact_form" onsubmit="return validateForm()">
      <legend>
        <h2><b>Registration Form</b></h2>
      </legend><br>

      <div class="username6">
        <label class="usernameL">Username</label>
        <input placeholder="Username" class="usernamei" type="text" name="Username" id="username">
      </div><br>

      <div class="username3">
        <label class="firstNameL">First Name</label>
        <input placeholder="First Name" class="FirstNamei" type="text" name="FirstName" id="firstName">
      </div><br>
      <div class="lastName3">
        <label class="last_nameL">Last Name</label>
        <input placeholder="Last Name" class="form-control" type="text" name="LastName" id="lastName">
      </div><br>

      <div class="branch3">
        <label class="branchL">select your branch</label>
        <select name="Branch" id="branch">
          <option value="">--Please select--</option>
          <option value="IT">IT</option>
          <option value="CS">CS</option>
          <option value="E&TC">E&TC</option>
        </select>
      </div><br>
      <div class="year3">
        <label class="yearL">which year</label>
        <select name="year" id="year">
          <option value="">--Please select--</option>
          <option value="1st">1st</option>
          <option value="2nd">2nd</option>
          <option value="3rd">3rd</option>
          <option value="4th">4th</option>
        </select>
      </div><br>
      <div class="password3">
        <label class="passwordL">Password</label>
        <input placeholder="Password" class="form-control" type="password" name="Password2" id="password">
      </div><br>

      <div class="conformPassword3">
        <label class="confirm_passwordL">Confirm Password</label>
        <input name="confirm_password" placeholder="Confirm Password" class="form-control" type="password" id="confirmPassword">
      </div><br>

      <div class="email3">
        <label class="emailL">E-Mail</label>
        <input placeholder="E-Mail Address" class="form-control" type="text" name="email" id="email">
      </div><br>

      <div class="contactNo3">
        <label class="contactL">Contact No.</label>
        <input placeholder="+91" class="form-control" type="text" name="contactNo" id="contactNo">
      </div><br>

      <div class="button3">
        <button class="submitb" type="submit">SUBMIT </button>
      </div>
    </form>
  </div>
</body>

</html>
