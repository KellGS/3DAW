<!DOCTYPE html>
<html>
<body>
<?php
	$texto = "Meu texto em php";
	echo $texto;
	$idade = 25;
	$idade2 = 33;
	echo "<br>";
	echo strlen($texto);
	echo "<br>";
	echo str_word_count($texto);
	echo "<br>";
//	strrev();   //reverte sentido
//	strpos();	//procura um texto
//	str_replace(); // troca caracteres
	echo strrev($texto);
	echo "<br>";
	echo strpos($texto, "eu");
	echo "<br>";
	echo str_replace("Meu", "Seu", $texto); 
	echo "<br>";
	
//	$txt1 = (string)$idade;
	var_dump($idade);
	echo "<br>";
	echo $texto . $idade;
	echo "<br>";
	echo "minha idade é " . $idade2;
	echo "<br>";
	$x = "12" + $idade;
	echo $x;
?>

</body>
</html> 