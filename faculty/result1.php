<?php
session_start();
include("../dbConfig.php");
$x = $_SESSION["name"];
$stid=$_GET["sid"];
$cor=$_GET["cor"];
$tot=$_GET["tot"];
include("temp.php");
?>
 
<html>
<head>
    <title>Online Teaching Guide</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body>

  <div>
    <!-- Main content -->
    <section class="content">
        <?php 
                function stars($num)
                {
                    for($a=0;$a<$num;$a++)
                       echo " <span class=\"glyphicon glyphicon-star\"></span>";
                    for($b=$a;$b<5;$b++)
                       echo " <span class=\"glyphicon glyphicon-star-empty\"></span>";
                }
        
               $val1 = $tot;
               $val2 = $cor;
                $validate = "SELECT * FROM student_login where login_id = '".$stid."' ";
                        $result = mysqli_query($con, $validate);
                        $row1 = mysqli_fetch_array($result);
                $stname=$row1['first_name'].' '.$row1['last_name'];
                echo "<center><h3> Student:".$stname." got ".$val2. " Out of " .$val1. " in tests. <br>";
                $per = $val2 / $val1*100;
                echo "Percentage: ".$per . " % <br>";
                if ($per == 100)
                { echo "A+ Grade"; stars(5);}
                    else if($per>80)
                    { echo " A Grade "; stars(4);}
                     else if($per>60)
                     {       echo " B Grade ";  stars(3);}
                        else if($per>45)
                        {      echo " C Grade"; stars(3);}
                    else if($per>35)
                    {     echo " D Grade"; stars(2);}
                    else 
                    {   echo " Failed"; stars(1);}
        
        echo "</center> </h3>";
        ?>
        
        </section>
      </div>

</body>
</html>