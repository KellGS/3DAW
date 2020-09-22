<!DOCTYPE html>
<html>
    <body>
        <?php
            echo "Alunos <br>";
            $arquivo = fopen("alunosImp.csv", "r") or die("Não consegui abrir, deu erro");
           
             while(!feof($arquivo)){
                echo fgets($arquivo);
                echo "<br>";
            }
        
        ?> 
    
    </body>
</html>