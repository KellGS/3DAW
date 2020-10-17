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
		<style>

			table, th, td {
				border: 1px solid black;
			}
			td{
				text-align: center;
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
        <button><a href="index.html">Voltar</a></button>
        <?php $conn->close();?>
	</body>
</html>