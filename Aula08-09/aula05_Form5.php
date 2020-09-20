<?php
	$erro = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$n1 = 1;
		while ($n1 <  3) {
			echo $n1;
			echo ", ";
			$n1++;
		}
		echo "<br>";
		$n1 = 1;
		do {
			echo $n1;
			echo ", ";
			$n1++;
		} while ($n1 <  3);
		echo "<br>";
		for($n2=0; $n2 <= 3; $n2++) {
			echo $n2;
			echo ", ";
		}
		$alunos = array("jose", "joao", "maria", "filomena");
		echo "<br>";
		foreach ($alunos as $aluno) {
			echo $aluno;
			echo "<br>";
		}

	}
	function valida_texto($texto) {
		if ($texto != "") {
			return true;
		}
		return false;
	}
	function valida_inteiro($inteiro) {
		if ($inteiro == "") {
			return false;
		}
		return true;
	}
?>
<html>
<body>
<form action="aula05_form5.php" method="POST">
Nome: <input type="text" name="nome">
<br>
Idade: <input type="text" name="idade">
<br>
<input type="submit">
</form>
	
</body>
</html>