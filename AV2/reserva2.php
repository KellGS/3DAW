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

    $cod_agencia = $_GET['cod_agencia'];

	$sqli = "SELECT cod_carro FROM ac WHERE cod_agencia='$cod_agencia' ";

    $resp = mysqli_query($conn, $sqli);

    $l = array();

    while ($row = mysqli_fetch_assoc($resp)) {
        
        array_push($l, $row['cod_carro'] );
    }

    $li = array();
    foreach($l as $cod_carro) {
        $sql = "SELECT cod_carro, modelo FROM carro WHERE cod_carro='$cod_carro'";
        $res = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($res)) {
            $carro = array (
                'cod_carro'  => $row['cod_carro'],
                'modelo'      => $row['modelo'],
            );
            array_push($li, $carro);
        }
    }
    echo( json_encode( $li ) );
?>