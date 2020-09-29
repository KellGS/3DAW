<?php 

    $servername = "localhost";
    $username = "3daw";
    $password = "mysql123";
    $dbname = "3dawtest";

    //Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Check connection
    if($conn->connect_error){
        die("Connection failed: " .$conn->connect_error);
    }
    
    $sql = "CREATE TABLE Alunos(
        mat int(6) PRIMARY KEY,
        nome varchar(100) not null,
        cpf varchar(11) not null,
        datanasc date not null
    )";
    if ($conn->query($sql) === TRUE){
        echo "Tabela criado";
    }
    else{
        echo "Erro na criação da tabela";
    }

    $conn->close();
?>