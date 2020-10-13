<?php 
include 'connection.php';
if(isset($_GET['delete_id'])){
    $mat = $_GET['delete_id'];
    $query = mysqli_query($con, "DELETE FROM Alunos WHERE mat = '$mat'");
    if($query){
    header("location:index.php");
    }else{
    echo "Sorry delete query not work!";
    }
}

 ?>