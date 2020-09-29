<!DOCTYPE html>
    <html>
    <?php 
        $erro = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
                $mat = $_POST["mat"];
                $nome = $_POST["nome"];
                $idade = $_POST["idade"];
                $end = $_POST["end"];
                $cep = $_POST["cep"];
                $cidade = $_POST["cidade"];
                $estado = $_POST["estado"];
                $cpf = $_POST["cpf"];
                $datanasc = $_POST["datanasc"];
                
                $arquivoSaida = fopen("alunos.txt", "w") /*fopen("alunos.txt", "a")*/  or die("Nao consegui abrir, deu erro");
                $linha = "Matricula; Nome; Idade; Endereço; CEP; Cidade; Estado; CPF; Data de Nascimento\n";
                fwrite($arquivoSaida, $linha);
                $linha = $mat . ";" . $nome . ";" . $idade . ";" . $end . ";" . $cep . ";" . $cidade . ";" . $estado . ";" . $cpf . ";" . $datanasc;
                fwrite($arquivoSaida, $linha);
                fclose($arquivoSaida);
        }
        
    ?>
        <body>
            <form action="aula08_GravaAluno.php" method="POST">
            Matrícula: <input type="text" name="mat">
            <br>
            Nome: <input type="text" name="nome">
            <br>
            Idade: <input type="text" name="idade">
            <br>
            Endereço: <input type="text" name="end">
            <br>
            CEP: <input type="text" name="cep">
            <br>
            Cidade: <input type="text" name="cidade">
            <br>
            Estado: <input type="text" name="estado">
            <br>
            CPF: <input type="text" name="cpf">
            <br>
            Data de Nascimento: <input type="text" name="datanasc">
            <br>
            <input type="submit">
        </body>
    </html>