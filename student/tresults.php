<?php
session_start();
include("../dbConfig.php");
$x = $_SESSION["name"];
$stid=$_SESSION["sid"];
$fid=$_GET["fid"];
include("temp.php");
$validate = "SELECT * FROM files where id = '".$fid."' ";
$result = mysqli_query($con, $validate);
$row1 = mysqli_fetch_array($result);
$cid = $row1['c_id'];
$sid = $row1['s_id'];
$filename =  $row1['file_name'];
$r=0;

$validate1 = "SELECT * FROM result where sid = '".$sid."' and cid = '".$cid."' and fid = '".$fid."' and stid = '".$stid."' ";
$result1 = mysqli_query($con, $validate1);
$row = mysqli_fetch_assoc($result1);
$rid = $row['id'];
$_SESSION["rid"] = $rid;
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
                              $validate1 = "SELECT * FROM enrollcourse where sid = '".$stid."' ";
                              $result1 = mysqli_query($con, $validate1);
                            while($row = mysqli_fetch_array($result1))
                            { ?>
                                 <li>
                                     <a href="#"><i class="fa fa-handshake-o">
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

<?php echo "<center><pre class = \"tab \"><h1> Hello ".$x." Welcome to Course \" ".$v1." \". </h1> <h3> Description: ".$v2.". Duration of the course: ".$v3." Days. <br> Session Number: ".$sid.". File Name: ".$filename.".   </h3> </pre> </center>" ; ?>
        <center> <button> <a href="showsession.php?cid=<?php echo $cid;?>&sid=<?php echo $sid;?>" > Click to go back. </a></button> </center>
       <center> <iframe src="result.php?id=<?php echo $rid;?>" width="800" height="600"> </iframe> </center> 
        </section>
      </div>

</body>
</html>