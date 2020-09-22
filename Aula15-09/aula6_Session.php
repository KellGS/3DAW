<?php
	session_start();
?>
<html>
<body>
<?php	
	$erro = "";
	$nomeUsuario = "";
	$senha = "";
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$nomeUsuario = $_POST["nomeUsuario"];
		$idade = $_POST["senha"];
		echo "Olá " . $nomeUsuario;
		$_SESSION["nomeUsuario"] = $nomeUsuario;
	} else {
?>
		<form action="aula6_Session.php" method="POST">
		Nome de usuario: <input type="text" name="nomeUsuario">
		<br>
		senha: <input type="password" name="senha">
		<br>
		<input type="submit">
		</form>
<?php
	}
?>	
</body>
</html>