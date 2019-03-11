<?php
include ('../dbConfig.php');
session_start();
$cid=$_POST["cid"];
$sid=$_POST["sid"];
$desc=$_POST['desc'];
$current=$_POST['current'];
$total = $_SESSION['total'];

$target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["filepath"]["name"]);
$filename = basename($_FILES["filepath"]["name"]);
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["filepath"]["tmp_name"], $target_file)) 
    {
        $insert ="Insert into files (c_id,s_id,file_name,file_path,description) value ('".$cid."','".$sid."','".$filename."','".$target_file."','".$desc."')";
        $result = mysqli_query($con,$insert);
        
            if($current > $total) {
                $upd=" UPDATE session SET is_set = '1' WHERE c_id = '".$cid."' AND s_id='".$sid."' ";
                $result = mysqli_query($con,$upd);
                header("Location:addsession.php?error=ALLUploadDone");
            }
            else {header("Location:addsession2.php?error=Upload Succesful&current=$current"); }
        } 
        else {  echo "Sorry, there was an error uploading your file.";      }

?>

