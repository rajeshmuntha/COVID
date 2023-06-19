<?php
include_once("header_super_admin.php");
include_once("conn.php");
?> 
<?php
	                    //session_start();
						$res=mysqli_query($conn,"select * from authenticate where user_id = '".$_SESSION["user_id"]."'");
                        while($row=mysqli_fetch_array($res))
                        {
                        //echo $row["user_id"]; 
						break;
						}
	   			?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update New Password</title>
    <!-- Bootstrap icons cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body>
<div class="form">
<style type="text/css">
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
</style>
<p>
  <?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$pass =$_REQUEST['pass'];
$update="update authenticate set pass='".md5($pass)."' where user_id='".$_SESSION["user_id"]."'";
mysqli_query($conn, $update) or die(mysqli_error());
$status = "Password Updated Successfully. </br></br>";
echo "<center>Login ID: ".$row['user_id']." <p style='color:#006600;'>".$status."</center>";
}else {
?>
</p>

<header>
            <nav class="navbar navbar-expand-lg shadow-sm  bg-body-tertiary fixed-top">
                <div class="container-fluid">
                    <a class="navbar-brand" href="employee_1.php? = Staff Home Page">
                    <img src="./img/Logo.png" alt="Logo" width="45" height="auto" class="d-inline-block">
                    <span class="fw-bold fs-4 text-danger">COV-19</span><span class="fw-bold fs-4 text-primary"> SYS</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="cpanel.php? = Cpanel Home Page">Home</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link " aria-current="page" href="new_staff_super_admin.php?=new staff">Staff</a>
                            </li>                            
                            <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="queries_super_admin.php? = All Queries for Employees">Emp. Queries</a>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Registrations
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item" href="day_wise_super_admin.php? = Day wise reports for super admin">Day Wise</a></li>
                                <li><a class="dropdown-item" href="panel_wise_super_admin.php">Panel Wise</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Reports
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item" href="doctor_reports.php? = Panel Reports Super Admin">Doctor Wise</a></li>
                                <li><a class="dropdown-item" href="report_super_admin_staff_wise.php? = Registration Date xrd336efe">Employee Wise</a></li>
                                <li><a class="dropdown-item" href="report_super_admin_day_wise.php? = Patient Reports Super Admin">Test Wise</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="reports_panel.php? = Panel Reports Super Admin">Invoice</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Patient
                            </a>
                            <ul class="dropdown-menu animate__animated animate__flipInX">
                                <li><a class="dropdown-item" href="new_patient_super_admin.php? = Patient Creation">New Patient</a></li>
                                <li><a class="dropdown-item" href="patient_data_level_super_admin.php? = Patient Details">Patient Details</a></li>
                                <li><a class="dropdown-item" href="update_del_super_admin.php? = Registration Date xrd336efe">Update / Delete</a></li>                                
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="patient_data_level_II_super_admin.php? = Sample Kit Validate">Kit Validate</a></li>
                                <li><a class="dropdown-item" href="ptn_reports_super_admin.php? = Patient Reports">Test Results</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown  animate__animated animate__bounceInDown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <?php
                                session_start();
                                if(isset($_SESSION["user_id"]))
                                {
                                    if((time() - $_SESSION['last_time']) > 180000)
                                    {
                                      header("location:logout.php");
                                    }
                                    else
                                    {
                                      $_SESSION['last_time'] = time();
                                    }
                                  }
                                
                                  {
                                    echo "Hi..".$_SESSION['user_id']."";
                                  }
                              ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end  animate__animated animate__flipInX">
                                <li><a class="dropdown-item active" href="reset_s_admin.php?=Passwor Reset">Change Password</a></li>
                                <li><a class="dropdown-item" href="database-backup.php? = Database BackUp">DB Backup</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                            </li>
                        </ul>
                    </div>    
                </div>
            </nav>
  </header>      

<section class="pt-5 mt-5 animate__animated animate__fadeInRight">
  <div class="container p-4 shadow-lg rounded rounded-4">
    <form name="form" method="post" action=""> 
        <input type="hidden" name="new" value="1" />
        <input name="id" type="hidden" value="<?php echo $row['id'];?>" />
        <table class="table table-responsive table-hover table-bordered">
        <thead>
            <tr class="text-center fs-4">
            <th scope="row" colspan="2" class="bg-light text-primary">Reset Your Password</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <tr>
                <th scope="col">Login / User ID: </th>
                <td><?php echo $row['user_id'];?></td>
            </tr>
            <tr>
                <th scope="col">User Name: </th>
                <td><?php echo $row['name'];?></td>
            </tr>
            <tr>
                <th scope="col">Enter New Password: </th>
                <td><input type="password" class="form-control" name="pass" placeholder="Enter New Password" required value="" /></td>
            </tr>
            <tr class="">
                <th scope="row" colspan="2"><input name="submit" class="btn btn-outline-success" type="submit" value="Update Password" /></th>
            </tr>
        </tbody>
        </table>
    </form>
  </div>
</section>

<!-- <div>
  <form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<table width="600" align="center">
<tr>
<td align="left">Login ID :</td><td><?php echo $row['user_id'];?></td>
</tr>
<tr>
<td align="left" height="40">User Name :</td><td><?php echo $row['name'];?></td>
</tr>
<tr>
<td align="left">New Password :</td><td><input type="password" class="tb1" name="pass" placeholder="Enter New Password" required value="" /></td>
</tr>
<tr>
<td></td><td><input name="submit" class="tb3" type="submit" value="Update" /></td>
</tr>
</table>
</form>
</div> -->
<?php } ?>

<br />
</div>
</body>
</html>