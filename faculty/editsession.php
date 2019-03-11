<?php
session_start();
include("../dbConfig.php");
include("temp.php");
$x = $_SESSION["name"];
$xid = $_SESSION["id"];
$id = $_GET["id"];
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
        $validate = "SELECT * FROM session WHERE  id= '".$id."'";
        $result1 = mysqli_query($con, $validate);
        ?>
        <h1> <center> Session To be Deleted </center></h1>
        <div class="container row ">
            
            <?php while($row = mysqli_fetch_array($result1)) {?>
                    
                <form action="codedelete.php" method="POST" enctype="multipart/form-data" > <center>
                        <input type="hidden" name="content" value="session"> 
                        <input type="hidden" name="id" value=" <?php echo $id;?>">
                        <input type="hidden" name="cid" value=" <?php echo $row['c_id'];?>">
                        <input type="hidden" name="sid" value=" <?php echo $row['s_id'];?>">
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