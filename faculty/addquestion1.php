<?php
session_start();
include("../dbConfig.php");
include("temp.php");
$x = $_SESSION["name"];
$sid = $_GET["s_id"];
$cid = $_GET["c_id"];
$_SESSION['s_id']=$sid;
$_SESSION['c_id']=$cid;
?>

<html>
<head>
	<title>Online Teaching Guide</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

 
</head>
<body class="hold-transition skin-blue sidebar-mini">

 <?php include("header.php"); ?>
 
  <div class="content-wrapper" width="95%">
   
    <!-- Main content -->
        <section class="content">
     
        <br>  <br>
        <?php
        $validate = "SELECT * FROM files WHERE c_id = '".$cid."' and s_id = '".$sid."' and deleted = '0'";
        $result1 = mysqli_query($con, $validate);
        ?>
        
        <table class="table">
            <caption>List of Files for which MCQ's to be added. for course <?php echo $cid;?> and session <?php echo $sid;?> </caption>
            <thead>
                <tr>
                    <th>Filename</th>   <th>Description</th> <th>Click to add MCQ's to the Files.</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = mysqli_fetch_array($result1))
                {
                     echo "<tr>";
                      echo "<td>" . $row['file_name'] . "</td>";
                      echo "<td>" . $row['description'] . "</td>";
                      echo "<td> <a href = \"addquestion2.php?fileid=".$row['id']." \"> Click here. </a></td>";
                      echo "</tr>";
                }
                ?>
            </tbody>
            
        </table>
           
      </section>
      </div>

</body>
</html>