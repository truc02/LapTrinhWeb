<?php
include('../connectDB/connectDB.php'); // Make sure this file sets up $conn correctly
$error="";
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $fullName = $_POST['registerName'] ?? '';
    $userName = $_POST['registerUsername'] ?? '';
    $email = $_POST['registerEmail'] ?? '';
    $password = $_POST['registerPassword'] ?? '';
    $repeatPassword = $_POST['registerRepeatPassword'] ?? '';

    // Check if passwords match
    if ($password !== $repeatPassword) {
        $error = "Error: Passwords do not match!";
        exit();
    }

    $checkUser = "SELECT * FROM user WHERE username = '$userName' or email ='$email'";
    $result = $conn->query($checkUser);
    if(mysqli_num_rows($result)>0){
        $error ="User or email already exits "; 
        exit();
    }

    $user_id = random_int(10,100);

    // Prepare SQL query with correct variables
    $sql = "INSERT INTO user (user_id, tenkh, username, password, email) 
            VALUES ('$user_id', '$fullName', '$userName', '$password', '$email')";

    // Execute query and check for successx`
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
