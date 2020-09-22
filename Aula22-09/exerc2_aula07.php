<!DOCTYPE html>
<html>
    <body>
        <?php
            echo "Pessoa <br>";
            $arquivoSaida = fopen("pessoa.txt", "w")or die("Nao consegui abrir, deu erro");

            echo"Escrevendo no arquivo...";
            echo"<br>";
            echo"<br>";

            $linha = "nome;endereco;cep;cidade;estado;cpf;datanascimento\n";
            fwrite($arquivoSaida, $linha);
            $linha = "Kelly;Rua Cap.Teixeira, 382;20031120;Rio de Janeiro;RJ;12345678910;02041998\n";
            fwrite($arquivoSaida, $linha);
            $linha = "Thales;Travessa Leonor, s/n;21033120;Rio de Janeiro;RJ;98765432110;15072000;
            \n";
            fwrite($arquivoSaida, $linha);
            fclose($arquivoSaida);

            $arquivo = fopen("pessoa.txt", "r") or die("Não consegui abrir, deu erro");
           
            echo"Lendo arquivo...";
            echo"<br>";
            do{
                echo fgets($arquivo);
                echo "<br>";
            }
            while(!feof($arquivo));
        ?>
    </body>
</html>