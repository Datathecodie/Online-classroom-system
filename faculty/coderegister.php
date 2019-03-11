<?php
include ('../dbConfig.php');

$fname = $_POST['first_name'];
$email = $_POST['email'];
$lname = $_POST['last_name'];
$gender = $_POST['gender'];
$pwd = $_POST['password'];
$inst = $_POST['institution'];

$insert ="Insert into faculty_login (first_name, last_name, email, password, gender,institution) value ('".$fname."', '".$lname."', '".$email."', '".$pwd."', '".$gender."', '".$inst."')";
$result = mysqli_query($con,$insert);
header("Location:index.php");
exit;

?>
