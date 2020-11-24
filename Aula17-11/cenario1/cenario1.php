<?php
   $servername = "localhost";
   $username = "3daw";
   $password = "mysql123";
   $dbname = "banco_exemplo";

   // Cria conexão
   $conn = new mysqli($servername, $username, $password, $dbname);

   // Checa conexão
   if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
   }
    //seleciona os dados das tabelas
    $query = "SELECT * FROM alunos";
    $resultado = $conn->query($query);

    $querydis = "SELECT * FROM disciplinas";
    $res = $conn->query($querydis);

    $queryt = "SELECT * FROM turmas";
    $r = $conn->query($queryt);
    
    // abaixo montamos um formulário em html
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Matricula</title>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
		<style>
			body{
                background-color: #48D1CC;
                font-family: 'Montserrat', sans-serif;
            }
            select{
                margin-bottom: 5px;
                border-radius: 3px;
                border: 1px solid #008080;
                font-family: 'Montserrat', sans-serif;
            }
            h2{
                text-align: center;
            }
            .container{
                background-color: #F0F8FF;
                width: 50%;
                margin-left: auto;
                margin-right: auto;
                padding-top: 20px;
                padding-left: 10px;
                padding-bottom: 20px;
                border-radius: 5px;
                margin-top: 20%;
            }
            .botao{
                color: #008080;
                background-color: #48D1CC;
                border-radius: 3px;
                border: 2px solid #008080;
                padding: 5px;
                text-decoration: none;
                margin-left: 45%;
            }   
            .botao:hover{
                background-color:#7FFFD4;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h2>Seleção de Turma</h2>
            <form method="post" action="matricula.php">
                <label>Selecione o nome:</label>
                <select>
                    <option>Selecione...</option>
                        <?php while($alu = mysqli_fetch_assoc($resultado)) { ?>
                    <option value="<?php echo $alu['mat'] ?>"><?php echo $alu['nome'] ?></option>
                        <?php }?>
                </select>
                <br><br>
                <label>Selecione a disciplina:</label>
                <select>
                    <option>Selecione...</option>
                        <?php while($dis = mysqli_fetch_assoc($res)) { ?>
                    <option value="<?php echo $dis['id'] ?>"><?php echo $dis['nome'] ?></option>
                        <?php }?>
                </select>
                <br><br>
                <label>Selecione a turma:</label>
                <select>
                    <option>Selecione...</option>
                        <?php while($t = mysqli_fetch_assoc($r)) { ?>
                    <option value="<?php echo $t['id'] ?>"><?php echo $t['turno'] ?></option>
                        <?php }?>
                </select>
                <br>
            <input class="botao" type="submit" value="Enviar">
            </form>
            
        </div>
    </body>
</html>        