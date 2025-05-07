<?php
include("db_connect.php"); 
error_reporting(0);


$query = "SELECT * FROM USER";
$data = mysqli_query($conn, $query);

$rows = mysqli_num_rows($data);
//echo $rows;

//$result = mysqli_fetch_array($data);
//echo $result;
//echo $result[fname];

//echo $result[id]." ".$result[fname]." ".$result[lname]." ".$result[email]." ".$result[department]." ".$result[phone]." ".$result[type];


if($rows != 0)
{
	//echo "Table has records";
	?>
	<h2 align="center"><mark>Displaying All Records</mark></h2>
    <table align="center" border="3" cellspacing="7" width="72%">
    	<tr>
    	<th width="5%">ID</th>
    	<th width="10%">First Name</th>
    	<th width="10%">Last Name</th>
    	<th width="20%">Email</th>
    	<th width="10%">Department</th>
    	<th width="12%">Phone</th>
    	<th width="5%">Type</th>
    	</tr>
    

    <?php
	
	while($result = mysqli_fetch_assoc($data))
	{
		//echo $result[id]." ".$result[fname]." ".$result[lname]." ".$result[email]." ".$result[department]." ".$result[phone]." ".$result[type]."<br>";

		echo "<tr>
    	        <td>".$result['id']."</td>
    	        <td>".$result['fname']."</td>
    	        <td>".$result['lname']."</td>
    	        <td>".$result['email']."</th>
    	        <td>".$result['department']."</td>
    	        <td>".$result['phone']."</td>
    	        <td>".$result['type']."</td>
    	      </tr>
    	      ";

	}
}
else
{
	echo "No records found";
}
?>
</table>