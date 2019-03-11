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
        $validate = "SELECT * FROM schedule ";
        $result1 = mysqli_query($con, $validate);
        ?>
        <h1> <center> Student Performance List </center></h1>
        <table class="table">
            <caption>List of students and the scores they recieved. </caption>
            <thead>
                <tr>
                    <th>ID</th> <th>Course Name </th> <th>Student Name</th> <th> Click to see the results. </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $validate = "SELECT * FROM enrollcourse ";
                $result = mysqli_query($con, $validate);
                while($row = mysqli_fetch_array($result))
                {   $aa=0;
                    
                     echo "<tr>"; $aa++;
                          echo "<td>" . $aa . "</td>";
                            $validate = "SELECT * FROM course_details where c_id = '".$row['cid']."' ";
                            $result1 = mysqli_query($con, $validate);
                            $row1 = mysqli_fetch_array($result1);     
                            $cname = $row1['c_name'];
                          echo "<td> " . $cname . " </td>";
                          $validate = "SELECT * FROM student_login where login_id = '".$row['sid']."' ";
                            $result1 = mysqli_query($con, $validate);
                            $row1 = mysqli_fetch_array($result1);
                            $sname = $row1['first_name']." ".$row1['first_name'];
                          echo "<td>" . $sname . " </td>";
                           echo " <td> <button>  <a href = \"cresults.php?cid=".$row['cid']."&sid=".$row['sid']." \"> Click here to see Results of the Course. </a> </button> ";
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