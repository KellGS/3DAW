<!DOCTYPE html>
<html>
    <head>
        <title>Insere Aluno</title>
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
        <input type="submit" name="submit" value="Inserir Aluno">
        <button><a href="index.html">Voltar</a></button>
    
    </form>
    <?php $conn->close();?>
</body>
</html>