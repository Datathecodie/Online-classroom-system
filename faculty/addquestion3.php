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
$fileid = $_SESSION['fileid'];

if(isset($_POST['total']))
{
    $total = $_POST["total"];
    $_SESSION["total"] = $total;
}
else    {   $total = $_SESSION['total'];    }
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
            File ID is : <?php echo $fileid;?> <br>
            Total Question ID is : <?php echo $total;?> <br>
            Question to be entered ID is : <?php $current++; echo $current;?><br>
        <h3>Enter Question Number <?php echo $current;?> out of <?php echo $total;?> </h3>
                
        <table class="table table-bordered">
            <form class="form-horizontal" method="post" action="codeaddquestion.php" enctype="multipart/form-data">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Option 1</th>
                    <th>Option 2</th>
                    <th>Option 3</th>
                    <th>Option 4</th>
                    <th>Correct Option</th>
                </tr>
            </thead>
            <tbody>
                   <tr><td>
                        Question: <input type="text" name="question"><br></td><td>
                        Option 1: <input type="text" name="opt1"><br></td><td>
                        Option 2: <input type="text" name="opt2"><br></td><td>
                        Option 3: <input type="text" name="opt3"><br></td><td>
                        Option 4: <input type="text" name="opt4"><br></td><td>
                        Correct Option : 
                       <select name="correct">
                             <option value="1"> Option 1</option>
                             <option value="2"> Option 2</option>
                             <option value="3"> Option 3</option>
                             <option value="4"> Option 4</option>
                       </select>
                       <br>
                        <input type="hidden" name="current" value="<?php echo $current;?> ">
                        <input type="hidden" name="sid" value="<?php echo $sid;?> ">
                        <input type="hidden" name="cid" value="<?php echo $cid;?> ">
                        <input type="hidden" name="fileid" value="<?php echo $fileid;?> ">
                     
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