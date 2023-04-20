<?php

// $FirstName = $_POST['FirstName'];
// $LastName = $_POST['LastName'];
// $Branch = $_POST['Branch'];
// $Username = $_POST['Username'];
// $Password = $_POST['Password'];
// $email = $_POST['email'];
// $contactNo = $_POST['contactNo'];


// // Database connection
// $conn = new mysqli('localhost', 'pandit', 'DharmP1234$', 'Registration');
// if ($conn->connect_error) {
//     die('Connection Failed : ' . $conn->connect_error);
// } else {
//     $stmt = $conn->prepare("insert into Registration(Username,FirstName,LastName,Branch,Password,email,contactNo)
//     values(?,?,?,?,?,?,?)");
//     $stmt->bind_param("ssssssi",$Username,$FirstName,$LastName,$Branch,$Password,$email,$contactNo );
//     $stmt->execute();
//     echo "Registrations successfully.....";
//     $stmt->close();
//     $conn->close();
// }

// <?php
// $insert = false;
// if(isset($_POST['name'])){
    // Set connection variables
    $server = "localhost";
    $username = "pandit";
    $password = "DharmP1234$";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    echo "Success connecting to the db";
        $Username = $_POST['Username'];
        $FirstName = $_POST['FirstName'];
        $LastName = $_POST['LastName'];
        $Branch = $_POST['Branch'];
        $Password = $_POST['Password'];
        $email = $_POST['email'];
        $contactNo = $_POST['contactNo'];



   $sql=  "INSERT INTO `pbl`.`Registration` (`Username`, `FirstName`, `LastName`, `Branch`, `Password`, `email`, `contactNo`) VALUES ('$Username', '$FirstName', '$LastName', '$Branch', '$Password', '$email', '$contactNo',current_timestamp())";

//    echo $sql;
        if($con->query($sql) == true){
            echo "Successfully inserted";
    
            // Flag for successful insertion
            // $insert = true;
        }
        else{
            echo "ERROR: $sql <br> $con->error";
        }
    
        // Close the database connection
        $con->close();


//     // Collect post variables
//     $name = $_POST['name'];
//     $gender = $_POST['gender'];
//     $age = $_POST['age'];
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     $desc = $_POST['desc'];
//     $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
//     // echo $sql;
//    // $s = $conn->prepare("insert into Registration(Username,FirstName,LastName,Branch,Password,email,contactNo)
//     //     values(?,?,?,?,?,?,?)");
//     //     $stmt->bind_param("ssssssi",$Username,$FirstName,$LastName,$Branch,$Password,$email,$contactNo );

//     // Execute the query
//     if($con->query($sql) == true){
//         // echo "Successfully inserted";

//         // Flag for successful insertion
//         $insert = true;
//     }
//     else{
//         echo "ERROR: $sql <br> $con->error";
//     }

//     // Close the database connection
//     $con->close();
// }
// ?>
?>