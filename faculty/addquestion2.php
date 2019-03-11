<?php
session_start();
include("../dbConfig.php");
include("temp.php");
$x = $_SESSION["name"];
$fileid = $_GET["fileid"];
$sid=$_SESSION['s_id'];
$cid=$_SESSION['c_id'];
$_SESSION['fileid'] = $fileid;
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

        <br><br>
        <form class="form-horizontal" method="post" action="addquestion3.php" enctype="multipart/form-data">
        <fieldset>

        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">List of Courses </label>  
        </div>
            
            Course ID is : <?php echo $cid;?> <br>
            Session ID is : <?php echo $sid;?> <br>
            File ID is : <?php echo $fileid;?> <br>
         <br>
            <div> 
                <label> Enter Number of MCQ Questions to be uploaded for this File. </label> <br>
                 <input type="number" id="total" name="total" placeholder="0">
                 
            </div>
         <div align="center">
          <input type="submit" align="center" class="btn btn-primary btn-md" value="Submit">&nbsp;
        </div>

        </fieldset>
        </form>

        </section>
      </div>

</body>
</html>