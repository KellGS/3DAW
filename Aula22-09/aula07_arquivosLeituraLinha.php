<!DOCTYPE html>
<html>
    <body>
    <?php	
	echo "Alunos <br>"; 
	$arquivo = fopen("alunosImp.csv","r") or die("Nao consegui abrir, deu erro");
	echo fgets($arquivo);
	echo "<br>";
	echo fgets($arquivo);
	echo "<br>";
	echo fgets($arquivo);
	echo "<br>";
	echo fgets($arquivo);
	if (feof($arquivo))
		echo "Final de arquivo";
	fclose($arquivo);
?>	
    </body>
</html>