<?php
session_start();
include("../dbConfig.php");
include("temp.php");
$x = $_SESSION["name"];
$xid = $_SESSION["id"];
$courseid = $_GET["cid"];
$sid = $_GET["sid"];
?>

<html>
<head>
	<title>Online Teaching Guide</title>



  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

 
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div>

  <?php include("header.php"); ?>

 
  <div class="content-wrapper" width="95%">
   
    <!-- Main content -->
   <section class="content">
        
        <br>  <br>
        <?php
        $validate = "SELECT * FROM files WHERE c_id = '".$courseid."' and s_id= '".$sid."' ";
        $result1 = mysqli_query($con, $validate);
        ?>
         <h1> <center> File List </center></h1>
        <table class="table">
            <caption>List of Files You Have added for course <?php echo $courseid;?>. Click on File id for details. </caption>
            <thead>
                <tr>
                    <th>File ID </th> <th> File path </th><th>File Description</th><th> No of questions</th> <th> Click to Edit/Delete </th>
                 </tr>
            </thead>
            <tbody>
                <?php
                while($row = mysqli_fetch_array($result1))
                {
                      echo "<tr>";
                      echo "<td> <a href = \"questionhome.php?cid=".$row['c_id']."&sid=".$row['s_id']."&fid=".$row['id']."  \" > " .$row['id']. " </a></td>";
                    
                      echo "<td> <a href = \" ".$row['file_path']." \" > " .$row['file_name']. " </a></td>";
                      echo "<td> " .$row['description']. " </td>";
                    
                      $validate1 = "SELECT count(id) FROM mcq WHERE c_id = '".$courseid."' and s_id = '".$row['s_id']."' and f_id =  ".$row['id']."";
                      $result2 = mysqli_query($con, $validate1);
                      $z = mysqli_fetch_assoc($result2);
                      echo "<td>" . $z['count(id)'] . " </td>";
                      echo "<td> <a href = \"editfile.php?fid=".$row['id']."  \" > Click to Edit/Delete </a></td>";
                      echo "</tr>";
                }
                ?>
            </tbody>
            
        </table>
  
        </section>
    
      </div>

</div>

</body>
</html>