<?php
// This code is for database connection

$serverName = "127.0.0.1:3306";
$dBUsername = "root";
$dBPassword = "";
$dBName = "majetsco";

$conn = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}