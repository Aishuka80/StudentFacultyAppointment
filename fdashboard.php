<?php
session_start();
include("db_connect.php");

// Check if faculty is logged in
if (!isset($_SESSION['faculty_email'])) {
    echo "Access denied. Please <a href='login.php'>login</a> first.";
    exit();
}

$faculty_email = $_SESSION['faculty_email'];

// Get faculty's user_id
$query = "SELECT id, fname FROM USER WHERE email = '$faculty_email' AND type = 'F'";
$result = mysqli_query($conn, $query);
$faculty = mysqli_fetch_assoc($result);
$faculty_id = $faculty['id'];
$faculty_name = $faculty['fname'];

// Fetch appointments for this faculty with student info
$appt_query = "
    SELECT 
        a.Date, 
        a.Period, 
        a.Status, 
        a.Reason, 
        u.fname AS student_first, 
        u.lname AS student_last 
    FROM 
        appointment a
    JOIN 
        USER u ON a.S_id = u.id
    WHERE 
        a.F_id = '$faculty_id'
    ORDER BY 
        a.date ASC
";

$appt_result = mysqli_query($conn, $appt_query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Faculty Dashboard</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        h2 { text-align: center; }
        table { border-collapse: collapse; width: 80%; margin: 20px auto; }
        th, td { padding: 10px; border: 1px solid #999; text-align: center; }
        .logout { text-align: center; margin-top: 20px; }
    </style>
</head>
<body>

<h2>Welcome, Prof. <?php echo htmlspecialchars($faculty_name); ?>!</h2>
<h2>Your Appointment Schedule</h2>

<table>
    <tr>
        <th>Date</th>
        <th>Period</th>
        <th>Status</th>
        <th>Reason</th>
        <th>Student Name</th>
    </tr>
    <?php
    if (mysqli_num_rows($appt_result) > 0) 
    {
        while ($row = mysqli_fetch_assoc($appt_result)) 
        {
            $student_name = $row['student_first'] . ' ' . $row['student_last'];
            echo "<tr>
                    <td>{$row['Date']}</td>
                    <td>{$row['Period']}</td>
                    <td>{$row['Status']}</td>
                    <td>{$row['Reason']}</td>
                    <td>{$student_name}</td>
                  </tr>";
        }
    } 
    else 
    {
        echo "<tr><td colspan='5'>No appointments found.</td></tr>";
    }
    ?>
</table>

<div class="logout">
    <a href="logout.php"><input type="submit" name="" value="LogOut" style="background: blue; color: white; height: 35px; width: 100px; margin-top: 20px; font-size: 18px; border: 0; border-radius: 5px; cursor: pointer;"></a>
</div>

</body>
</html>
