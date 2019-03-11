<?php
session_start();
include("../dbConfig.php");
$x = $_SESSION["name"];
$sid=$_SESSION["sid"];
include("temp.php");
?>

<html>
<head>
    <title>Online Teaching Guide</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body class="hold-transition skin-blue sidebar-mini">
<header class="main-header">
    
    <a href=" " class="logo">
      <span class="logo-mini"><b>OTG</b></span>
      <span class="logo-lg"><b><font color="">Online Teaching </font></b></span>
    </a>
   
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
			<a href="../index.php">Logout </a>
          </li>
        
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        
					<li>
					  <a href="#"> <i class="fa fa-dashboard"></i> <span>Homepage</span> </a>
					</li>
          
                     <li class="treeview"><a href=""><i class="fa fa-user"><div class="icon-bg bg-violet"></div></i><span class="menu-title">Courses </span> </a>
                         <ul class="treeview-menu">
                            <?php
                              $validate1 = "SELECT * FROM enrollcourse where sid = '".$sid."' ";
                              $result1 = mysqli_query($con, $validate1);
                            while($row = mysqli_fetch_array($result1))
                            { ?>
                                 <li>
                                     <a href="showcourse.php?cid=<?php echo $row['cid'];?> "><i class="fa fa-handshake-o">
                                     <div class="icon-bg bg-violet"></div>
                                     </i><span class="menu-title"> 
                                         <?php $aa=$row['cid'];
                                               $validate = "SELECT * FROM course_details where c_id = '".$aa."' ";
                                               $result = mysqli_query($con, $validate);
                                               $row1 = mysqli_fetch_array($result);
                                               $val1 = $row1['c_name'];
                                               echo $val1;   ?> 
                                         </span></a>
                                 </li> 
                             <?php }?>
                        </ul>
                    </li> 
				</ul>	
		</section>
  </aside>
  <div class="content-wrapper" width="95%">
   
    <!-- Main content -->
    <section class="content">

        <?php echo "<h1> Hello ".$x."</h1> <br> <h1> Welcome to Student Section. </h1> <br> Below will come list of courses available to the student." ; 
        $validate = "SELECT * FROM course_details where retest = '-1' ";
        $result1 = mysqli_query($con, $validate);
        ?>
        <h1> <center> Course List </center></h1>
        <table class="table">
            <caption>List of Courses You can select. Click on Course name for details. </caption>
            <thead>
                <tr>
                    <th>C_ID</th>   <th>Course Name </th> <th>Course Description.</th> <th> No of Sessions</th> <th> Click to Select </th>
                </tr>
            </thead>
            <tbody>
                <?php
                        function showtxt($cid,$stid,$con)
                            {
                                 $validate1 = "SELECT * FROM enrollcourse where sid = '".$stid."' and cid = '".$cid."' ";
                                $result2 = mysqli_query($con, $validate1);
                                $row = mysqli_fetch_array($result2);
                                $edate=$row['date'];
                                date_default_timezone_set('Asia/Kolkata');
                                $dt = date("Y-m-d");
                                $validate = "SELECT * FROM session where c_id = '".$cid."' ";
                                $result1 = mysqli_query($con, $validate);
                                $snum = mysqli_num_rows($result1);
                                $edate1 = date("Y-m-d", strtotime($edate." +".$snum." days -1 days"));
                            
                                if(strtotime($dt) == strtotime($edate))
                                {
                                     echo "<td> <button>  <a href = \"showcourse.php?cid=".$cid." \"> Click here to start your Course. </a> </button> </td>"; //Day 1.
                                }
                                else if (strtotime($dt) < strtotime($edate1))
                                {
                                     echo "<td> <button>  <a href = \"showcourse.php?cid=".$cid." \"> Click here to continue Course. </a> </button> </td>"; // ongoing
                                }
                                else if (strtotime($dt) >= strtotime($edate1))
                                {
                                     echo " <td> <button>  <a href = \"cresults.php?cid=".$cid." \"> Click here to see Results of the Course. </a> </button> 
                                                or <button> <a href =\" codeenroll.php?sid=".$stid."&cid=".$cid." \" onclick = \"runit()\"> Click to Re-Enroll to course. </a> </button> </td>"; // results.
                                }
                            }
                
                while($row = mysqli_fetch_array($result1))
                {
                     echo "<tr>";
                      echo "<td>" . $row['c_id'] . "</td>";
                      echo "<td>" . $row['c_name'] . " </td>";
                      echo "<td>" . $row['c_type'] . " </td>";
                      echo "<td>" . $row['duration'] . " </td>";
                      $validate1 = "SELECT * FROM enrollcourse where sid = '".$sid."' and cid = '".$row['c_id']."' ";
                      $result2 = mysqli_query($con, $validate1);
                      if(mysqli_num_rows($result2) > 0) 
                      {
                           showtxt($row['c_id'],$sid,$con); //check if course is started or ended. 
                      }   
                      else 
                      {
                          echo "<td><button> <a href =\" codeenroll.php?sid=".$sid."&cid=".$row['c_id']." \" onclick = \"runit()\"> Click to Enroll to course. </a> </button> </td>";}
                      echo "</tr>";
                }
                ?>
            </tbody>
            
        </table>
        </section>

      </div>
<script> 
    function runit(x)
    {
        var testing = "Course Guidelines" + "\r\n"+
"1. You must be a disciplined and independent learner to be successful in this online class. You do not receive the same attention as in a traditional classroom situation. " + "\r\n" +
"2. The selected course has to be completed within given time in order to receive grades. \r\n" +
"3. Be sure that you can open video/presentations attachment in course details.  \r\n" +
"4. Be sure that answer your test by due date and time. No late submissions will be accepted for any reason. No exceptions. Anything not turned in by the due date will result in a grade of zero.";
        alert(testing);
    }
    </script>
</body>
</html>