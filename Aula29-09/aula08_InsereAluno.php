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
    
    $sql = "INSERT into Alunos(mat, nome, cpf, datanasc) values (123, 'José da Silva', '12345678910', '2000-04-12')";
    if ($conn->query($sql) === TRUE){
        echo "Dados inseridos na tabela";
    }
    else{
        echo "Erro na inserção";
    }

    $conn->close();
?>