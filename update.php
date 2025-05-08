<?php 
   include("db_connect.php"); 
   //error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="appointmentbooking.css">
	<title>Appointment</title>
</head>
<body>
	<div class="main">
		<form action="" method="POST">
		<div class ="title">
			Update Appointment 
		</div>
		<div class="form">
            <div class="input_field">
				<label>ID</label>
				<input type="text" class ="input" name="id" required>
			</div>

			<div class="input_field">
				<label>Date</label>
				<input type="date" class ="input" name="date" required>
			</div>

			
			<div class="input_field">
				<label>Period</label>
				<select class="selectbox" name="period" required>
					<option value="">Select</option>
					<option value="Morning">Morning</option>
					<option value="Afternoon">Afternoon</option>
					<option value="Evening">Evening</option>
					
				</select>
			</div>

			<div class = "input_field">
				<label>Status</label>
				<select class="selectbox" name="status" required>
					<option value="">Select</option>
					<option value="pending">Pending</option>
					<option value="approved">Approved</option>
					<option value="cancelled">Cancelled</option>
					
				</select>
			</div>

			<div class="input_field">
				<label>Reason</label>
				<input type="text" class ="input_field" name="reason" required>
			</div>

			<div class="input_field">
				<label>Student ID</label>
				<input type="text" class ="input_field" name="s_id" required>
			</div>

			<div class="input_field">
				<label>Faculty ID</label>
				<input type="text" class ="input_field" name="f_id" required>
			</div>

			<div class="input_field terms">
				<label class="check">
					<input type="checkbox" required>
					<span class="checkmark"></span>
				</label>
				<p>Agree to terms and conditions</p>
			</div>

			<div class="input_field">
				<input type="submit" value="Confirm" class="button" name="confirm">
			</div>
		</div>
	    </form>
	</div>

</body>
</html>

<?php
if (isset($_POST['confirm'])) 
{
    $id     = $_POST['id'];
    $date   = $_POST['date'];
    $period = $_POST['period'];
    $status = $_POST['status'];
    $reason = $_POST['reason'];
    $s_id   = $_POST['s_id'];
    $f_id   = $_POST['f_id'];

    if ($id !="" && $date != "" && $period != "" && $status != "" && $reason != "" && $s_id != "" && $f_id != "") 
    {
        $query = "INSERT INTO Appointment  VALUES ('$id','$date', '$period', '$status', '$reason', '$s_id', '$f_id')";
        $data = mysqli_query($conn, $query);

        if ($data) 
        {
            echo "Data inserted into DB";
        } 
        else 
        {
            echo "Failed: " . mysqli_error($conn);
        }
    } 
else 
{
        echo "Please fill the form";
}
}
?>
