<?php
session_start();
include("../dbConfig.php");
$x = $_SESSION["name"];
$stid=$_SESSION["sid"];
$rid=$_SESSION["rid"];
include("temp.php");

$validate = "SELECT * FROM test";
$result = mysqli_query($con, $validate);
$row1 = mysqli_fetch_array($result);
$question = $row1['question'];
$opt1 = $row1['opt1'];
$opt2 = $row1['opt2'];
$opt3 = $row1['opt3'];
$opt4 = $row1['opt4'];
$correct = $row1['correct'];
$tid = $row1['id']; 
$sel=$_POST['Radios'];
$validate = "SELECT * FROM result where id = '".$rid."' ";
$result = mysqli_query($con, $validate);  
$row = mysqli_fetch_array($result);    $fid=$row['fid'];
if($_POST['correct']==$_POST['Radios'])
{ //correct answer  
    $a=1;
    $val=$row['correct']; $val++;
    $validate = "UPDATE result set correct = '".$val."' where id = '".$rid."' ";
    $result = mysqli_query($con, $validate);  
}
    else{
        //wrong answer. 
        $a=0;
    }

function color($current, $correct, $select)
{
    if($current==$correct) return "green";
    else { 
        if($current==$select) return "red";
        else return "black";
    }
}
//delete from test
$validate = "DELETE FROM test where id = '".$tid."' ";
$result = mysqli_query($con, $validate);  
?>
<html>
<head>
    <title>Online Teaching Guide</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body>

  <div>
    <section class="content">

        Question: <?php echo $question; ?>

           <fieldset class="form-group">  <strong>
               <font color = "<?php color('1',$correct,$sel);?>"> <label class="form-check-label">  Option 1: <?php echo $opt1; ?> </label> </font> <br>
               <font color = "<?php color('2',$correct,$sel);?>"> <label class="form-check-label">  Option 2: <?php echo $opt2; ?> </label> </font> <br>
               <font color = "<?php color('3',$correct,$sel);?>"> <label class="form-check-label">  Option 3: <?php echo $opt3; ?> </label> </font> <br>
               <font color = "<?php color('4',$correct,$sel);?>"> <label class="form-check-label">  Option 4: <?php echo $opt4; ?></label> </font> <br> </strong>
              </fieldset>
         
            <br /><br />
          Your answer is <?php if($a == 1) echo "Correct"; else echo "Wrong. Correct Answer is ".$_POST['correct']; ?>
<?php       $validate = "SELECT * FROM test ";
            $result = mysqli_query($con, $validate);
            if( mysqli_num_rows($result) > 0) { 
           echo " <a href=\"question.php?fid=".$fid." \"> Click here to go to next question </a>";
             } else 
            echo " <a href=\"result.php?id=".$rid." \"> Click here to see result </a>";
        ?>
        </section>
      </div>

</body>
</html>