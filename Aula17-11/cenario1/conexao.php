<?php 

    //estabelecemos conexão com o banco de dados
    $servername = "localhost";
    $username = "3daw";
    $password = "mysql123";

    //Create connection
    $conn = new mysqli($servername, $username, $password);

    //Check connection
    if($conn->connect_error){
        die("Connection failed: " .$conn->connect_error);
    }
    //criamos o banco de dados através do script php
    $sql = "CREATE DATABASE IF NOT EXISTS banco_exemplo";
    /*if ($conn->query($sql) === TRUE){
        echo "Banco criado";
    }
    else{
        echo "Erro na criação do banco";
    }*/

?>
<?php

    $servername = "localhost";
    $username = "3daw";
    $password = "mysql123";
    $dbname = "banco_exemplo";

    //Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Check connection
    if($conn->connect_error){
        die("Connection failed: " .$conn->connect_error);
    }
    //criamos a tabela no banco de dados
    $sqla = "CREATE TABLE IF NOT EXISTS alunos (
    mat INT(6) AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    data_nasc DATE NOT NULL,
    PRIMARY KEY(mat)
    )";

    /*if ($conn->query($sqla) === TRUE){
        echo "Tabela alunos criada";
    }
    else{
        echo "Erro na criação da tabela alunos";
    }*/

    $sqld = "CREATE TABLE IF NOT EXISTS disciplinas (
    id INT(11) AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    PRIMARY KEY(id)
    )";

    /*if ($conn->query($sqld) === TRUE){
        echo "Tabela disciplinas criada";
    }
    else{
        echo "Erro na criação da tabela disciplinas";
    }*/

    $sqlt = "CREATE TABLE IF NOT EXISTS turmas (
    id INT(11) AUTO_INCREMENT,
    turno VARCHAR(100) NOT NULL,
    PRIMARY KEY(id)
    )";

    /*if ($conn->query($sqlt) === TRUE){
        echo "Tabela turmas criada";
    }
    else{
        echo "Erro na criação da tabela turmas";
    }*/

    $sqlad = "CREATE TABLE IF NOT EXISTS aluno_disciplina (
    mat INT(6) NOT NULL,
    idDisciplina INT(11) NOT NULL,
    aprovado INT(1) NOT NULL,
    disciplina VARCHAR(100) NOT NULL,
    aluno VARCHAR(100) NOT NULL,
    )";

    /*if ($conn->query($sqlad) === TRUE){
        echo "Tabela aluno_disciplina criada";
    }
    else{
        echo "Erro na criação da tabela aluno_disciplina";
    }*/
    
    $sqlai = "CREATE TABLE IF NOT EXISTS aluno_inscrito (
    mat INT(6) NOT NULL,
    idTurma INT(11) NOT NULL,
    aluno VARCHAR(100) NOT NULL,
    disciplina VARCHAR(100) NOT NULL,
    )";

    /*if ($conn->query($sqai) === TRUE){
        echo "Tabela aluno_inscrito criada";
    }
    else{
        echo "Erro na criação da tabela aluno_inscrito";
    }*/
?>