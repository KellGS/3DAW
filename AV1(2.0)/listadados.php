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
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Listagem de Dados dos Alunos</title>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
		<style>
			body{
                background-color: #008B8B;
                font-family: 'Montserrat', sans-serif;
            }
			h1{
				text-align: center;
				color: #F0F8FF;
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
			.update{
				color:#FF8C00;
                background-color:#FFFF00;
                border-radius: 3px;
                border: 2px solid #FFD700;
                padding: 5px;
                text-decoration: none;
                margin-top: 10px;
				margin: 5px;
			}
			.update:hover{
				background-color: #F0E68C;
			}
			.delete{
				color:#FAEBD7;
                background-color: #FF6347;
                border-radius: 3px;
                border: 2px solid #B22222;
                padding: 5px;
                text-decoration: none;
                margin-top: 10px;
				margin: 5px;
			}
			.delete:hover{
				background-color: #FFA07A;
			}
			a{
                color:#2F4F4F;
                background-color: #F0F8FF;
                border-radius: 3px;
                border: 2px solid #2F4F4F;
                padding: 5px;
                text-decoration: none;
				margin: 5px;
				margin-left: 45%;
            }
            
            a:hover{
                background-color:#6495ED;
            }
		</style>
	</head>
	
	<body>
        <h1>Listagem de Dados dos Alunos</h1>
        <table width="100%">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Data de Nascimento</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = "SELECT * FROM Alunos";
                    $result = $conn->query($query);

                    if($result->num_rows > 0)
                        while($r = mysqli_fetch_assoc ($result)):
                ?>
                <tr>
                    <td><?php echo $r['nome']; ?></td>
                    <td><?php echo $r['cpf']; ?></td>
                    <td><?php echo $r['datanasc']; ?></td>
                </tr>
                <?php 
                    endwhile;
                ?>
            </tbody>
        </table>
        <a href="index.html">Voltar</a>
        <?php $conn->close();?>
	</body>
</html>