<?php
session_start();
include("../dbConfig.php");
include("temp.php");
$x = $_SESSION["name"];
$xid = $_SESSION["id"];
$fid = $_GET["fid"];
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
        $validate = "SELECT * FROM files WHERE  id= '".$fid."'";
        $result1 = mysqli_query($con, $validate);
        ?>
        <h1> <center> File To be Edit/Delete </center></h1>
        <div class="container row ">
            
            <?php while($row = mysqli_fetch_array($result1)) {?>
           
                <form action="codeedit.php" method="POST" enctype="multipart/form-data" > <center>
                        <input type="hidden" name="content" value="file"> 
                        <input type="hidden" name="fid" value=" <?php echo $fid;?>">
                        <label> Filename:</label><input type="file" name="filepath" >
                        <Label> Description : </Label>  <input type="text" name="desc" value="<?php echo $row['description'] ; ?>" ><br> <br>
                        <Label> To Edit file, Delete and add new. </Label> 
                        <input type="submit" name="edit" value="Update"> 
                     </center>
                </form>
                    
                <form action="codedelete.php" method="POST" enctype="multipart/form-data" > <center>
                        <input type="hidden" name="content" value="file"> 
                        <input type="hidden" name="fid" value=" <?php echo $fid;?>">
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

