<?php
session_start();
include("../dbConfig.php");
include("temp.php");
$x = $_SESSION["name"];
$xid = $_SESSION["id"];
$cid = $_GET["cid"];
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
        $validate = "SELECT * FROM course_details WHERE  c_id= '".$cid."'";
        $result1 = mysqli_query($con, $validate);
        ?>
        <h1> <center> Question To be Edit/Delete </center></h1>
        <div class="container row ">
            
            <?php while($row = mysqli_fetch_array($result1)) {?>
           
                <form action="codeedit.php" method="POST" enctype="multipart/form-data" > <center>
                        <input type="hidden" name="content" value="course"> 
                        <input type="hidden" name="cid" value=" <?php echo $cid;?>">

                        <Label> Course Name : </Label>  <input type="text" name="cname" value="<?php echo $row['c_name']; ?>" ><br> <br>

                        <Label> Description : </Label> <input type="text" name="desc"  value="<?php echo $row['c_type']; ?>" >
                    
                    <input type="submit" name="edit" value="Update"> 
                     </center>
                </form>
                    
                <form action="codedelete.php" method="POST" enctype="multipart/form-data" > <center>
                        <input type="hidden" name="content" value="course"> 
                        <input type="hidden" name="cid" value=" <?php echo $cid;?>">
                        <input type="submit" name="edit" value="Delete">
                    </center>
                </form>
            <?php } ?>
            </div>
        </section>
    
      </div>

</div>

</body>
</html>