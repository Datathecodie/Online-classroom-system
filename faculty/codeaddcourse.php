<?php
include ('../dbConfig.php');
session_start();
$name = $_POST['c_name'];
$type = $_POST['c_type'];
$duration = $_POST['duration'];
$retest = $_POST['retest'];
$id = $_SESSION['id'];

$insert ="Insert into course_details (c_name, c_type, duration, faculty_id,retest) value ('".$name."', '".$type."', '".$duration."', '".$id."', '".$retest."')";
$result = mysqli_query($con,$insert);

 $validate = "SELECT * FROM course_details WHERE c_name = '".$name."' ";
    $result1 = mysqli_query($con, $validate);
    if(mysqli_num_rows($result1) > 0)
            {
                $row = mysqli_fetch_array($result1);
                $courseid= $row["c_id"]; }

for($x=1;$x<=$duration;$x++)
{
    $insert ="Insert into session (c_id, s_id,f_id) value ('".$courseid."', '".$x."', '".$id."')";
$result = mysqli_query($con,$insert);

}

header("Location:addcourse.php?course_added");
exit;

?>

