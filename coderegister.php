<?php
include ('dbConfig.php');

$fname = $_POST['first_name'];
$email = $_POST['email'];
$lname = $_POST['last_name'];
$gender = $_POST['gender'];
$pwd = $_POST['password'];

$insert ="Insert into student_login (first_name, last_name, email, password, gender) value ('".$fname."', '".$lname."', '".$email."', '".$pwd."', '".$gender."')";
$result = mysqli_query($con,$insert);
header("Location:index.php");
exit;

?>
