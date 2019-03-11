<header class="main-header">
    
    <a href=" " class="logo">
      <span class="logo-mini"><b>OTG</b></span>
      <span class="logo-lg"><b><font color="">Online Teaching </font></b></span>
    </a>
   
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li>
			<a href="../index.php">Logout </a>
          </li>
        
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        
					<li>
					  <a href="#"> <i class="fa fa-dashboard"></i> <span>Homepage</span> </a>
					</li>
					
                     <li class="treeview"><a href=""><i class="fa fa-user"><div class="icon-bg bg-violet"></div></i><span class="menu-title">Courses </span> </a>
                         <ul class="treeview-menu">
                            <?php
                              $validate1 = "SELECT * FROM enrollcourse where sid = '".$sid."' and cid = '".$row['c_id']."' ";
                              $result1 = mysqli_query($con, $validate1);
                            while($row = mysqli_fetch_array($result1))
                            { ?>
                                 <li><a href="addcourse.php"><i class="fa fa-handshake-o">
                                            <div class="icon-bg bg-violet"></div>
                                            </i><span class="menu-title">Create Courses</span></a>
                                        </li> 
                             <?php
                                  $validate1 = "SELECT * FROM enrollcourse where sid = '".$sid."' and cid = '".$row['c_id']."' ";
                                  $result2 = mysqli_query($con, $validate1);
                                  if(mysqli_num_rows($result2) > 0)
                                     echo "<td> Course selected. </td>";
                                  else 
                                  {
                                      echo "<td> <a href =\" codeenroll.php?sid=".$sid."&cid=".$row['c_id']." \" onclick = \"runit(\"".$row['c_name']."\")\"> Click to Enroll to course. </a> </td>";}

                            }
                            ?>
                        </ul>
                    </li> 
				</ul>	
		</section>
  </aside>