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
  <?php include("header.php"); ?>
 
  <div class="content-wrapper" width="95%">
    <section class="content">
     
        <br>  <br>
        <?php
        $validate = "SELECT * FROM session WHERE f_id = '".$xid."' AND is_set = '0'";
        $result1 = mysqli_query($con, $validate);
        ?>
        
        <table class="table">
            <caption>List of Courses for which files to be added.</caption>
            <thead>
                <tr>
                    <th>C_ID</th>   <th>S_ID</th> <th>Click to Add Material to the Sessions.</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while($row = mysqli_fetch_array($result1))
                {
                     echo "<tr>";
                      echo "<td>" . $row['c_id'] . "</td>";
                      echo "<td>" . $row['s_id'] . "</td>";
                      echo "<td> <a href = \"addsession1.php?c_id=".$row['c_id']."&s_id=".$row['s_id']." \"> Click here. </a></td>";
                      echo "</tr>";
                }
                ?>
            </tbody>
            
        </table>
           
        </section>
      </div>

</body>
</html>