<?php
include ('../dbConfig.php');
session_start();
$sid = $_GET['sid']; //stid or student id
$cid = $_GET['cid'];

date_default_timezone_set('Asia/Kolkata');
$dt = date("y/m/d h:i:s");

$insert ="Insert into enrollcourse (sid, cid, date) value ('".$sid."', '".$cid."', '".$dt."')";
$result = mysqli_query($con,$insert);

$validate1 = "DELETE FROM result where cid = '".$cid."'  and stid = '".$sid."' ";  // removes duplicate
$result1 = mysqli_query($con, $validate1);

//create result for all the fids in all sids in the given course cid, for a stid student.

$validate2 = "SELECT * FROM files where c_id = '".$cid."' ";
$result2 = mysqli_query($con, $validate2);
while($row = mysqli_fetch_array($result2))
{
    $validate1 = "SELECT * FROM mcq where s_id = '".$row['s_id']."' and c_id = '".$cid."' and f_id = '".$row['id']."'";           // copy each mcq fro table to test table to be answered.
    $result1 = mysqli_query($con, $validate1); $r=0; 
        while($row1 = mysqli_fetch_assoc($result1))
        {           $r++;         }
    $validate8 ="Insert into result (stid, cid, sid, fid, total) value ('".$sid."', '".$cid."', '".$row['s_id']."', '".$row['id']."','".$r."' )";  //adds new entry
    $result8 = mysqli_query($con, $validate8); 
}

$validate2 = "SELECT * FROM session where c_id = '".$cid."' ";          // find diff no of sessions
$result2 = mysqli_query($con, $validate2);
while($row = mysqli_fetch_array($result2))
{
    $validate8 ="Insert into schedule (stid, cid, sid, date) value ('".$sid."', '".$cid."', '".$row['s_id']."', '". date("y/m/d h/i/s", strtotime("now+".$row['s_id']." days - 1 days"))."' )";  //adds new entry to schedule table
    $result8 = mysqli_query($con, $validate8); 
}

header("Location:home.php?course_enrolled");
exit;

?>

