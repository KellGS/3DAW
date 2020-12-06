<!DOCTYPE html>
<html>
	<head>
		<title>Populando selects de cidades e estados com AJAX (PHP e jQuery)</title>
		<style type="text/css">
			*, html {
				font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
				margin: 0px;
				padding: 0px;
				font-size: 12px;
			}

			a {
				color: #0099CC;
			}

			body {
				margin: 10px;
			}
			.carregando{
				color:#666;
				display:none;
			}
		</style>
	</head>
	<body>
		<?php
			$servername = "localhost";
			$username = "3daw";
			$password = "mysql123";
			$dbname = "pop";

			//Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
		
			//Check connection
			if($conn->connect_error){
				die("Connection failed: " .$conn->connect_error);
			}
		?>
		<label for="cod_estados">Estado:</label>
		<select name="cod_estados" id="cod_estados">
			<option value="">-- Escolha um estado --</option>
			<?php
				$res = mysqli_query( $conn, "SELECT cod_estados, sigla FROM estados ORDER BY sigla ");
				while ( $row = mysqli_fetch_assoc( $res ) ) {
					echo '<option value="'.$row['cod_estados'].'">'.$row['sigla'].'</option>';
				}
			?>
		</select>

		<label for="cod_cidades">Cidade:</label>
		<select name="cod_cidades" id="cod_cidades">
		<option value="">-- Escolha uma cidade --</option>
		</select>	

		<script type="text/javascript">
			const estadosSelect = document.querySelector('#cod_estados');
			const cidadesSelect = document.querySelector('#cod_cidades');
			estadosSelect.addEventListener('change', e => {
				fetch(`./cidades.ajax.php?cod_estados=${e.target.value}`,{method:'GET'})
				.then(dados => dados.json()) //descodifica a resposta
				.then(dados => {
					cidadesSelect.innerHTML = '';
					dados.forEach(e=>{
						const option = document.createElement('option');
						option.innerText = e.nome;
						cidadesSelect.appendChild(option);
					})
					console.log()
				}) // exibi a resposta
				.catch(err => console.log(err));
			});
			
		</script>
	</body>
</htm>