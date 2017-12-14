<?php

$servername = "classroom.cs.unc.edu";
$username = "thrisha";
$password = "comp426";
$dbname = "thrishadb";
$getUser = $_POST['username'];
$getPassword = $_POST['password'];
$getSwipes = $_POST['swipes'];

// Create db connection
$conn = new mysqli($servername, $username, $password, $dbname);
    

$sql = "UPDATE login_info SET swipes='$getSwipes' WHERE (username LIKE '$getUser') AND (password LIKE '$getPassword')";

mysqli_query($conn, $sql);

?>