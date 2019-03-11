<?php
include ('../dbConfig.php');
session_start();
$content=$_POST["content"];


    if ($content == "question") 
    {
        $qid=$_POST["qid"];
        $result = mysqli_query($con,"delete from mcq where id = '".$qid."'");
        
           header("Location:home.php?error=Deletion Succesful");        } 


else if ($content == "file") 
    {
        $qid=$_POST["fid"];
        $result = mysqli_query($con,"delete from files where id = '".$fid."'");
        $result = mysqli_query($con,"delete from mcq where fid = '".$fid."'");
        
           header("Location:home.php?error=Deletion Succesful");        } 

elseif ($content == "session") 
    {
        $id=$_POST["id"];
        $cid=$_POST["cid"];
        $sid=$_POST["sid"];
        $result = mysqli_query($con,"delete from session where id = '".$id."'");
        $result = mysqli_query($con,"delete from files where c_id = '".$cid."' and s_id = '".$sid."'");
        $result = mysqli_query($con,"delete from mcq where c_id = '".$cid."' and s_id = '".$sid."'");
        
           header("Location:home.php?error=Deletion Succesful");        } 

elseif ($content == "course") 
    {
        $cid=$_POST["cid"];
        $result = mysqli_query($con,"delete from course_details where c_id = '".$cid."'");
        $result = mysqli_query($con,"delete from session where c_id = '".$cid."'");
        $result = mysqli_query($con,"delete from files where c_id = '".$cid."'");
        $result = mysqli_query($con,"delete from mcq where c_id = '".$cid."'");
        
           header("Location:home.php?error=Deletion Succesful");        } 


        else {  echo "Sorry, there was an deleting .";      }

?>
