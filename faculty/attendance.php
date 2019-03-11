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
        <h1> <center> Attendance List </center></h1>
        <table class="table">
            <caption>List of students and the courses they attended. </caption>
            <thead>
                <tr>
                    <th>Date</th>   <th>Course Name </th> <th>Student Name</th> <th> Sessions No. </th> <th> Answered the Test (Present/Absent) </th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = mysqli_fetch_array($result1))
                {   
                    $validate = "SELECT * FROM course_details where c_id = '".$row['cid']."' ";
                        $result = mysqli_query($con, $validate);
                        $row1 = mysqli_fetch_array($result);
                    if($xid==$row1['faculty_id']) 
                    {
                          echo "<tr>";
                          echo "<td>" . $row['date'] . "</td>";
                            $cname = $row1['c_name'];
                          echo "<td> " . $cname . " </td>";
                          $validate = "SELECT * FROM student_login where login_id = '".$row['stid']."' ";
                            $result = mysqli_query($con, $validate);
                            $row1 = mysqli_fetch_array($result);
                            $sname = $row1['first_name']." ".$row1['first_name'];
                          echo "<td>" . $sname . " </td>";
                          echo "<td>" . $row['sid'] . " </td>";
                          if($row['done'] =="1")  echo "<td> Present </td>";
                          else echo "<td> Absent </td>";
                           echo "</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
        </section>
      </div>
</div>
</body>
</html>