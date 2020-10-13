<?php include "connection.php";
if(isset($_POST['update'])){
  $mat = $_POST['mat'];
  $nome = $_POST['nome'];
  $cpf = $_POST['cpf'];
  $datanasc = $_POST['datanasc'];
  
  $query = mysqli_query($con, "UPDATE ALunos SET  nome = '$nome' , cpf = '$cpf', datanasc = '$datanasc' WHERE mat = '$mat'");
  if ($query) {
    header("location:index.php");
  }else{
    echo "Sorry update query not work";
  }
}
 ?>
<!DOCTYPE html>
<html>
<head>
 <title>Atualizando</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top: 70px;">
 <div class="row justify-content-center">
  <div class="col-md-10 text-center">
   <?php

  if(isset($_GET['update_id'])): ?>
  <?php $id = $_GET['update_id']; ?>
  <?php $query = mysqli_query($con, "SELECT * FROM students WHERE id = '$id' ");
  $r = mysqli_fetch_array($query);
  $nome = $r['nome'];
  $cpf = $r['cpf'];
  $datanasc = $r['datanasc'];
   ?>
    <form method="POST" action="update.php">
        <div class="form-group">
          <input type="text" name="nome" class="form-control" placeholder="Nome..." required="" value="<?php echo $nome; ?>">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="text" name="cpf" class="form-control" placeholder="CPF..." required="" value="<?php echo $cpf; ?>">
        </div><!-- form-group -->
        <div class="form-group">
          <input type="text" name="datanasc" class="form-control" placeholder="Data de Nascimento..." required="" value="<?php echo $datanasc; ?>">
        </div><!-- form-group -->
        <input type="hidden" name="edit_id" value="<?php echo $mat; ?>">
        <div class="form-group">
          <input type="submit" name="update" class="btn btn-info" value="Edit Student">
        </div><!-- form-group -->
       </form><!-- form -->
<?php endif; ?>



  </div><!-- col -->
 </div><!-- row -->
</div><!-- container -->


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
</body>

</html>
