<?php
session_start();
include("../dbConfig.php");
$x = $_SESSION["name"];
$stid=$_SESSION["sid"];
$rid=$_GET["id"];
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
        
               $validate = "SELECT * FROM result where id = '".$rid."' ";
               $result = mysqli_query($con, $validate);
               $row1 = mysqli_fetch_assoc($result);
               $val1 = $row1['total'];
               $val2 = $row1['correct'];
                
                echo "<center><h3> You got ".$val2. " Out of " .$val1. " in test. <br>";
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
        <center> <button> <a href="home.php" target="_parent"> Click to go back to home. </a></button> </center>
        </section>
      </div>

</body>
</html>