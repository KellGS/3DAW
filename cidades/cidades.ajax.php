<?php

	$servername = "localhost";
	$username = "3daw";
	$password = "mysql123";
	$dbname = "pop";

	//Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}	


	$cidades = array();

	$sql = mysqli_query($conn, "SELECT cod_cidades, nome FROM cidades WHERE estados_cod_estados = '".$_GET['cod_estados']."' ORDER BY nome ");

	while ($row = mysqli_fetch_assoc($sql) ) {
		$cidades[] = array(
			'cod_cidades'	=> $row['cod_cidades'],
			'nome'			=> $row['nome'],
		);
	}

	echo( json_encode( $cidades ) );

?>