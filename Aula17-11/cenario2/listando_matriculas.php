<?php

require 'conexao.php';
?>   
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <div class="voltar"><a href="../index.html">Voltar</a></div>
    <section class="content">
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {		
	$idDisciplina = $_POST["idDisciplina"];
    
?>   
<table>
  <tr>
    <th>Aluno</th>
    <th>Matrícula</th>
    <th>Disciplina</th>
    <th>Se matricular</th>
  </tr>
<?php		
	$sql = "SELECT aluno, mat, disciplina FROM aluno_disciplina WHERE aprovado = " . 1 . " AND idDisciplina = " . $idDisciplina; 
	$resultado = $conn->query($sql);
	
	if ($resultado->num_rows > 0) {

		while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "<tr>";
            echo "<td>" . $linha["mat"] . "</td>";
            echo "<td>" . $linha["aluno"] . "</td>";
            echo "<td>" . $linha["disciplina"] . "</td>";
            echo "<td>" . "<form method='POST' action='matricula.php'><input type='hidden' name='mat' value=".$linha["mat"].">"."<input type='hidden' name='aluno' value=".$linha["aluno"].">"."<input type='hidden' name='disciplina' value=".$linha["disciplina"].">"."<input type='hidden' name='idTurma' value=".$idTurma.">"."<input type='hidden' name='idDisciplina' value=".$idDisciplina.">"."<input type='submit' value='Matricular-se'>"."</form>"."</td>";
            echo "</tr>";
		}

	} else {
		echo "Houve algum erro! Parece que não temos alunos cadastrados";
    }		
    
$conn->close();
?>
</table>
<?php
}
?>
</section>
</body>
</html>
