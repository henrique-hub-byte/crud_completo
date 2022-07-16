<?php 
    session_start();
    /* require 'dbcon.php'; */
     include ("./conection/dbcon.php"); 
    /* require (" ./conection/dbcon.php "); */


    if(isset($_POST['delete_student']))
    {
        $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

        $query = "DELETE FROM students WHERE id='$student_id'";
        $query_run = mysqli_query($con, $query);

        if($query_run){
            $_SESSION['message'] = "student deleted Successfully";
            header("Location: index.php");
            exit(0);
        }
        else 
        {
            $_SESSION['message'] = "Student not deleted ";
            header("Location: index.php");
            exit(0);
        }
    }

    if(isset($_POST['update_student']))
    {
        $student_id = mysqli_real_escape_string($con,$_POST['student_id']);
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $course = mysqli_real_escape_string($con, $_POST['course']);

        $query = "UPDATE students SET username='$username', email='$email', phone='$phone', course='$course' WHERE id='$student_id'";
        $query_run = mysqli_query($con, $query);
    
        if($query_run){
            $_SESSION['message'] = "student updated Successfully";
            header("Location: index.php");
            exit(0);
        }
        else 
        {
            $_SESSION['message'] = "Student not updated ";
            header("Location: index.php");
            exit(0);
        }
    }

    if(isset($_POST['save_student'])){
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $course = mysqli_real_escape_string($con, $_POST['course']);

        $query = "INSERT INTO students (username,email,phone,course) values ('$username' , '$email' , '$phone', '$course')";

        $query_run = mysqli_query($con, $query);

        if($query_run){
            $_SESSION['message'] = "student Created Successfully";
            header("Location: student-create.php");
            exit(0);
        }
        else 
        {
            $_SESSION['message'] = "Student Not Created";
            header("Location: student-create.php");
            exit(0);
        }
    }

?>