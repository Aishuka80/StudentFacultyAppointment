<?php 
   include("db_connect.php"); 
   error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MyProject</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<form action="login.php" method="POST">
		<div class ="title">
			Sign Up Form
		</div>
		<div class="form">
      <div class="input_field">
				<label>ID</label>
				<input type="text" class="input" name="id" required>
			</div>

			<div class="input_field">
				<label>First Name</label>
				<input type="text" class ="input" name="fname" required>
			</div>

			<div class="input_field">
				<label>Last Name</label>
				<input type="text" class ="input" name="lname" required>
			</div>

			<div class="input_field">
				<label>Email</label>
				<input type="text" class ="input" name="email" required>
			</div>

			<div class = "input_field">
				<label>Password</label>
				<input type="password" class ="input" name="pass" required>
			</div>

			<div class="input_field">
				<label>Confirm Password</label>
				<input type="password" class ="input" name="conpass" required>
			</div>

			<div class="input_field">
				<label>Department</label>
				<select class="selectbox" name="dept" required>
					<option value="">Select</option>
					<option value="cse">CSE</option>
					<option value="cs">CS</option>
					<option value="pharmacy">Pharmacy</option>
					<option value="architecture">Architecture & Design</option>
					<option value="math">Mathematics</option>
					<option value="physics">Physics</option>
				</select>
			</div>

			<div class = "input_field">
				<label>Phone Number</label>
				<input type="text" class ="input" name="phone" required>
			</div>

			<div class="input_field">
				<label>Type</label>
				<select class="selectbox" name="type" required>
					<option value="">Select</option>
					<option value="s">S</option>
					<option value="f">F</option>
				</select>
			</div>

			<div class="input_field terms">
				<label class="check">
					<input type="checkbox" required>
					<span class="checkmark"></span>
				</label>
				<p>Agree to terms and conditions</p>
			</div>

			<div class="input_field">
				<input type="submit" value="Sign Up" class="button" name="signup">
			</div>
		</div>
	</form>
	</div>

</body>
</html>

<?php
  if($_POST['signup'])
  {
  	$id    = $_POST['id'];
  	$fname = $_POST['fname'];
  	$lname = $_POST['lname'];
  	$email = $_POST['email'];
  	$pwd   = $_POST['pass'];
  	$cpwd  = $_POST['conpass'];
  	$dept  = $_POST['dept'];
  	$phn   = $_POST['phone'];
  	$type  = $_POST['type'];


    if($id != "" && $fname != "" && $lname != "" && $email != "" && $pwd != "" && $cpwd != "" && $dept != "" && $phn != "" && $type != "")
    {

  	$query = "INSERT INTO User VALUES('$id','$fname','$lname','$email','$pwd','$cpwd','$dept','$phn','$type')";
  	$data  = mysqli_query($conn,$query);

  	if($data)
  	{
  		echo "Data inserted into DB";
  	}
  	else
  	{
  		echo "Failed";
  	}
  }
  else
  {
  	 echo "Please fill the form";
  }
  }

?>