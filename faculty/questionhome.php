<?php
session_start();
include("../dbConfig.php");
include("temp.php");
$x = $_SESSION["name"];
$xid = $_SESSION["id"];
$courseid = $_GET["cid"];
$sid = $_GET["sid"];
$fid = $_GET["fid"];
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
        $validate = "SELECT * FROM mcq WHERE c_id = '".$courseid."' and s_id= '".$sid."' and f_id= '".$fid."'";
        $result1 = mysqli_query($con, $validate);
        ?>
        <h1> <center> Question List </center></h1>
        <table class="table">
            <caption>List of Questions You Have added for course <?php echo $courseid;?> and session <?php echo $sid;?> . Click on question to edit. </caption>
            <thead>
                <tr>
                    <th>ID</th>  <th> Question </th> <th> Option A</th><th> Option B</th><th> Option C</th><th> Option D</th> <th> Correct Option </th> <th> Click to Edit/Delete </th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = mysqli_fetch_array($result1))
                {
                      echo "<tr>";
                      echo "<td>" . $row['id'] . "</td>";
                      echo "<td>" .$row['question']. " </td>";
                      echo "<td>" . $row['opt1'] . "</td>";
                      echo "<td>" . $row['opt2'] . "</td>";
                      echo "<td>" . $row['opt3'] . "</td>";
                      echo "<td>" . $row['opt4'] . "</td>";
                      echo "<td>" . $row['correct'] . "</td>";
                      echo "<td> <a href = \"editquestion.php?qid=".$row['id']."\" > Click to Edit/Delete </a></td>";
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