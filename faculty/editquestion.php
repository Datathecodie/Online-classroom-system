<?php
session_start();
include("../dbConfig.php");
include("temp.php");
$x = $_SESSION["name"];
$xid = $_SESSION["id"];
$qid = $_GET["qid"];
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
        $validate = "SELECT * FROM mcq WHERE  id= '".$qid."'";
        $result1 = mysqli_query($con, $validate);
        ?>
        <h1> <center> Question To be Edit/Delete </center></h1>
        <div class="container row ">
            
            <?php while($row = mysqli_fetch_array($result1)) {?>
           
                <form action="codeedit.php" method="POST" enctype="multipart/form-data" > <center>
                    <input type="hidden" name="content" value="question"> 
                       <input type="hidden" name="qid" value=" <?php echo $qid;?>">
                    <Label> Question : </Label>  <input type="text" name="question" value="<?php echo $row['question']; ?>" ><br> <br>

                   <Label> Option 1 : </Label> <input type="text" name="opt1" required autofocus value="<?php echo $row['opt1']; ?> ">

                   <Label> Option 2 : </Label> <input type="text" name="opt2" required autofocus value="<?php echo $row['opt2']; ?> "><br><br>

                   <Label> Option 3 : </Label> <input type="text" name="opt3" required autofocus value="<?php echo $row['opt3'] ;?> ">

                   <Label> Option 4 : </Label> <input type="text" name="opt4" required autofocus value="<?php echo $row['opt4']; ?> "><br><br>
                    
                    <Label> Correct Option : </Label> 
                    <select type="text" name="correct"> 
                        <option value="1" <?php if( $row['correct'] == '1') echo "selected";?> > 1 </option> <option value="2" <?php if( $row['correct'] == '2') echo "selected";?>> 2 </option> 
                        <option value="3" <?php if( $row['correct'] == '3') echo "selected";?>> 3 </option> <option value="4" <?php if( $row['correct'] == '4') echo "selected";?>> 4 </option> 
                    </select>
                    
                    <input type="submit" name="edit" value="Update"> 
                     </center>
                </form>
                    
                <form action="codedelete.php" method="POST" enctype="multipart/form-data" > <center>
                        <input type="hidden" name="content" value="question"> 
                        <input type="hidden" name="qid" value=" <?php echo $qid;?>">
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