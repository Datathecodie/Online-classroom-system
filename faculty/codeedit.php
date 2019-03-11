<?php
include ('../dbConfig.php');
session_start();
$content=$_POST["content"];

    if ($content == "question") 
    {
        $qid=$_POST["qid"];
        $question=$_POST["question"];
        $opt1=$_POST["opt1"];
        $opt2=$_POST["opt2"];
        $opt3=$_POST["opt3"];
        $opt4=$_POST["opt4"];
        $correct=$_POST["correct"];
        
        $result = mysqli_query($con,"Update mcq set question = '".$question."', opt1 = '".$opt1."', opt2 = '".$opt2."', opt3 = '".$opt3."',opt4 = '".$opt4."', correct = '".$correct."' where id = '".$qid."'");
        
           header("Location:home.php?error=Updation Succesful");        } 

    
    if ($content == "file") 
    {
        $fid=$_POST["fid"];
        $desc=$_POST["desc"];
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["filepath"]["name"]);
        $filename = basename($_FILES["filepath"]["name"]);
        $filesize = $_FILES["filepath"]["size"];

       // $insert ="Insert into files (c_id,s_id,file_name,file_path,description) value ('".$cid."','".$sid."','".$filename."','".$target_file."','".$desc."')";
        $result = mysqli_query($con,"Update files set description = '".$desc."' where id = '".$fid."'");
        move_uploaded_file($_FILES["filepath"]["tmp_name"], $target_file);
        if($filesize > 0) 
        {
            $result1 = mysqli_query($con,"Update files set file_name = '".$filename."', file_path = '".$target_file."' where id = '".$fid."'"); 
             header("Location:home.php?error=Updation Succesful1");  
        } 
           header("Location:home.php?error=Updation Succesful2");        } 

if ($content == "course") 
    {
        $cid=$_POST["cid"];
        $name=$_POST["cname"];
        $desc=$_POST["desc"];
    
        $result = mysqli_query($con,"Update course_details set c_type = '".$desc."', c_name = '".$name."' where c_id = '".$cid."'");
        
           header("Location:home.php?error=Updation Succesful");        } 
    
        else {  echo "Sorry, there was an error uploading your file.";      }

?>

 