<?php
	$nome = $_GET["nome"];
	$idade = $_GET["idade"];
	$erro = "";
	if (!valida_texto($nome)) {
		$erro = "Nome com valor invalido";
	}
	echo "<br>";
	if (!valida_inteiro($idade)) {
		$erro = "Idade com valor invalido";
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
<?php if ($erro == "") { ?>
	<h1>Olá <?php echo $nome ?> </h1>
	<h3>Sua idade é <?php echo $idade ?></h3>
<?php } else { ?>
		<p> Formulario com erro: <?php echo $erro ?> </p>
<?php } ?>	
</body>
</html>