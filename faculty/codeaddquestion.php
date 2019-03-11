<?php
include ('../dbConfig.php');
session_start();
$cid=$_POST["cid"];
$sid=$_POST["sid"];
$fileid=$_POST['fileid'];
$current=$_POST['current'];

$question=$_POST['question'];
$opt1=$_POST['opt1'];
$opt2=$_POST['opt2'];
$opt3=$_POST['opt3'];
$opt4=$_POST['opt4'];
$correct=$_POST['correct'];

$total = $_SESSION['total'];
   
        $insert ="Insert into mcq (c_id,s_id, f_id, question, opt1, opt2, opt3, opt4, correct) value ('".$cid."','".$sid."','".$fileid."','".$question."','".$opt1."' ,'".$opt2."','".$opt3."','".$opt4."','".$correct."')";
        $result = mysqli_query($con,$insert);
        
            if($current > $total) 
            { header("Location:addquestion.php?error=ALLUploadDone");         }
            else 
            { header("Location:addquestion3.php?error=Upload Succesful&current=$current"); }
       

?>
