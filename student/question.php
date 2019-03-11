<?php
session_start();
include("../dbConfig.php");
$x = $_SESSION["name"];
$stid=$_SESSION["sid"];
$rid=$_SESSION["rid"];
include("temp.php");

$validate = "SELECT * FROM test ";
$result = mysqli_query($con, $validate);
if( mysqli_num_rows($result) > 0) {
$row1 = mysqli_fetch_array($result);
$question = $row1['question'];
$opt1 = $row1['opt1'];
$opt2 = $row1['opt2'];
$opt3 = $row1['opt3'];
$opt4 = $row1['opt4'];
$correct = $row1['correct'];
$tid = $row1['id']; 

}

else { // redirect page to results. result.php?id=$rid
    header("location: result.php?id=$rid");
    
}

?>
<html>
<head>
    <title>Online Teaching Guide</title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
</head>
<body >

  <div >
   
    <!-- Main content -->
    <section class="content">

      <form role="form" method="post" class="login-form" action="answer.php">
        Question: <?php echo $question; ?>
            <input type="hidden" name="rid" id ="rid" value="<?php echo $rid;?>">
            <input type="hidden" name="correct" id ="correct" value="<?php echo $correct;?>">
             <input type="hidden" name="tid" id ="tid" value="<?php echo $tid;?>">
           <fieldset class="form-group">
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="Radios" id="optionsRadios1" value="1" > 
                    Option 1: <?php echo $opt1; ?>
                  </label>
                </div>
                <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="Radios" id="optionsRadios2" value="2">
                    Option 2: <?php echo $opt2; ?>
                  </label>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="Radios" id="optionsRadios3" value="3" > 
                    Option 3: <?php echo $opt3; ?>
                  </label>
                </div>
                <div class="form-check">
                <label class="form-check-label">
                    <input type="radio" class="form-check-input" name="Radios" id="optionsRadios4" value="4">
                    Option 4: <?php echo $opt4; ?>
                  </label>
                </div>
              </fieldset>
            <button type="submit" id="sendit" class="btn">Submit Answer</button>
            <br /><br />
          
        </form>
        
        </section>
      </div>

</body>
</html>