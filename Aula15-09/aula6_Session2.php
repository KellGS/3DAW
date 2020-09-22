<?php
	session_start();
?>
<html>
<body>
<?php	
	echo "Meu nome é " . $_SESSION["nomeUsuario"];
?>	
</body>
</html>