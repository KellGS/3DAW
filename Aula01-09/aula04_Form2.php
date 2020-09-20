<html>
<body>
<?php
	$nome = $_GET["nome"];
	$idade = $_GET["idade"];
	
	if (valida_texto($nome)) {
		echo "Ola ".$nome;
	}
	
	echo "<br>";
	if (valida_inteiro($idade)) {
		echo "Sua  idade é ".$idade;
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
</body>
</html>