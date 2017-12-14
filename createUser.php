<?php


$servername = "classroom.cs.unc.edu";
$username = "thrisha";
$password = "comp426";
$dbname = "thrishadb";
$newUser = $_POST['username'];
$newPassword = $_POST['password'];
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$email = $_POST['email'];
$swipes = $_POST['swipes'];


// Create db connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Check to make sure user doesn't already exist
$check_username = mysqli_query($conn, "SELECT * FROM login_info WHERE username =
    '$newUser'");

    
if (mysqli_num_rows($check_username) == 0) { 

    $sql = "INSERT INTO login_info (username, password, first_name, last_name, email, swipes) VALUES ('$newUser', '$newPassword', '$firstName', '$lastName', '$email', '$swipes')";
    
    if ($conn->query($sql) === TRUE) {
        echo "User created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $sql2 = "INSERT INTO users (username, password) VALUES ('$newUser', '$newPassword')";
    $conn->query($sql2);

    }
else { print 'Choose a different username';}





?>