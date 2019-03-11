<?php
session_start();
include("../dbConfig.php");
include("temp.php");

if( isset($_GET['current']) )
{
     $current = $_GET['current'];
}
else 
{
    $current = 0;
}
$x = $_SESSION["name"];
$sid = $_SESSION["s_id"];
$cid = $_SESSION["c_id"];
if(isset($_POST['total']))
{
    $total = $_POST["total"];
$_SESSION["total"] = $total;
}
else
{
    $total = $_SESSION['total'];
}
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
     
        <br>  <br>
            Course ID is : <?php echo $cid;?> <br>
            Session ID is : <?php echo $sid;?> <br>
            Total File ID is : <?php echo $total;?> <br>
            File to be entered ID is : <?php $current++; echo $current;?><br>
        <h3>Enter File Number <?php echo $current;?> out of <?php echo $total;?> </h3>
                
        <table class="table table-bordered">
            <form class="form-horizontal" method="post" action="codeaddsession.php" enctype="multipart/form-data">
            <thead>
                <tr>
                    <th>File Upload</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                   <tr><td>
                        Filename:<input type="file" name="filepath" id="fileSelect"></td><td>
                        Description: <input type="text" name="desc"><br>
                       <input type="hidden" name="current" value="<?php echo $current;?> ">
                        <input type="hidden" name="sid" value="<?php echo $sid;?> ">
                        <input type="hidden" name="cid" value="<?php echo $cid;?> ">
                     </td></tr>
                <tr><td>
                    <div align="center">
                      <input type="submit" align="center" class="btn btn-primary btn-md" value="Submit">&nbsp;
                    </div> </td>
                </tr>
            </tbody>
            </form>
        </table>
        </section>
      </div>
</body>
</html>