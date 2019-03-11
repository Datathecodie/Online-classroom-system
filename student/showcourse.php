<?php
session_start();
include("../dbConfig.php");
$x = $_SESSION["name"];
$sid=$_SESSION["sid"]; //student id
$cid=$_GET["cid"];
include("temp.php");
?>

<html>
<head>
    <title>Online Teaching Guide</title>

  <!-- Tell the browser to be responsive to screen width -->
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
                                               $val2 = $row1['c_type'];
                                               $val3 = $row1['duration'];
                                               if($aa == $cid)
                                               {
                                                    $v1 = $val1; $v2 = $val2; $v3 = $val3;
                                               }
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

        <?php echo "<center><pre class = \"tab\"><h1> Hello ".$x."</h1> <br> <h1> Welcome to Course \" ".$v1." \". </h1>  <h3><br> Description: ".$v2.".  Duration of the course: ".$v3." Days.</pre></h3> </center>" ; ?>
        
        <?php
        $validate = "SELECT * FROM session where c_id = '".$cid."' ";
        $result1 = mysqli_query($con, $validate);
        ?>
        <h1> <center> Sessions List </center></h1>
        <table class="table">
            <caption>List of the sessions selected by the user.</caption>
            <thead>
                <tr>
                    <th>ID</th>  <th>Session Number </th> <th>Current Status</th> <th> Action </th>
                </tr>
            </thead>
            <tbody>
                <?php
                function showtxt($cid,$sid,$stid,$con)
                {
                    $validate = "SELECT * FROM schedule where cid = '".$cid."' and sid = '".$sid."' and stid = '".$stid."' ";
                    $result1 = mysqli_query($con, $validate);
                    $row = mysqli_fetch_array($result1);
                    $edate=$row['date'];
                    date_default_timezone_set('Asia/Kolkata');
                    $dt = date("Y-m-d");

                   if(strtotime($dt) == strtotime($edate))      // Open session
                    {
                         echo "<td> <a href = \"showsession.php?cid=".$cid."&sid=".$sid." \"> Click here to start a new session. </a> </td>";
                    }
                    else if (strtotime($dt) < strtotime($edate)) //Wait for session.
                    {
                         echo "<td>  This Session is not Available today.  </td>";
                    }
                    else if (strtotime($dt) > strtotime($edate)) //Results.
                    {
                         echo " <td> <a href = \"sresults.php?cid=".$cid."&sid=".$sid." \"> Click here to see Results of the session. </a> </td>";
                    }
                  
                }
                while($row = mysqli_fetch_array($result1))
                {
                      echo "<tr>";
                      echo "<td>" . $row['id'] . "</td>";
                      echo "<td>" . $row['s_id'] . " </td>";
                      echo "<td>" . $row['s_id'] . " </td>";
                      echo showtxt($cid,$row['s_id'],$sid,$con);
                      echo "</tr>";
                }
                ?>
            </tbody>
            
        </table>
        </section>

      </div>

</body>
</html>