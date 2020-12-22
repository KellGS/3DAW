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
			h2{
				text-align: center;
			}
			#container{
				width: 30%;
				background-color: #E0FFFF;
				border: 2px solid;
				border-radius: 8px;
				padding: 20px;
				position: absolute;
				left: 35%;
				margin-top: 18%;
			}
			input{
				margin-bottom: 5px;
				font-family: 'Montserrat', sans-serif;

			}
			select{
				margin-bottom: 5px;
				border-radius: 4px;
				font-family: 'Montserrat', sans-serif;
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
				margin-top: 10px;
			}
		</style>
	</head>
	<body>
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
		?>

		<div id="container">
			<h2>Falls Car</h2>

			<form action="form.php" method="POST">
				<label for="cod_cidade">Cidade:</label>
				<select name="cod_cidade" id="cod_cidade">
					<option value="">-- Escolha a cidade --</option>
				<?php
						$res = mysqli_query( $conn, "SELECT cod_cidade, nome FROM cidades ORDER BY nome ");
						while ( $row = mysqli_fetch_assoc( $res ) ) {
							echo '<option value="'.$row['cod_cidade'].'">'.$row['nome'].'</option>';
						}
				?>
				</select>

				<br>

				<label for="cod_agencia">Agência:</label>
				<select name="cod_agencia" id="cod_agencia">
					<option value="">-- Escolha a agência --</option>
				</select>	
				
				<br>

				<label for="cod_carro">Carro:</label>
				<select name="cod_carro" id="cod_carro">
					<option value="">-- Escolha o carro --</option>
				</select>

				<br>

				Nome: <input type="text" id="nome" name="nome"> <br>
				CPF: <input type="text" id="cpf" name="cpf"> <br>
				
				<label>Período de Locação:</label>
				<select name="p" id="p">
					<option value="">-- Escolha o período --</option>
					<option value="7">7 dias</option>
					<option value="15">15 dias</option>
					<option value="30">30 dias</option>
				</select>	<br>

				<label >Data da Reserva:</label>
				<input type="date" id="date" name="date">
				<br>
				<input type="submit" class="button">
			</form>
		<div>

		<script type="text/javascript">
			const cidadesSelect = document.querySelector('#cod_cidade');
			const agenciaSelect = document.querySelector('#cod_agencia');
			const carroSelect = document.querySelector('#cod_carro');

			cidadesSelect.addEventListener('change', e => {
				const option = document.createElement('option');
				agenciaSelect.innerHTML = '';
				option.innerText = '-- Escolha a agência --'
				option.value = '';
				agenciaSelect.appendChild(option);

				fetch(`./reserva.php?cod_cidade=${e.target.value}`,{method:'GET'})
				.then(dados => dados.json()) //descodifica a resposta
				.then(dados => {
					
					dados.forEach(e=>{
						const option = document.createElement('option');
						option.innerText = e.nome;
						option.value = e.cod_agencia;
						agenciaSelect.appendChild(option);
					})
				}) // exibi a resposta
				.catch(err => console.log(err));
			});

			agenciaSelect.addEventListener('change', e => {
				fetch(`./reserva2.php?cod_agencia=${e.target.value}`,
				{method: 'GET'})
				.then(dados => dados.json())
				.then(dados => {
					carroSelect.innerHTML ='';
					dados.forEach(e=>{
						const option = document.createElement('option');
						option.innerText = e.modelo;
						option.value = e.cod_carro;
						carroSelect.appendChild(option);
					})
				})
				.catch(err => console.log(err));
			});
			
		</script> 
</body>

</html>