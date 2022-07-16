<?php session_start(); 
include ("./conection/dbcon.php"); 
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Editar estudante</title>
</head> 

<body> 
    <div class="container mt-5">

        

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Vizualizar detalhes do estudante</h4>
                        <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                    </div>


                    <div class="card-body">

                        <?php
                            if(isset($_GET['id']))
                            {
                                $student_id = mysqli_real_escape_string($con,$_GET['id']);
                                $query = "SELECT * FROM students WHERE ID='$student_id'";
                                $query_run = mysqli_query($con,$query);

                                if(mysqli_num_rows($query_run) > 0 )
                                {
                                    $student = mysqli_fetch_array($query_run);
                                    ?>

                            <div class="mb-3">
                                <label for="">Nome do estudante</label>
                                <p class="form-control">
                                    <?=$student['username']?>" 
                                </p>    
                            
                            </div>

                            <div class="mb-3">
                                <label for="">E-mail do estudante</label>
                                <p class="form-control">
                                    <?=$student['email']?>" 
                                </p>                                </div>

                            <div class="mb-3">
                                <label for="">Telefone do estudante</label>
                                <p class="form-control">
                                    <?=$student['phone']?>" 
                                </p>                  
                            </div>

                            <div class="mb-3">
                                <label for="">Curso do estudante</label>
                                <p class="form-control">
                                    <?=$student['course']?>" 
                                </p>                  
                            </div>

                        

                        <?php
                                }
                                else 
                                {
                                    echo "<h4> No such id found </h4>";
                                }
                            }
                        
                        ?>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>