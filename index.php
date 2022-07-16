<?php
session_start();
include('./conection/dbcon.php');
?>


<!doctype html>
<html lang="en">

<?php include('./includes/header.php')?>

<body>
  <div class="container mt-4">

    <?php include("./message.php") ?>

    <div class="row">
      <div class="cold-md-12">
        <div class="card">
          <div class="card-header">
            <h4>Detalhes do estudante
              <a href="student-create.php" class="btn btn-primary float-end">Adiocinar estudante</a>
            </h4>
          </div>

          <div class="card-body">

            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Estudante Nome</th>
                  <th>Email</th>
                  <th>Telefone</th>
                  <th>Course</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                <?php
                $query = "SELECT * FROM students";
                $query_run = mysqli_query($con, $query);

                if (mysqli_num_rows($query_run) > 0) {
                  foreach ($query_run as $students) {
                ?>

                    <tr>
                      <td><?= $students['id']; ?></td>
                      <td><?= $students['username']; ?></td>
                      <td><?= $students['email']; ?></td>
                      <td><?= $students['phone']; ?></td>
                      <td><?= $students['course']; ?></td>
                      <td>
                        <a href="student-view.php?id=<?= $students['id']; ?>" class="btn btn-info btn-sm">Visualizar</a>
                        <a href=" student-edit.php?id=<?= $students['id']; ?>" class="btn btn-success btn-sm">Editar</a>
                        <form action="code.php" method="POST" class="d-inline">
                          <button href="submit" name="delete_student" value="<?= $students['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                        </form>


                      </td>

                    </tr>
                <?php
                  }
                } else {
                  echo "<h5> No Record Found </h5>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>



  <?php include('./includes/footer.php')?>
  