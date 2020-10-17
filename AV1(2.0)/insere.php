<!DOCTYPE html>
<html>
    <head>
        <title>Insere Aluno</title>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
        <style>
            body{
                background-color: #008B8B;
                font-family: 'Montserrat', sans-serif;
            }
            .container{
                background-color: #F0F8FF;
                border: 2px solid #ADD8E6;;
                border-radius: 8px;
                padding: 20px;
                text-align: center;
                position: absolute;
                left: 38%;
                margin-top: 15%;
            }
            input{
                margin: 10px;
            }
            a, .input{
                color:#4682B4;
                background-color: #B0E0E6;
                border-radius: 3px;
                border: 2px solid #4682B4;
                padding: 5px;
                text-decoration: none;
                margin-top: 10px;
            }
            .input{
                
                padding: 5px;
                padding-top: 3.4px;
                font-size: 17px;
                font-family: 'Montserrat', sans-serif;
            }
            a:hover, .input:hover{
                background-color:#6495ED;
            }
        </style>
    </head>
    <body>
    <?php

        $servername = "localhost";
        $username = "3daw";
        $password = "mysql123";
        $dbname = "3dawtest";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if(isset($_POST['submit'])){
            $mat = $_POST['mat'];
            $nome = $_POST['nome'];
            $cpf = $_POST['cpf'];
            $datanasc = $_POST['datanasc'];
            
            $sql = mysqli_query($conn, "INSERT INTO Alunos (mat, nome, cpf, datanasc) VALUES ('$mat', '$nome','$cpf', '$datanasc')");
            if($sql){
                echo "<script>alert('O registro do aluno foi inserido com sucesso!')</script>";
            }else{
                echo "<script>alert('Desculpe, ocorreu um erro!')</script>";
            }
        }

    ?>
    <div class="container">
        <h1>Inserindo Aluno</h1>
        <form method="POST" action="">
            Matrícula: <input type="text" name="mat" placeholder="Entre com a matrícula...">
            <br>
            Nome: <input type="text" name="nome" placeholder="Entre com o nome...">
            <br>
            CPF: <input type="text" name="cpf" placeholder="Entre com o CPF..." >
            <br>
            Data de Nascimento<input type="date" name="datanasc">
            <br>
            <input class="input" type="submit" name="submit" value="Inserir Aluno">
            <a href="index.html">Voltar</a>
        
        </form>
    </div>
    <?php $conn->close();?>
</body>
</html>