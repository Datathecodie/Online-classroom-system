<?php
include("dbConfig.php");
$email=$_POST['login_email'];
$pwd=$_POST['login_password'];
session_start();

    $validate = "SELECT * FROM student_login WHERE email = '".$email."' AND password = '".$pwd."' AND deleted = '0'";
    $result1 = mysqli_query($con, $validate);
    if(mysqli_num_rows($result1) > 0)
            {
                $row = mysqli_fetch_array($result1);
                $_SESSION["email"]= $row["email"];
                $_SESSION["name"]= $row["first_name"];
                $_SESSION["sid"]=$row["login_id"];
                
                header("Location:student/home.php");
                exit;
            }
        else
            {
                header("Location:index.php?error=Invalid Credetial ");
                exit;
            }



?>