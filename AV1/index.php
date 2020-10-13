<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
  </head>
  <body>
    <div class="container" style="margin-top: 70px;">
      <div class="row justify-content-center">
        <div class="col-md-10 text-center">
          <?php
            include "connection.php";
            if(isset($_POST['submit'])){
              $nome  = $_POST['nome'];
              $cpf = $_POST['cpf'];
              $datanasc = $_POST['datanasc'];

              $Query = mysqli_query($con, "INSERT INTO Alunos (nome, cpf,datanasc) VALUES ('$nome','$cpf', '$datanasc')");
              if($Query){
                echo "Student record is successfully inserted!";
              }else{
                echo "Sorry an error occured!";
              }

            }

          ?>
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Record
          </button>

          <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="">
                    <div class="form-group">
                      <input type="text" name="nome" class="form-control" placeholder="Nome..." required="">
                    </div><!-- form-group -->
                    <div class="form-group">
                      <input type="text" name="cpf" class="form-control" placeholder="CPF..." required="">
                    </div><!-- form-group -->
                    <div class="form-group">
                      <input type="date" name="datanasc" class="form-control" required="">
                    </div><!-- form-group -->
                    <div class="form-group">
                      <input type="submit" name="submit" class="btn btn-info" value="Add Student">
                    </div><!-- form-group -->
                  </form><!-- form -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
          <table id="example" class="table table-striped table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Update</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $Show = mysqli_query($con, "SELECT * FROM Alunos");
                if($Show === False){
                while($r = mysqli_fetch_assoc ($Show)):
              ?>
                <tr>
                  <td><?php echo $r['nome']; ?></td>
                  <td><?php echo $r['cpf']; ?></td>
                  <td><?php echo $r['datanasc']; ?></td>
                  <td><a href="update.php?update_id=<?php echo $r['mat']; ?>" class="btn btn-warning">
                  Update
                  </a></td>
                  <td><a href="delete.php?delete_id=<?php echo $r['mat']; ?>" class="btn btn-danger">
                  Delete
                  </a></td>
                </tr>
                <?php endwhile;
                mysqli_close($con);?>
            </tbody>
          </table>
        </div><!-- col -->
      </div><!-- row -->
    </div><!-- container -->


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
    } );
    </script>
  </body>
</html>