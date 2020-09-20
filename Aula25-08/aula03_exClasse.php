<!DOCTYPE html>
<html>
<body>
<?php
class Aluno {
	public $nome;
	public $idade;
	
	function Aluno() {
		$this->nome = "Jose";
		$this->idade = 23;
	}
	function get_nome() {
		return $this->nome;
	}
	function get_idade() {
		return $this->idade;
	}
}	

$aluno1 = new Aluno();

echo $aluno1->get_nome();
echo "<br>";
echo $aluno1->get_idade();	
	
?>

</body>
</html> 