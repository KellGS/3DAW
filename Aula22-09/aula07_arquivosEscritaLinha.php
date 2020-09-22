<!DOCTYPE html>
<html>
    <body>
        <?php
            echo "Alunos Exportação <br>";
            $arquivoSaida = fopen("alunosExportacao.txt", "w")or die("Nao consegui abrir, deu erro");
            $linha = "matricula;nome;endereco;cep;cidade;estado;cpf;datanascimento\n";
            fwrite($arquivoSaida, $linha);
            $linha = "20201123456;Kelly;rua das marrecas s/n;20031120;Rio de Janeiro;RJ;12345678910;02041998\n";
            fwrite($arquivoSaida, $linha);
            $linha = "20201654321;Thales;Rua Clarimundo de Melo 857;21033120;Rio de Janeiro;RJ;98765432110;15072000
            \n";
            fwrite($arquivoSaida, $linha);
            fclose($arquivoSaida);
        ?>
    </body>
</html>