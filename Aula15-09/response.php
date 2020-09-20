<?php

    session_start();
    error_reporting(E_ALL);
    include "funcoes.php";

    $nome = $senha = "";
    $message = "";
    $status = false;
    $voltar = false;

    if(isset($_POST["nome"]) and isset($_POST["senha"])){
        $nome = valida_nome($_POST["nome"]);
        $senha = valida_senha($_POST["senha"]);	
    }

    if($nome and $senha){
        
        $_SESSION["nome"] = $nome;
        
        if(valida_sessao($_SESSION["nome"]) !== false){
            $message = valida_sessao($_SESSION["nome"]);
            $status = true;
            
        }else{
            $message = "Faça o login, por favor!";
            $voltar = true;
        }	
        
    }else{
        $message = "Não permitido!";
        $voltar = true;
    }
?>
<!DOCTYPE html>
<html>
    <head>        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Resposta</title>
    </head>
    <body>	
		<article>
			<header>
			<?php 
				echo "<p>". $message."</p>"; 
				if($status){				
			?>			
				
			<form method="post"><button type="submit" name="logoff">Sair</button></form>	
			
			<?php } 
				
				if(isset($_POST["logoff"])){
					logoff();
				}				
			?>
				
				
			<?php 
				 
				if($voltar){				
			?>			
				
			<form method="post"><button type="submit" name="voltar">Voltar</button></form>
			
			<?php } 
				
				if(isset($_POST["voltar"])){
					voltar();
				}				
			?>
					
			</header>	
		</article>	
	</body>
</html>