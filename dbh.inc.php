<?php
// This code is for database connection

$serverName = "127.0.0.1:3306";
$dBUsername = "root";
$dBPassword = "";
$dBName = "majetsco";
// Cconnection
$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);
// Check Connection
if(!$conn){
    // die("Connection failed: " . mysqli_connect_error());
    header('location: index.php?error=dbconnect-failed');
}