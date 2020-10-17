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
<html>
	<head>
		<title>Busca de Aluno</title>
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
		<h1>Busca de Aluno</h1>
			<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST") {	
				$mat = $_POST["mat"];
                $sql = "SELECT mat, nome, cpf, datanasc FROM Alunos where mat = '$mat'"; 
				$resultado = $conn->query($sql);

				?>
				<table width="100%" >
					<thead>
						<tr>
							<th>Matricula</th>
							<th>Nome</th>
							<th>CPF</th>
							<th>Data de Nascimento</th>
							<th>Update</th>
							<th>Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($resultado->num_rows > 0) {
							while ($linha = mysqli_fetch_assoc($resultado)) {
								?>
								<tr>
									<td><?php echo $linha['mat']; ?></td>
									<td><?php echo $linha['nome']; ?></td>
									<td><?php echo $linha['cpf']; ?></td>
                                    <td><?php echo $linha['datanasc']; ?></td>
									<td><a class="update" href="update.php?update_id=<?php echo $linha['mat']; ?>">Update</a></td>
                                    <td><a class="delete" href="delete.php?delete_id=<?php echo $linha['mat']; ?>">Delete</a></td>
								</tr>
								<?php
							}
						}else {
							echo "<script>alert('Aluno não encontrado!')</script>";
						}?>
					 </tbody>
				</table> <?php
			}else{
					echo "<script>alert('Método Errado!')</script>";
			}
			?>

		<?php $conn->close();?>
	<a href="buscaForm.html">Voltar</a>
	</body>
</html>