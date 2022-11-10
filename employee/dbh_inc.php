<?php
// This code is for database connection

$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "majetsco";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>