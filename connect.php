<?php
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
$Password = $_POST['Password'];
$email = $_POST['email'];
$contactNo = $_POST['contactNo'];
$sql =  "INSERT INTO `pbl`.`Registration` (`Username`, `FirstName`, `LastName`, `Branch`, `Password`, `email`, `contactNo`,`DateTime`) VALUES ('$Username', '$FirstName', '$LastName', '$Branch', '$Password', '$email', '$contactNo',current_timestamp())";

// echo $sql;


if ($con->query($sql) == true) {
    echo "Successfully inserted";

    // Flag for successful insertion
    // $insert = true;
} else {
    echo "ERROR: $sql <br> $con->error";
}

?>