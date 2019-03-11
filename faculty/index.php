<!doctype html>
<html>
<head>
    <title>Login / Register</title>
<style type="text/css">
     .login-register-form-section {
        max-width: 30%;
        margin: 0 auto;
    }

    .login-register-form-section i {
        width: 10px;
    }

    .login-register-form-section .nav-tabs > li > a {
        color: #2abb9b;
    }
 
    .login-register-form-section .nav-tabs > li.active > a {
        background-color: #2abb9b;
        border-color: #2abb9b;
        color: white;
    }

    .login-register-form-section .nav-tabs > li > a, 
    .login-register-form-section .nav-tabs > li.active > a {
        width: 160px;
        text-align: center; 
        border-radius: 0;
    }

    .login-register-form-section .nav-tabs {
        padding-bottom: 10px;
        margin-bottom: 10px;
    }


    .login-register-form-section .btn-custom {
        width: 100%;
        background-color: #2abb9b;
        border-color: #2abb9b;
        margin-bottom: 0.5em;
        border-radius: 0;
    }

    .login-register-form-section .btn-custom:hover {
        width: 100%;
        background-color: #48A497;
        border-color: #2abb9b;
    }
    .login-register-form-section .form-group {
        padding: 0 20px;
    }
 
</style>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!-- Bootstrap -->
 <link href="../css/bootstrap.min.css" rel="stylesheet">
    
<script>
function validateregister()
{
	var first_name	=	$("#first_name").val();
	var last_name	=	$("#last_name").val();
	var gender	=	$("#gender").val();
	var email	=	$("#email").val();
	var password	=	$("#password").val();
	var confirm_password	=	$("#confirm_password").val();
		
		 if((first_name=="") || (first_name== null))
		{
			alert('Please Enter your First Name');
			return false;
		}
		if(last_name=="" || last_name==null)
		{
			alert('Please Enter your Last Name');
			return false;
		}
		if(gender=="" || gender==null)
		{
			alert('Please Select your Gender');
			return false;
		}
		
		if(email=="" || email==null)
		{
			alert('Please Enter your Email');
			return false;
		}
		if((password=="" || password==null) || (confirm_password=="" || confirm_password==null))
		{
			alert('Please Enter your password');
			return false;
		}
		if((password!="" || password!=null) || (confirm_password!="" || confirm_password!=null))
		{
			if(password!=confirm_password)
			{
				alert('Password does not match');
				return false;
			}
		}
		
}
function validatelogin()
{
	var login_email	=	$("#login_email").val();
	var login_password	=	$("#login_password").val();
	var email	=	$("#email").val();
	
		
		 if((login_email=="") || (login_email== null))
		{
			alert('Please Enter your Email');
			return false;
		}
		if(login_password=="" || login_password==null)
		{
			alert('Please Enter your Password');
			return false;
		}	
}

</script>
</head>
<body>
    <br><br>
    <div class="row container" >
    <div class="col col-lg-12 col-md-offset-1" >
        <div class="container;" style="margin-bottom:8%;margin-top:8%;" >
	<h1 style="text-align:center">Faculty Login</h1>
            <div class="login-register-form-section">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active"><a href="#login" data-toggle="tab">Login</a></li>
                    <li><a href="#register" data-toggle="tab">Register</a></li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="login">
                        <form class="form-horizontal" method="post" action="codelogin.php">
                            <div class="form-group " >
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" name="login_email" id="login_email" class="form-control" placeholder="Email" value="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                    <input type="password" name="login_password" id="login_password" class="form-control" placeholder="Password" ="">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="rememberMe">
                                <label for="rememberMe">Remember Me</label>
                                <a href="#" class="pull-right">Forgot password?</a>
                            </div>  
                            <button type="submit" value="Login"  onclick="return validatelogin()" class="btn btn-success btn-custom">Login</button>

                        </form>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="register">
						<form action="coderegister.php" method="post">
                            <div class="form-group ">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" ="" value="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name"  value="">
                                </div>
                            </div>
							<div class="form-group ">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                    <input type="text" name="institution" id="institution" class="form-control" placeholder="Institution"  value="">
                                </div>
                            </div>
							<div class="form-group ">
								<select id="gender" name="gender" class="form-control" >
									<option value="" selected disabled>Select Gender</option>
									<div class="input-group-addon"><i class="fas fa-male"></i></div><option value="m">Male</option>
									<div class="input-group-addon"><i class="fas fa-female"></i></div><option value="f">Female</option>
									
								</select>
							</div>
                            <div class="form-group ">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="">
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm Password" value="">
                                </div>
                            </div>
                            <button type="submit" value="Register" onclick="return validateregister()" class="btn btn-success btn-custom">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    
    <script src="../js/jquery.js"></script>
 <!-- Include all compiled plugins (below), or include individual files
 as needed -->
 <script src="../js/bootstrap.min.js"></script>

  
</body>
</html>