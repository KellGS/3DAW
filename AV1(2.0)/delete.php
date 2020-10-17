<?php 
    $servername = "localhost";
    $username = "3daw";
    $password = "mysql123";
    $dbname = "3dawtest";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    if(isset($_GET['delete_id'])){
        $mat = $_GET['delete_id'];
        $query = "DELETE FROM Alunos WHERE mat = '$mat'";
        $r = $conn->query($query);
        
        if($r){
            header("location:listadados.php");
        }else{
            echo "<scritp>alert('Desculpe, não foi possível excluir!')</script>";
        }
    }
    
    $conn->close();
?>