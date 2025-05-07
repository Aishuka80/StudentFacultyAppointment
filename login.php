<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="login-style.css">
	<title>Login Page</title>
</head>
<body>
   <div class="center">
     
   	 <h1>Login</h1>
     <form action="#" method="POST">
   	 <div class="form">
   	 	<input type="text" name="username" class="textfiled" placeholder="Username">
   	 	<input type="password" name="password" class="textfiled" placeholder="Password">
   	 	<div class="forgetpass"><a href="#" class="link">Forget Password ?</a></div>
   	 	<input type="submit" name="login" value="Login" class="btn">
   	 	<div class="signup">New Member ?<a href="form.php" class="link">Sign Up Here</a></div>

   	 </div>

   </div>
   </form>
</body>
</html>


<?php
session_start();

    include("db_connect.php");
    
    error_reporting(0);
    if(isset($_POST['login']))
    {
    	$username = $_POST['username'];
    	$pwd      = $_POST['password'];

    	$query    = "SELECT * FROM USER WHERE email = '$username' && password = '$pwd' ";
    	$data     = mysqli_query($conn,$query);

    	$total =mysqli_num_rows($data);
    	$row = mysqli_fetch_assoc($data);
    	//echo $total;
        if($total == 1)
        {   
        	//echo "Logged In";
        	if($row['type']=="S")
        	{ 
                $_SESSION['student_email']=$username;
                //$_SESSION['type']="S";

        	    header('location:sdashboard.php');
        	}
            else if($row['type']=="F")
            {
                $_SESSION['faculty_email']=$username;
                //$_SESSION['type']="F";

            	header('location:fdashboard.php');
            }
        }
        else 
        {
        	echo "Login Failed";
            //echo $_SESSION['message']="Username or Password is wrong";
        }
    }
?>
