<?php
session_start();
include("../dbConfig.php");
include("temp.php");
$x = $_SESSION["name"];
$xid = $_SESSION["id"];
$courseid = $_GET["cid"];
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
        $validate = "SELECT * FROM session WHERE c_id = '".$courseid."' ";
        $result1 = mysqli_query($con, $validate);
        ?>
        
         <h1> <center> Session List </center></h1>
        <table class="table">
            <caption>List of Sessions You Have added for course <?php echo $courseid;?>. Click on Session id for details. </caption>
            <thead>
                <tr>
                    <th>Session ID </th> <th> No of Files</th> <th> Click to delete </th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = mysqli_fetch_array($result1))
                {
                      echo "<tr>";
                      echo "<td> <a href = \"filehome.php?cid=".$row['c_id']."&sid=".$row['s_id']." \" > " .$row['s_id']. " </a></td>";
                      $validate1 = "SELECT count(id) FROM files WHERE c_id = '".$courseid."' and s_id = '".$row['s_id']."'  ";
                      $result2 = mysqli_query($con, $validate1);
                      $z = mysqli_fetch_assoc($result2);
                      echo "<td>" . $z['count(id)'] . " </td>";
                      echo "<td> <a href = \"editsession.php?id=".$row['id']." \" > Click to Delete </a></td>";
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