

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


if ($_SERVER["REQUEST_METHOD"] == "POST") {		
	$mat = $_POST["mat"];
	$aluno = $_POST["aluno"];
    $disciplina = $_POST["disciplina"];
    $idTurma = $_POST["idTurma"];
    $idDisciplina = $_POST["idDisciplina"];
    
    $mat = filter_input(INPUT_POST,"mat",FILTER_SANITIZE_SPECIAL_CHARS);
    $aluno = filter_input(INPUT_POST,"aluno",FILTER_SANITIZE_SPECIAL_CHARS);
    $disciplina = filter_input(INPUT_POST,"disciplina",FILTER_SANITIZE_SPECIAL_CHARS);

    if($mat && $aluno && $disciplina){
    $sql = "UPDATE aluno_disciplina SET aprovado = '2' WHERE mat = '$mat' AND idDisciplina = '$idDisciplina'";
    
    if($conn->query($sql) === TRUE){
        echo "<h1>Sucesso ao se matricular!</h1"
    }else{
        echo "Erro: ".$conn->error;
    }
}
    $conn->close();
    require 'conexao.php';


	$sql = "INSERT into aluno_inscrito (mat, aluno, disciplina, idTurma) 
	values (" . $mat . ", '" . $aluno . "', '" . $disciplina . "', '" . $idTurma .  "')";
	if ($conn->query($sql) === TRUE) {
		echo "<h1>Aluno Matriculado com Sucesso</h1>";
	} else {
		echo "<h1>Algo deu errado<h1>";
    }
    
} else {
	echo "<h1>Algo deu errado<h1>";
}		
$conn->close();

?>
</section>
</body>
</html>