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
		<style>

			table, th, td {
				border: 1px solid black;
			}
			td{
				text-align: center;
			}
			a{
				text-decoration: none;
			}
            button{
                color: black;
                background-color: white;
            }
		</style>
	</head>
	
	<body>
		<h1>Alterar Aluno</h1>
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
									<td><a href="update.php?update_id=<?php echo $linha['mat']; ?>">Update</a></td>
                                    <td><a href="delete.php?delete_id=<?php echo $linha['mat']; ?>">Delete</a></td>
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
	<button><a href="listadados.php">Ver todos os dados</a></button>
	<button><a href="buscaForm.html">Voltar</a></button>
	</body>
</html>