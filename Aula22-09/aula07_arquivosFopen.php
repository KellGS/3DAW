<!DOCTYPE html>
<html>
    <body>
        <?php
            echo "Alunos <br>";
            $arquivo = fopen("alunosImp.csv", "r") or die("Não consegui abrir, deu erro");
            echo fread($arquivo, filesize("alunosImp.csv"));
            fclose($arquivo);
        ?>
    </body>
</html>