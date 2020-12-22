<?php 
    $servername = "localhost";
    $username = "3daw";
    $password = "mysql123";
    $dbname = "av2";

    //Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Check connection
    if($conn->connect_error){
        die("Connection failed: " .$conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {		
        $date = $_POST['date'];
        $p = $_POST['p'];
        $nome = $_POST['nome'];
        $cpf = $_POST['cpf'];
        $cod_carro = $_POST['cod_carro'];
        $cod_agencia = $_POST['cod_agencia'];
        $cod_cidade = $_POST['cod_cidade'];
        $data = date('Y-m-d', strtotime("+$p days", strtotime($date)));

        $cli = "SELECT cod_cliente FROM cliente WHERE cpf='$cpf'";

        $res = mysqli_query($conn, $cli);

        $cod_cliente = mysqli_fetch_assoc($res)['cod_cliente'];

        $sql = "INSERT INTO reserva (cod_cidade, cod_agencia, cod_carro, cod_cliente, tempo_aluguel, data_retirada, data_devolucao) VALUES  ('" . $cod_cidade . "', '" . $cod_agencia . "', '" . $cod_carro . "', '" . $cod_cliente . "', '" . $p . "', '". $date. "', '".$data."')"; 

        /*if ($conn->query($sql) === TRUE) {
            echo "Registro Inserido";
        } else {
            echo "Erro!";
        }*/
    } else {
        echo "Método errado";
    }       

    $query = "SELECT cod_carro, preco FROM carro WHERE cod_carro='$cod_carro'";

    $result = $conn->query($query);

    if($result->num_rows > 0)
        while($r = mysqli_fetch_assoc ($result)):
    ?>
            <?php $car = $r['preco'] *  $p;?>
            <?php $valor = $r['preco'];
            $total = number_format($car, 2, ',', ' ');
            $diaria = number_format($valor, 2, ',', ' ');
            $x = $car/2;
            $xx = $car/3;
            $zx = number_format($x, 2, ',', ' ');
            $zxx = number_format($xx, 2, ',', ' ');

            ?>
        <?php 
            endwhile;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Falls Car</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <style type="text/css">
        body{
            font-family: 'Montserrat', sans-serif;
            background-color: #3CB371;
        }
        h2, h3{
            text-align: center;
        }
        table, th, td{
            background-color: #F0FFFF;
            border: 1px solid;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
        }
        #container{
            width: 50%;
            background-color: #E0FFFF;
            border: 2px solid;
            border-radius: 8px;
            padding: 20px;
            position: absolute;
            left: 25%;
            margin-top: 10%;
        }
        input, select{
            margin-top: 10px;
            font-family: 'Montserrat', sans-serif;

        }
        label{
            padding-left: 10%;
        }
        .button {
            font-family: 'Montserrat', sans-serif;
            border-radius: 4px;
            background-color: #3CB371;
            padding: 8px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            margin-left: 40%;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div id="container">
        <h2>Falls Car</h2>
        <h3>Pagamento</h3>
       
        <form action="index.php" method="">
            <table style="width:80%">
            <tr>
                <th>Cliente</th>
                <th>Data da Retirada</th>
                <th>Data de Devolução</th>
                <th>Diária</th>
                <th>Valor Total</th>
            </tr>
            <tr>
                <td><?php echo $nome ?></td>
                <td><?php echo implode('/', array_reverse(explode('-', $date))) ?></td>
                <td><?php echo implode('/', array_reverse(explode('-', $data))) ?></td>
                <td><?php echo  'R$'.$diaria ?></td>
                <td><?php echo  'R$'.$total ?></td>
            </tr>
            </table>

            <br>
            
            <label>Numero do cartão: </label><input type="text" id="numero" name="numero">
            <br>
            <label>Data de Validade: </label><input type="text" id="validade" name="validade">
            <br>
            <label>Nome do dono do cartão: </label><input type="text" id="dono" name="dono">
            <br>
            <label>Código de segurança: </label><input type="text" id="codigo" name="codigo">
            <br>
            <label>Selecione o número de parcelas:</label>
            <select name="vezes" id="vezes">
                <option value="">-- Selecione --</option>
                <option value="1">Preço à vista </option>
                <option value="2">Em 2x de <?php echo $zx; ?></option>
                <option value="3">Em 3x de <?php echo $zxx;?></option>
			</select>
            <br>
            <input type="submit" class="button" onclick="myFunction()" value="Confirmar Pagamento">
            <script>
            function myFunction() {
            alert("Reserva realizada com sucesso!");
            }
            </script>

        </form>
    </div>
</body>
</html>