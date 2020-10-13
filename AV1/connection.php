<?php
$servername = "localhost";
$username = "3daw";
$password = "mysql123";
$dbname = "";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
?>