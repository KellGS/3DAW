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
        $dbname = "banco_exemplo";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if(isset($_POST['submit'])){
            $aluno = $_POST['aluno'];
            $disciplina = $_POST['disciplina'];
            $idTurma = $_POST['idTurma'];
            $mat = $_POST['mat'];
            
            $sql = mysqli_query($conn, "INSERT INTO aluno_inscrito (aluno, disciplina, idTurma, mat) VALUES ('$aluno', '$disciplina', '$idTurma', '$mat')");
            if($sql){
                echo "<script>alert('O registro do aluno foi inserido com sucesso!')</script>";
            }else{
                echo "<script>alert('Desculpe, ocorreu um erro!')</script>";
            }
        }

        $query = "SELECT * FROM aluno_inscrito";
        $result = $conn->query($query);

        if($r = mysqli_fetch_assoc ($result)):

    ?>
    <div class="container">
        <h1>Inserindo Aluno</h1>
        <form method="POST" action="">
            <!--Matrícula: <input type="text" name="mat" placeholder="Entre com a matrícula...">
            -->
            Matrícula: <?php echo $r['mat']; ?>
            <br>
            Nome: <?php echo $r['aluno']; ?>
            <br>
            Turma: <?php echo $r['idTurma']; ?>
            <br>
            Disciplina: <?php echo $r['disciplina']; ?>
            <br><br>
            <a href="../index.html">Voltar</a>
            <?php 
                    endif;
                ?>
        </form>
    </div>
    <?php $conn->close();?>
</body>
</html>