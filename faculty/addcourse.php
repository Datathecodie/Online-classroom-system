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
        
        <br>
        <br>
        <form class="form-horizontal" method="post" action="codeaddcourse.php" enctype="multipart/form-data" >
        <fieldset>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">Course Name</label>  
          <div class="col-md-4">
          <input id="c_name" name="c_name" type="text" placeholder="Enter Course Name" class="form-control input-md" required="">
          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">Course Description</label>  
          <div class="col-md-4">
          <input id="c_type" name="c_type" type="text" placeholder="Enter Course Description" class="form-control input-md" required="">

          </div>
        </div>
        <div class="form-group">
          <label class="col-md-4 control-label" for="textinput">Course Duration</label>  
          <div class="col-md-4">
                <input type='number' placeholder="No. of Days/Sessions " class="form-control days" name="duration" id='duration' />
          </div>
        </div>        <br>
            
            <div class="form-group ">
            <label class="col-md-4 control-label">Select Main Course if this Retest for course.:</label>
             <div class="col-md-4"> 
                 <select class="form-control" id="sel1" name="retest">
                    <option value=-1> Not a Retest </option>
                     <?php 
                         $validate = "SELECT * FROM course_details WHERE retest = '-1'";
                         $result1 = mysqli_query($con, $validate);
                           while($row = mysqli_fetch_array($result1))
                               echo "<option value = \"".$row['c_id']."\">".$row['c_name']."</option>";            ?>
              </select>
            </div></div>
            
          <div align="center">
          <input type="submit" align="center" class="btn btn-primary btn-md" value="Submit" />&nbsp;
          <input type="reset" id="reset" align="center" class="btn btn-outline-default btn-md "/>
        </div>

        </fieldset>
        </form>

     </section>
      </div>

</div>
</body>
</html>