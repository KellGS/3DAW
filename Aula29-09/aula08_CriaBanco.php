<?php 
    $servername = "localhost";
    $username = "3daw";
    $password = "mysql123";

    //Create connection
    $conn = new mysqli($servername, $username, $password);

    //Check connection
    if($conn->connect_error){
        die("Connection failed: " .$conn->connect_error);
    }
    
    $sql = "CREATE DATABASE 3dawTest";
    if ($conn->query($sql) === TRUE){
        echo "Banco criado";
    }
    else{
        echo "Erro na criação do banco";
    }

    $conn->close();
?>