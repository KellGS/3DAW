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
    //seleciona os dados da tabela produto
    $queryalu = "SELECT mat, nome, cpf, data_nasc FROM alunos";
    $result = $conn->query($queryalu);
    
    // abaixo montamos um formulário em html
    // e preenchemos o select com dados
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
			h1{
				text-align: center;
				color: #;
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
                margin-top: 5%;
            }
            table{
                margin-left: auto;
                margin-right: auto;
            }
			table, th, td {
				border: 1px solid black;
				background-color: #F0F8FF;
				margin-bottom: 10px;
				color: #008080;
			}
			td{
				text-align: center;
				padding: 10px;
			}
			.inscricao{
				color: #008080;
                background-color: #48D1CC;
                border-radius: 3px;
                border: 2px solid #008080;
                padding: 5px;
                text-decoration: none;
                margin-top: 10px;
				margin: 5px;
			}
			.inscricao:hover{
				background-color: #7FFFD4;
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
            <h1>Alunos</h1>
            <table width="80%" >
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Disciplina</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($linha = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $linha['nome']; ?></td>
                                <td><a class="inscricao" href="inscricao.php?inscricao=<?php echo $linha['mat']; ?>">Solicitar Inscrição</a></td>
                            </tr>
                            <?php
                        }
                    }else {
                        echo "<script>alert('Aluno não encontrado!')</script>";
                    }?>
                    </tbody>
            </table>
            <a class="botao" href="../index.html">Voltar</a>
        <div>
    </body>
</html>        