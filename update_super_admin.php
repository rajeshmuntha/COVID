<?php
include_once("header_super_admin.php");
?>
<?php
session_start();
if($_SESSION["islogin"] == 'N'){
  header("Location: index.php");
}
?>
<?php
include "conn.php"; // Using database connection file here

$id = $_GET['id']; // get id through query string

$qry = mysqli_query($conn,"select * from patient where id='$id'"); // select query

$data = mysqli_fetch_array($qry);

if(isset($_POST['update'])) 
{
    
  $f_name = strtoupper($_POST['f_name']);
	$l_name = strtoupper($_POST['l_name']);
	$icno = strtoupper($_POST['icno']);
  $dob = strtoupper($_POST['dob']);
  $gender = strtoupper($_POST['gender']);
  $t_type = strtoupper($_POST['t_type']);
	$rm_cash = strtoupper($_POST['rm_cash']);
  $rm_online = strtoupper($_POST['rm_online']);
  $p_ref = strtoupper($_POST['p_ref']);
	
    $edit = mysqli_query($conn,"update patient set f_name='$f_name', l_name='$l_name', icno='$icno', dob='$dob', gender='$gender', t_type='$t_type', rm_cash='$rm_cash', rm_online='$rm_online', p_ref='$p_ref' where id='$id'");
	
    if($edit)
    {
        mysqli_close($conn); // Close connection
		
		echo '<script type="text/javascript">
				location.replace("update_del_super_admin.php");
			  </script>';
        //header("location:update_del_super_admin.php"); // redirects to all records page
        exit;
    }
    else
    {
        echo mysqli_error();
    }    	
}
?>
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
                            <li class="nav-item  ">
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
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="day_wise_super_admin.php? = Day wise reports for super admin">Day Wise</a></li>
                                <li><a class="dropdown-item" href="panel_wise_super_admin.php">Panel Wise</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Reports
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item " href="doctor_reports.php? = Panel Reports Super Admin">Doctor Wise</a></li>
                                <li><a class="dropdown-item" href="report_super_admin_staff_wise.php? = Registration Date xrd336efe">Employee Wise</a></li>
                                <li><a class="dropdown-item" href="report_super_admin_day_wise.php? = Patient Reports Super Admin">Test Wise</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="reports_panel.php? = Panel Reports Super Admin">Invoice</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown animate__animated animate__bounceInDown">
                            <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Patient
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item " href="new_patient_super_admin.php? = Patient Creation">New Patient</a></li>
                                <li><a class="dropdown-item" href="patient_data_level_super_admin.php? = Patient Details">Patient Details</a></li>
                                <li><a class="dropdown-item active" href="update_del_super_admin.php? = Registration Date xrd336efe">Update / Delete</a></li>                                
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="patient_data_level_II_super_admin.php? = Sample Kit Validate">Kit Validate</a></li>
                                <li><a class="dropdown-item" href="ptn_reports_super_admin.php? = Patient Reports">Test Results</a></li>
                            </ul>
                            </li>
                            <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="reset.php?=Passwor Reset">Change Password</a></li>
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

<section class="pt-5  animate__animated animate__fadeInRight">
  <div class="container p-4 table-responsive shadow-lg rounded rounded-4">
<table width="500" class="table table-bordered table-hover align-middle text-center">
  <thead>
    <tr>
      <th colspan="2" class="text-center bg-light text-primary fs-4">Update Patient Details</th>
    </tr>
  </thead>
  
  <form method="POST">
 <tr> <td class="bg-light fw-bold" width="200" hight="30">First Name</td><td><input type="text" class="form-control" name="f_name" value="<?php echo $data['f_name'] ?>" placeholder="Enter First Name" Required></td></tr>
  <tr><td class="bg-light fw-bold" width="200">Last Name</td><td><input type="text" name="l_name" class="form-control" value="<?php echo $data['l_name'] ?>" placeholder="Enter Last Name" Required></td></tr>
 <tr><td class="bg-light fw-bold" width="200"> I/C No.</td><td><input type="text" name="icno" class="form-control" value="<?php echo $data['icno'] ?>" placeholder="Enter Valid ICNO" Required></td></tr>
 <tr><td class="bg-light fw-bold" width="200">DOB</td><td><input type="text" name="dob" class="form-control" value="<?php echo $data['dob'] ?>" placeholder="Date Of Birth" Required></td></tr>
 <tr><td class="bg-light fw-bold" width="200">Gender</td><td><input type="text" class="form-control" name="gender" value="<?php echo $data['gender'] ?>" placeholder="Gender" Required></td></tr>
 <tr><td class="bg-light fw-bold" width="200">Test Type</td><td><input type="text" class="form-control" name="t_type" value="<?php echo $data['t_type'] ?>" placeholder="TEST OBTAINED" Required></td></tr>
 <tr><td class="bg-light fw-bold" width="200">Cash</td><td><input type="text" class="form-control" name="rm_cash" value="<?php echo $data['rm_cash'] ?>" placeholder="CASH" Required></td></tr>
 <tr><td class="bg-light fw-bold" width="200">Online</td><td><input type="text" class="form-control" name="rm_online" value="<?php echo $data['rm_online'] ?>" placeholder="ONLINE" Required></td></tr>
 <tr><td class="bg-light fw-bold" width="200">Reference</td><td><input type="text" class="form-control" name="p_ref" value="<?php echo $data['p_ref'] ?>" placeholder="Reference" Required></td></tr>
 <tr>
   <td colspan="2"><input type="submit" class="btn btn-outline-primary" name="update" value="Click to Update"></td></tr>
</form>


</table>