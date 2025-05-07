<?php
session_start();
    if(!isset($_SESSION['student_email']))
    {
    	header("location:login.php");
    }

    

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
   <div class="sdash">
       <h2>Student Dashboard</h2>
       <div class="row">
           <div class="col-md-7">
            <form action="" method="GET">
                <div class="input-group mb-3">
                  <input type="text" name="search"  required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="search data">
                  <button type="submit" class="btn">Search</button>
                </div> 
                <br>
            </form>
           </div>
           
       </div>

       <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-body">
                    <table class="table table-bordered" align="center" border="3" cellspacing="7" width="72%">
                        <thead>
                            <tr>
                                <th width="10%">First Name</th>
                                <th width="10%">Last Name</th>
                                <th width="5%">Day</th>
                                <th width="5%">Period</th>
                                <th width="10%">Appointment</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                 include("db_connect.php");
                                 if(isset($_GET['search']))
                                 {
                                    $filterdata = $_GET['search'];
                                    $query = "SELECT * FROM user INNER JOIN routine ON user.id=routine.F_id WHERE CONCAT(fname,lname,Day,Period) LIKE '%$filterdata%' ";
                                    $query_run = mysqli_query($conn,$query);

                                    if(mysqli_num_rows($query_run)>0)
                                    {
                                        foreach($query_run as $items)
                                        {  
                                            ?>
                                            <tr>
                                                <td><?= $items['fname']; ?></td>
                                                <td><?= $items['lname']; ?></td>
                                                <td><?= $items['Day']; ?></td>
                                                <td><?= $items['Period']; ?></td>
                                                <td><a href="appointmentbooking.php"><button type="submit" class="btn" align='center'>Book</button></a></td>
                                            </tr>
                                            <?php

                                        }
                                    }

                                    else
                                    {
                                        ?>
                                            <tr>
                                                <td colspan="4">No records found</td>
                                            </tr>
                                        <?php

                                    }
                                 }
                            ?>
                            
                            
                        </tbody>
                    </table>
                    
                </div>
                
            </div>
           
       </div>
   </div>
   <a href="logout.php"><input type="submit" name="" value="LogOut" style="background: blue; color: white; height: 35px; width: 100px; margin-top: 20px; font-size: 18px; border: 0; border-radius: 5px; cursor: pointer;"></a>
  
</body>
</html>
<?php
    include("db_connect.php");
?>