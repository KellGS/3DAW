<!DOCTYPE html>
<html>
    <body>
        <?php
            echo "Alunos <br>";
            $arquivo = fopen("alunosImp.csv", "r") or die("Não consegui abrir, deu erro");
            do{
                echo fgets($arquivo);
                echo "<br>";
            }
            while(!feof($arquivo))

        
        ?>
    </body>
</html>