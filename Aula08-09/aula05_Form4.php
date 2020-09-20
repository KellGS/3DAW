<?php
	$erro = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (!empty($_SESSION["nome"])) {
			echo $_SESSION["nome"];
		}
		if (empty($_POST["nome"])) {
			$erro = "Nome é obrigatório. <br>";
		} else {
			$nome = $_POST["nome"];
			$_SESSION["nome"] = "jose@gmail.com";
		}
		if (empty($_POST["idade"])) {
			$erro = $erro . "Idade é obrigatorio.";
		} else {
			$idade = $_POST["idade"];
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
<form action="aula05_form4.php" method="POST">
Nome: <input type="text" name="nome">
<br>
Idade: <input type="text" name="idade">
<br>
<input type="submit">
</form>
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($erro == "") { ?>
		<h1>Olá <?php echo $nome ?> </h1>
		<h3>Sua idade é <?php echo $idade ?></h3>
		<p> usuario da sessao: <?php echo $_SESSION["nome"] ?> </p>
<?php } else { ?>
		<p> Formulario com erro: <?php echo $erro ?> </p>
<?php } } ?>	
</body>
</html>