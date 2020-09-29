<?php 
    $servername = "localhost";
    $username = "3daw";
    $password = "mysql123";

    $conn = new mysqli($servername, $username, $password);

    if($conn->connect_error){
        die("Connection failed: " .$conn->connect_error);
    }
    echo "Connected successfully";

    $conn->close();
?>