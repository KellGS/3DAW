<?php

	$servername = "localhost";
	$username = "3daw";
	$password = "mysql123";
	$dbname = "av2";

	//Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}	

	$cod_cidade = $_GET['cod_cidade'];

	$sql = "SELECT cod_agencia, nome FROM agencia WHERE cod_cidade='$cod_cidade' ORDER BY nome";

	$res = mysqli_query($conn, $sql);

	$lista = array(); //salvar os resultados

	while ($row = mysqli_fetch_assoc($res)) {
		$agencia = array (
			'cod_agencia'  => $row['cod_agencia'],
			'nome'      => $row['nome'],
		);
		array_push($lista, $agencia);
	}

	echo( json_encode( $lista ) );
?>
