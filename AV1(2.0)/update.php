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
    if(isset($_POST['update'])){
        $mat = $_POST['mat'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $datanasc = $_POST['datanasc'];

        $sql = "UPDATE Alunos SET  nome = '$nome' , cpf = '$cpf', datanasc = '$datanasc' WHERE mat = '$mat'";
        $resultado = $conn->query($sql);
        if ($resultado) {
            header("location:listadados.php");
        }else{
            echo "Desculpa, não foi possível atualizar!";
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Atualizando</title>
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
                left: 35%;
                margin-top: 18%;
            }
            h1{
				text-align: center;
				color: #008B8B;
			}
            form{
                text-align: center;
            }
            .input{
                padding: 5px;
                padding-top: 3.4px;
                font-size: 17px;
                font-family: 'Montserrat', sans-serif;
                color:#4682B4;
                background-color: #B0E0E6;
                border-radius: 3px;
                border: 2px solid #4682B4;
                padding: 5px;
                text-decoration: none;
                margin-top: 10px;
            }
            .input:hover{
                background-color:#6495ED;
            }
        </style>
    </head>
    <body>
        <?php
        if(isset($_GET['update_id'])): ?>
            <?php $mat = $_GET['update_id']; ?>
            <?php 
                $s = "SELECT mat, nome, cpf, datanasc FROM Alunos where mat = '$mat'"; 
                $res = $conn->query($s);
                if ($res->num_rows > 0) {
                    while ($linha = mysqli_fetch_assoc($res)) {

                        $nome = $linha['nome'];
                        $cpf = $linha['cpf'];
                        $datanasc = $linha['datanasc'];
                    }
                }
                ?>
                <div class="container">
                    <h1>Atualizando Dados</h1>
                    <form method="POST" action="update.php">
                    
                        <input type="text" name="nome" placeholder="Nome..." required="" value="<?php echo $nome; ?>">
                    
                    
                        <input type="text" name="cpf" placeholder="CPF..." required="" value="<?php echo $cpf; ?>">
                    
                    
                        <input type="date" name="datanasc" placeholder="Data de Nascimento..." required="" value="<?php echo $datanasc; ?>">
                    
                        <input type="hidden" name="mat" value="<?php echo $mat; ?>">
                        <br>
                        <input class="input" type="submit" name="update" value="Atualizar">
                    
                    </form><!-- form -->
                </div>

            <?php 
                
        endif;
        ?>
    </body>
</html>