<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$insert=false;
$server = "localhost";
$username = "pandit";
$password = "DharmP1234$";
$dbname = "pbl";
// Create a database connection
$con = mysqli_connect($server, $username, $password, $dbname);
// Check for connection success
if (!$con) {
    die("connection to this database failed due to" . mysqli_connect_error());
}
// echo "Success connecting to the db";
$Username = $_POST['Username'];
$FirstName = $_POST['FirstName'];
$LastName = $_POST['LastName'];
$Branch = $_POST['Branch'];
$year = $_POST['year'];
$Password2 = $_POST['Password2'];
$email = $_POST['email'];
$contactNo = $_POST['contactNo'];
$sql =  "INSERT INTO `pbl`.`Registration` (`Username`, `FirstName`, `LastName`, `Branch`,`year`, `Password2`, `email`, `contactNo`,`DateTime`) VALUES ('$Username', '$FirstName', '$LastName', '$Branch','$year', '$Password2', '$email', '$contactNo',current_timestamp())";

// echo $sql;


if ($con->query($sql) == true) {
   // echo "Successfully inserted";

    // Flag for successful insertion
    $insert = true;
} else {
    echo "ERROR: $sql <br> $con->error";
}
$con->close();

    if($insert==true)
      {
        echo "<small class='success'>Registration is successfully please go back to home page and join respective events</small> <br>";
      }
    else{
        echo "Please inter your information agin";
      }
?>