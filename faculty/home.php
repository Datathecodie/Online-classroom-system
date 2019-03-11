<?php
session_start();
include("../dbConfig.php");
include("temp.php");
$x = $_SESSION["name"];
$xid = $_SESSION["id"];
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
        $validate = "SELECT * FROM course_details WHERE faculty_id = '".$xid."' and retest = '-1' ";
        $result1 = mysqli_query($con, $validate);
        ?>
        <h1> <center> Course List </center></h1>
        <table class="table">
            <caption>List of Courses You Have added. Click on Course name for details. </caption>
            <thead>
                <tr>
                    <th>C_ID</th>   <th>Course Name </th> <th>Course Description.</th> <th> No of Sessions</th> <th> Click to Update/Delete </th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = mysqli_fetch_array($result1))
                {
                     echo "<tr>";
                      echo "<td>" . $row['c_id'] . "</td>";
                      echo "<td> <a href = \"sessionhome.php?cid=" . $row['c_id'] . "  \">" . $row['c_name'] . " </a></td>";
                      echo "<td>" . $row['c_type'] . " </td>";
                      echo "<td>" . $row['duration'] . " </td>";
                      echo "<td> <a href = \"editcourse.php?cid=" . $row['c_id'] . "  \"> click to edit/delete </a></td>";
                      echo "</tr>";
                }
                ?>
            </tbody>
            
        </table>        <br>  <br>
        <?php
        $validate = "SELECT * FROM course_details WHERE faculty_id = '".$xid."' and retest != '-1' ";
        $result1 = mysqli_query($con, $validate);
        ?>
        <h1> <center> Retest Course List </center></h1>
        <table class="table">
            <caption>List of Retest Courses You Have added. Click on Course name for details. </caption>
            <thead>
                <tr>
                    <th>C_ID</th>   <th>Course Name. </th> <th>Course Description.</th> <th> Main course. </th> <th> No of Sessions.</th> <th> Click to Update/Delete </th> 
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = mysqli_fetch_array($result1))
                {
                     echo "<tr>";
                      echo "<td>" . $row['c_id'] . "</td>";
                      echo "<td> <a href = \"sessionhome.php?cid=" . $row['c_id'] . "  \">" . $row['c_name'] . " </a></td>";
                      echo "<td>" . $row['c_type'] . " </td>";
                      // main course 
                      $value = $row['retest'];
                        $validate2 = "SELECT * FROM course_details WHERE c_id = '".$value."' ";
                        $result2 = mysqli_query($con, $validate2);
                        $row1 = mysqli_fetch_array($result2);
                        echo "<td>" . $row1['c_name'] . " </td>";
                      echo "<td>" . $row['duration'] . " </td>";
                      echo "<td> <a href = \"editcourse.php?cid=" . $row['c_id'] . "  \"> click to edit/delete </a></td>";
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