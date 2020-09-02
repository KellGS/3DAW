<html>
	<body>
	<?php
		$nome = $_POST["nome"];
		$idade = $_POST["idade"];
		$email = $_POST["email"];
		$senha = $_POST["senha"];
		$formValido = 0;
		
		if (valida_texto($nome)) {
			$formValido = 1;
		} else {
			echo "nome invalido";
		}
		
		echo "<br>";
		if (valida_inteiro($idade)) {
			$formValido = 1;
		} else {
			$formValido = 0;
			echo "idade invalida";
		}
		
		if (valida_email($email)) {
			$formValido = 1;
		} else {
			$formValido = 0;
			echo "email invalido";
		}
		
		if (valida_senha($senha)) {
			$formValido = 1;
		} else {
			$formValido = 0;
			echo "senha invalida";
		}
		
		if ($formValido == 1) {
			echo "Olá ".$nome;
			echo "<br>";
			echo "Sua  idade é ".$idade;
		} else {
			echo "<br>";
			echo "Formulario com erro";
			echo "<br>";
			echo "Preencha Corretamente Por Favor";
		}
		
		
		function valida_texto($texto) {
			$textoVal = str_replace(' ','',$texto);
		
			if ($texto != "" and ctype_alpha($textoVal)) {
				return true;
			}
			return false;
		}
		function valida_inteiro($inteiro) {
			if ($inteiro == "")  {
				return false;
			} elseif (!ctype_digit($inteiro)) {
				return false;
			}
			if ($inteiro < 18) {
				return false;
			}
			return true;
		}
		function valida_email($email) {
			if ($email == "")  {
				return false;
			}
			return true;
		}
		function valida_senha($senha) {
            if (!ctype_alnum($senha)
                    and ctype_punct($senha)
                    or strlen($senha) < 8 
                    or ctype_upper($senha)
                    or ctype_lower($senha)){
                return false;
			}
			return true;
		}
	?>
	</body>
</html>