<?php

$servername = "classroom.cs.unc.edu";
$username = "thrisha";
$password = "comp426";
$dbname = "thrishadb";
$getUser = $_GET['username'];
$getPassword = $_GET['password'];

// Create db connection
$conn = new mysqli($servername, $username, $password, $dbname);
    
$sql = "SELECT * FROM login_info WHERE (username LIKE '$getUser') AND (password LIKE '$getPassword')";

$returnObject = mysqli_query($conn, $sql); //gets the row from database

$row = mysqli_fetch_assoc($returnObject); //converts to array
$jsonReturn =json_encode($row); //converts to JSON


echo $jsonReturn;
?>